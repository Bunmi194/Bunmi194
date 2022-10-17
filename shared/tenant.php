<?php
    include_once "constants.php";

    //class definition

    class Tenant{
        //member variables
        var $lastname;
        var $firstname;
        var $address;
        var $email;
        var $phone;
        var $password;
        var $nin;
        var $dbaccess; //this is my database handler;

        //member functions

        function __construct(){
            $this->dbaccess = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB_NAME);
            //checking if connection was successful
            // echo "<pre>";
            // print_r($this->dbaccess->connect_error);
            // echo "</pre>";
            if($this->dbaccess->connect_error){
                die("Connection failed ".$this->dbaccess->connect_error);
            }else{
                echo "Connection Successful";
            }
        }
        function register($lastname, $firstname, $address, $email, $phone, $password, $nin){
            $password = password_hash($password, PASSWORD_DEFAULT);
            //prepare
            $dbstatement = $this->dbaccess->prepare("INSERT INTO tenants (lastname, firstname, address, email, phone, password, nin) VALUES (?,?,?,?,?,?,?)");
            //bind
            $dbstatement->bind_param("sssssss", $lastname, $firstname, $address, $email, $phone, $password, $nin);
            //execute
            $dbstatement->execute();

            //error management

            if($dbstatement->error){
                $result = "Oops! Something went wrong. ".$dbstatement->error;
            }else{
                $result = "cool";
            }
            return $result;
        }

          //login begins
          function logIn($email, $password){
            //$password = password_verify($password, PASSWORD_DEFAULT);
            $dbstatement = $this->dbaccess->prepare("SELECT * FROM tenants WHERE email=?");
            $dbstatement->bind_param("s",$email);
            $dbstatement->execute();
            $result = $dbstatement->get_result();

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();

                   //verify if password match with  what is in the database
                   if(password_verify($password,$row['password'])){
                    // password match
                    session_start();
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['tenant_id'];
                    $_SESSION['logger'] = "K!NG_DAViD";
                    return true;
                }else{
                    // password does not match
                    return false;
                }
        }else{
            // email does not exist
            return false;
        }
            }
        //end login

        //logout
        function logout(){
            session_start();
            session_destroy();
            //redirect to login page
            header("Location: signin.php");
            exit();
        }
        //end logout

        
        //insert into inspection
        function inspection($tenantid, $apartmentid){
            //prepare
            $stmt = $this->dbaccess->prepare("INSERT INTO inspection (tenants_id, apartments_id) VALUES (?,?)");
            //bind
            $stmt->bind_param("ii", $tenantid, $apartmentid);
            //execute
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $output = $stmt->insert_id;
            }else{
                $output = false.$stmt->error;
            }
            return $output;
        }
    //insert into inspection

    //insert message
        function insertTenantMessage($apartmentid, $tenantid, $message, $inspectionid){
            $stmt = $this->dbaccess->prepare("INSERT INTO messages_apartment (apartment_id, tenant_id, message, inspection_id) VALUES (?,?,?,?)");
            $stmt->bind_param("iisi", $apartmentid, $tenantid, $message, $inspectionid);
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $output = true;
            }else{
                $output = false.$stmt->error;
            }
            return $output;
        }

    //insert message


    }


?>
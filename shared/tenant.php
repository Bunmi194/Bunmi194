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
            $id = $dbstatement->insert_id;

            //error management

            if($dbstatement->error){
                $result = "Oops! Something went wrong. ".$dbstatement->error;
            }else{
                $result = "cool";
                $_SESSION['id'] = $id;
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

        //check


    //     //insert into inspection
    //     function inspection($tenantid, $apartmentid){
    //         //prepare
    //         $stmt = $this->dbaccess->prepare("INSERT INTO inspection (tenants_id, apartments_id) VALUES (?,?)");
    //         //bind
    //         $stmt->bind_param("ii", $tenantid, $apartmentid);
    //         //execute
    //         $stmt->execute();

    //         if($stmt->affected_rows == 1){
    //             $output = $stmt->insert_id;
    //         }else{
    //             $output = false.$stmt->error;
    //         }
    //         return $output;
    //     }
    // //insert into inspection

    //get tenant message
        function getTenantMessage($tenantid){
            $msg = "booked";
            $stmt = $this->dbaccess->prepare("SELECT * FROM inspection JOIN apartments on apartments.apartments_id = inspection.apartments_id LEFT JOIN landlords on apartments.landlords_id = landlords.landlord_id WHERE inspection.status=? AND inspection.tenants_id=?");
            $stmt->bind_param("si", $msg, $tenantid);
            $stmt->execute();
            $result = $stmt->get_result();
            $record = array();
            if($result->num_rows > 0){                
                while ($row = $result->fetch_assoc()) {
                    $record[] = $row;
                }
            }else{
                $record[] = "NO RECORD";
            }
            return $record;
        }

    //get tenant message

        //get inspection count

        
        //get inspection count

        function getInspectionCount($tenantid){
            //prepare
            $msg = 'booked';
            $stmt = $this->dbaccess->prepare("SELECT COUNT(inspection_id) FROM `inspection` LEFT JOIN apartments ON inspection.apartments_id = apartments.apartments_id LEFT JOIN landlords ON landlords.landlord_id = apartments.landlords_id LEFT JOIN tenants ON tenants.tenant_id = inspection.tenants_id WHERE inspection.tenants_id=? AND inspection.status=?");
            //bind
            $stmt->bind_param("is", $tenantid, $msg);
            //execute
            $stmt->execute();
            $result = $stmt->get_result();
            if($stmt->error){
                $result = false.$stmt->error;
            }else{
                $result = $result->fetch_assoc();
            }
            return $result;
        }

        //get inspection count

        //get inspection count

        
        //getallproperties

        function getRentedProperties($tenantid){
            $msg = "completed";
            $stmt = $this->dbaccess->prepare("SELECT * FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id JOIN apartment_location ON apartment_location.location_id=apartments.location_id WHERE payments_apartments.tenants_id=? AND payments_apartments.status=?");
            $stmt->bind_param("is", $tenantid, $msg);
            $stmt->execute();

            $resultset = $stmt->get_result();
            $record = array();
            if($resultset->num_rows > 0){
                while ($row = $resultset->fetch_assoc()) {
                    $record[] = $row;
                }
            }else{
                $record[] = "NO RECORD";
            }
            return $record;
        }

        //getallproperties


        //count rented apartments

        function countRentedProperties($tenantid){
            $msg = "completed";
            $stmt = $this->dbaccess->prepare("SELECT COUNT(payments_id) FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id WHERE payments_apartments.tenants_id=? AND payments_apartments.status=?");
            $stmt->bind_param("is", $tenantid, $msg);
            $stmt->execute();

            $resultset = $stmt->get_result();
            return $resultset->fetch_assoc();
        }

        //count rented apartments


        
        //amount count

        function amountCount($tenantid){
            $msg = "completed";
            $stmt = $this->dbaccess->prepare("SELECT SUM(amount) FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id WHERE payments_apartments.status = ? AND payments_apartments.tenants_id=?");
            $stmt->bind_param("si", $msg, $tenantid);
            $stmt->execute();

            $resultset = $stmt->get_result();
            $record = array();
            if($resultset->num_rows > 0){
                while ($row = $resultset->fetch_assoc()) {
                    $record[] = $row;
                }
            }else{
                $record[] = "NO RECORD";
            }
            return $record;
        }

        //amount count

        //payments

        function tenantPayment($tenantid){
            $msg = "completed";
            $stmt = $this->dbaccess->prepare("SELECT * FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id JOIN apartment_location ON apartment_location.location_id=apartments.location_id WHERE payments_apartments.status=? AND payments_apartments.tenants_id=?");
            $stmt->bind_param("si", $msg, $tenantid);
            $stmt->execute();

            $resultset = $stmt->get_result();
            $record = array();
            if($resultset->num_rows > 0){
                while ($row = $resultset->fetch_assoc()) {
                    $record[] = $row;
                }
            }else{
                $record[] = "NO RECORD";
            }
            return $record;
        }

        //payments

        //insert into messages_apartments

        function insertTenantMessage($apartmentid, $tenantid, $msg, $res){
            $statement = $this->dbaccess->prepare("INSERT INTO messages_apartment SET apartment_id=?, tenant_id=?, message=?, inspection_id=?");
            $statement->bind_param("iisi", $apartmentid, $tenantid, $msg, $res);
            $statement->execute();
            if ($statement->affected_rows == 1) {
                return true;
            }else{
                return false;
            }
        }
    
        
        //insert into messages_apartments

        //check if email exists

        function lookForEmail($email){
            $statement = $this->dbaccess->prepare("SELECT * FROM tenants WHERE email=?");
            $statement->bind_param("s", $email);
            $statement->execute();
            $result = $statement->get_result();
            //$record = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                //record already exists
                return "yes";
            }else{
                return "no";
            }
        }

        //check if email exists
        
        //check if phone exists

        function lookForPhone($phone){
            $statement = $this->dbaccess->prepare("SELECT * FROM tenants WHERE phone=?");
            $statement->bind_param("s", $phone);
            $statement->execute();
            $result = $statement->get_result();
            //$record = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                //record already exists
                return "yes";
            }else{
                return "no";
            }
        }

        //check if phone exists

        
        //check if nin exists

        function lookForNin($nin){
            $statement = $this->dbaccess->prepare("SELECT * FROM tenants WHERE nin=?");
            $statement->bind_param("s", $nin);
            $statement->execute();
            $result = $statement->get_result();
            //$record = $result->fetch_assoc();
            if ($result->num_rows > 0) {
                //record already exists
                return "yes";
            }else{
                return "no";
            }
        }

        //check if nin exists

    }


?>
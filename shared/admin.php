<?php
    include_once "constants.php";
    include_once "landlord.php";

    class Admin extends Landlord{

        function getAllLandlords(){
            $statement = $this->dbaccess->prepare("SELECT * FROM landlords");
            $statement->execute();
            $resultset = $statement->get_result();
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

        
        function getAllTenants(){
            $statement = $this->dbaccess->prepare("SELECT * FROM tenants");
            $statement->execute();
            $resultset = $statement->get_result();
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
        

        
          //login begins
          function logInAdmin($email, $password){
            //$password = password_verify($password, PASSWORD_DEFAULT);
            $dbstatement = $this->dbaccess->prepare("SELECT * FROM administrators WHERE email=?");
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
                    $_SESSION['id'] = $row['administrator_id'];
                    $_SESSION['role'] = "admin";
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
    }

?>
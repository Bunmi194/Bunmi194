<?php
    include_once "constants.php";

    //class definition

    class Landlord{
        //member variables
        var $lastname;
        var $firstname;
        var $address;
        var $email;
        var $phone;
        var $password;
        var $propnumber;
        var $account_number;
        var $account_name;
        var $bank_name;
        var $nin;
        var $admin_id;
        var $keylogin;
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
        function register($lastname, $firstname, $address, $email, $phone, $password, $propnumber, $account_name, $account_number, $bank_name, $nin, $admin_id, $keylogin){
            $password = password_hash($password, PASSWORD_DEFAULT);
            //prepare
            $dbstatement = $this->dbaccess->prepare("INSERT INTO landlords (landlord_lastname, landlord_firstname, landlord_address, landlord_email, landlord_phone, password, property_validity_number, account_name, account_number, bank_name, landlord_nin, admin_id, keylogin) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            //bind
            $dbstatement->bind_param("sssssssssssis", $lastname, $firstname, $address, $email, $phone, $password, $propnumber, $account_name, $account_number, $bank_name, $nin, $admin_id, $keylogin);
            //execute
            $dbstatement->execute();
            $id = $dbstatement->insert_id;

            //error management

            if($dbstatement->error){
                $result = "Oops! Something went wrong. ".$dbstatement->error;
            }else{
                $result = "cool";
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['landlord'] = "landlord";
            }
            return $result;
        }

        //upload property begins here

            function uploadProperty($title, $address, $price, $description, $landlords_id, $category_id, $location_id){
                //prepare statement
                $statement = $this->dbaccess->prepare("INSERT INTO apartments (title, address, price, description, landlords_id, category_id, location_id) VALUES (?,?,?,?,?,?,?)");
                //bind
                $statement->bind_param("ssisiii", $title, $address, $price, $description, $landlords_id, $category_id, $location_id);
                //execute
                $statement->execute();
                $upderror = array();
                $output = array();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
    
                }else{
                    //upload first image
                    $apartments_id = $statement->insert_id;
                    if(isset($_FILES['image1'])){
                    $filename1 = $_SESSION['lastname'].$_FILES['image1']['name'];
                    $file_tmp1 = $_FILES['image1']['tmp_name'];
                    $destination = "properties/$filename1";
                    $upload1 = move_uploaded_file($file_tmp1, $destination);
                        //prepare statement
                    $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                    //bind
                    $statement->bind_param("si", $filename1, $apartments_id);
                    //execute
                    $statement->execute();

                    if($statement->error){
                        $upderror[] = "Oops! something went wrong ".$statement->error;
                        
                    }else{
                        $output[] = "Image1 uploaded";
                    }
                    }
                    //upload second image
                    if(isset($_FILES['image2']) && !empty($_FILES['image2']['name'])){

                    //upload second image
                    
                    $filename2 = $_SESSION['lastname'].$_FILES['image2']['name'];
                    $file_tmp2 = $_FILES['image2']['tmp_name'];
                    $destination = "properties/$filename2";
                    $upload2 = move_uploaded_file($file_tmp2, $destination);
                    
                    //prepare statement
                    $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                    //bind
                    $statement->bind_param("si", $filename2, $apartments_id);
                    //execute
                    $statement->execute();

                    if($statement->error){
                        $upderror[] = "Oops! something went wrong ".$statement->error;
                        
                    }else{
                        $output[] = "Image1 uploaded";
                    }
                }

                //third image

                    
                if(isset($_FILES['image3']) && !empty($_FILES['image3']['name'])){

                    //upload second image
                    
                    $filename3 = $_SESSION['lastname'].$_FILES['image3']['name'];
                    $file_tmp3 = $_FILES['image3']['tmp_name'];
                    $destination = "properties/$filename3";
                    $upload3 = move_uploaded_file($file_tmp3, $destination);
                    
                    //prepare statement
                    $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                    //bind
                    $statement->bind_param("si", $filename3, $apartments_id);
                    //execute
                    $statement->execute();

                    if($statement->error){
                        $upderror[] = "Oops! something went wrong ".$statement->error;
                        
                    }else{
                        $output[] = "Image1 uploaded";
                    }
                }


                //third image

                //fourth image

                    
                if(isset($_FILES['image4']) && !empty($_FILES['image4']['name'])){

                    //upload second image
                    
                    $filename4 = $_SESSION['lastname'].$_FILES['image4']['name'];
                    $file_tmp4 = $_FILES['image4']['tmp_name'];
                    $destination = "properties/$filename4";
                    $upload4 = move_uploaded_file($file_tmp4, $destination);
                    
                    //prepare statement
                    $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                    //bind
                    $statement->bind_param("si", $filename4, $apartments_id);
                    //execute
                    $statement->execute();

                    if($statement->error){
                        $upderror[] = "Oops! something went wrong ".$statement->error;
                        
                    }else{
                        $output[] = "Image1 uploaded";
                    }
                }


                //fourth image

                //fifth image

                    
                if(isset($_FILES['image5']) && !empty($_FILES['image5']['name'])){

                    //upload second image
                    
                    $filename5 = $_SESSION['lastname'].$_FILES['image5']['name'];
                    $file_tmp5 = $_FILES['image5']['tmp_name'];
                    $destination = "properties/$filename5";
                    $upload5 = move_uploaded_file($file_tmp5, $destination);
                    
                    //prepare statement
                    $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                    //bind
                    $statement->bind_param("si", $filename5, $apartments_id);
                    //execute
                    $statement->execute();

                    if($statement->error){
                        $upderror[] = "Oops! something went wrong ".$statement->error;
                        
                    }else{
                        $output[] = "Image1 uploaded";
                    }
                }


                //fifth image

                //limit 6


                //limit 6
            }
            
            return $upderror;
        }

        //upload property ends here

        //update property

        function updateProperty($title, $address, $price, $description, $category_id, $location_id, $apartments_id){
            //prepare statement
            $statement = $this->dbaccess->prepare("UPDATE apartments SET title=?, address=?, price=?, description=?, category_id=?, location_id=? WHERE apartments_id=?");
            //bind
            $statement->bind_param("ssisiii", $title, $address, $price, $description, $category_id, $location_id, $apartments_id);
            //execute
            $statement->execute();
            $upderror = array();
            $output = array();

            if($statement->error){
                $upderror[] = "Oops! something went wrong ".$statement->error;

            }else{
                //upload first image
                if(isset($_FILES['image1']) && !empty($_FILES['image1']['name'])){
                $filename1 = $_SESSION['lastname'].$_FILES['image1']['name'];
                $file_tmp1 = $_FILES['image1']['tmp_name'];
                $destination = "properties/$filename1";
                $upload1 = move_uploaded_file($file_tmp1, $destination);
                    //prepare statement
                $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                //bind
                $statement->bind_param("si", $filename1, $apartments_id);
                //execute
                $statement->execute();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
                    
                }else{
                    $output[] = "Image1 uploaded";
                }
                }
                //upload second image
                if(isset($_FILES['image2']) && !empty($_FILES['image2']['name'])){

                //upload second image
                
                $filename2 = $_SESSION['lastname'].$_FILES['image2']['name'];
                $file_tmp2 = $_FILES['image2']['tmp_name'];
                $destination = "properties/$filename2";
                $upload2 = move_uploaded_file($file_tmp2, $destination);
                
                //prepare statement
                $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                //bind
                $statement->bind_param("si", $filename2, $apartments_id);
                //execute
                $statement->execute();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
                    
                }else{
                    $output[] = "Image1 uploaded";
                }
            }

            //third image

                
            if(isset($_FILES['image3']) && !empty($_FILES['image3']['name'])){

                //upload second image
                
                $filename3 = $_SESSION['lastname'].$_FILES['image3']['name'];
                $file_tmp3 = $_FILES['image3']['tmp_name'];
                $destination = "properties/$filename3";
                $upload3 = move_uploaded_file($file_tmp3, $destination);
                
                //prepare statement
                //
                $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");

                $statement->bind_param("si", $filename3, $apartments_id);
                //execute
                $statement->execute();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
                    
                }else{
                    $output[] = "Image1 uploaded";
                }
            }


            //third image

            //fourth image

                
            if(isset($_FILES['image4']) && !empty($_FILES['image4']['name'])){

                //upload second image
                
                $filename4 = $_SESSION['lastname'].$_FILES['image4']['name'];
                $file_tmp4 = $_FILES['image4']['tmp_name'];
                $destination = "properties/$filename4";
                $upload4 = move_uploaded_file($file_tmp4, $destination);
                
                //prepare statement
                $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                //bind
                $statement->bind_param("si", $filename4, $apartments_id);
                //execute
                $statement->execute();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
                    
                }else{
                    $output[] = "Image1 uploaded";
                }
            }


            //fourth image

            //fifth image

                
            if(isset($_FILES['image5']) && !empty($_FILES['image5']['name'])){

                //upload second image
                
                $filename5 = $_SESSION['lastname'].$_FILES['image5']['name'];
                $file_tmp5 = $_FILES['image5']['tmp_name'];
                $destination = "properties/$filename5";
                $upload5 = move_uploaded_file($file_tmp5, $destination);
                
                //prepare statement
                $statement = $this->dbaccess->prepare("INSERT INTO images_apartments (url, apartments_id) VALUES (?,?)");
                //bind
                $statement->bind_param("si", $filename5, $apartments_id);
                //execute
                $statement->execute();

                if($statement->error){
                    $upderror[] = "Oops! something went wrong ".$statement->error;
                    
                }else{
                    $output[] = "Image1 uploaded";
                }
            }


            //fifth image

            //limit 6


            //limit 6
        }
        
        return $upderror;
    }

        //update property

        //login begins
        function logIn($email, $password){
            //$password = password_verify($password, PASSWORD_DEFAULT);
            $dbstatement = $this->dbaccess->prepare("SELECT * FROM landlords WHERE landlord_email=?");
            $dbstatement->bind_param("s",$email);
            $dbstatement->execute();
            $result = $dbstatement->get_result();

            if($result->num_rows == 1){
                $row = $result->fetch_assoc();

                   //verify if password match with  what is in the database
                   if(password_verify($password,$row['password'])){
                    // password match
                    session_start();
                    $_SESSION['lastname'] = $row['landlord_lastname'];
                    $_SESSION['firstname'] = $row['landlord_firstname'];
                    $_SESSION['email'] = $row['landlord_email'];
                    $_SESSION['id'] = $row['landlord_id'];
                    $_SESSION['landlord'] = "landlord";
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


        //get all messages

            function getMessageCount($landlords_id){
                //prepare
                $stmt = $this->dbaccess->prepare("SELECT COUNT(inspection_id) FROM `inspection` LEFT JOIN apartments ON inspection.apartments_id = apartments.apartments_id LEFT JOIN landlords ON landlords.landlord_id = apartments.landlords_id LEFT JOIN tenants ON tenants.tenant_id = inspection.tenants_id WHERE landlords.landlord_id=?");
                //bind
                $stmt->bind_param("i", $landlords_id);
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

        //get all messages
        
        //get inspection count

        function getInspectionCount($landlords_id){
            //prepare
            $msg = 'booked';
            $stmt = $this->dbaccess->prepare("SELECT COUNT(inspection_id) FROM `inspection` LEFT JOIN apartments ON inspection.apartments_id = apartments.apartments_id LEFT JOIN landlords ON landlords.landlord_id = apartments.landlords_id LEFT JOIN tenants ON tenants.tenant_id = inspection.tenants_id WHERE landlords.landlord_id=? AND inspection.status=?");
            //bind
            $stmt->bind_param("is", $landlords_id, $msg);
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

        //fetch landlord id
            function getLandlordId($apartmentid){
                $stmt = $this->dbaccess->prepare("SELECT * FROM `apartments` JOIN landlords ON apartments.landlords_id = landlords.landlord_id WHERE apartments.apartments_id=?");
                $stmt->bind_param("i", $apartmentid);
                $stmt->execute();
                $result = $stmt->get_result();
                $output = array();
                if($stmt->error){
                    $output[] = "Error ".$stmt->error;
                }elseif($result->num_rows == 0){
                    $output[] = "No Record";
                }elseif($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $output[] = $row;
                    }
                }else{                    
                    $output[] = "else";
                }
                return $output;
            }
        //fetch landlord id

        //getallmessages

            function getAllMessages($landlords_id){
                $stmt = $this->dbaccess->prepare("SELECT * FROM messages_apartment JOIN apartments ON messages_apartment.apartment_id = apartments.apartments_id LEFT JOIN landlords ON apartments.landlords_id = landlords.landlord_id LEFT JOIN inspection ON inspection.apartments_id = apartments.apartments_id WHERE landlords.landlord_id=? GROUP BY message_id");
                $stmt->bind_param("i", $landlords_id);
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
        //getallmessages

        /*
            ------------------Admin
        */

        
        //getallmessages

        function getAllMessagesAdmin(){
            $stmt = $this->dbaccess->prepare("SELECT * FROM messages_apartment JOIN apartments ON messages_apartment.apartment_id = apartments.apartments_id LEFT JOIN landlords ON apartments.landlords_id = landlords.landlord_id LEFT JOIN inspection ON inspection.apartments_id = apartments.apartments_id GROUP BY message_id");
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
    //getallmessages

    /*
        -------------------Admin
    */

        //getallinspection

        function getAllInspections($landlords_id){
            $message = "booked";
            $stmt = $this->dbaccess->prepare("SELECT * FROM messages_apartment JOIN apartments ON messages_apartment.apartment_id = apartments.apartments_id LEFT JOIN landlords ON apartments.landlords_id = landlords.landlord_id LEFT JOIN inspection ON inspection.apartments_id = apartments.apartments_id WHERE landlords.landlord_id=? AND inspection.status = ? GROUP BY apartment_id ORDER BY inspection.inspection_date DESC");
            $stmt->bind_param("is", $landlords_id, $message);
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

        //getallinspection

        /*
        ------------------------Admin

        */

        
        //getallinspection

        function getAllInspectionsAdmin(){
            $message = "booked";
            $stmt = $this->dbaccess->prepare("SELECT * FROM messages_apartment JOIN apartments ON messages_apartment.apartment_id = apartments.apartments_id LEFT JOIN landlords ON apartments.landlords_id = landlords.landlord_id LEFT JOIN inspection ON inspection.apartments_id = apartments.apartments_id WHERE inspection.status = ? GROUP BY apartment_id ORDER BY inspection.inspection_date DESC");
            $stmt->bind_param("s", $message);
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

        //getallinspection

        /*
        -------------------------------Admin
        */

        //getallproperties

        function getAllProperties($landlords_id){
            $stmt = $this->dbaccess->prepare("SELECT * FROM apartments JOIN apartment_location ON apartments.location_id = apartment_location.location_id WHERE landlords_id=? ORDER BY apartments.date DESC");
            $stmt->bind_param("i", $landlords_id);
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

        //admin-------
        

        
        //getallproperties

        function getAllPropertiesAdmin(){
            $stmt = $this->dbaccess->prepare("SELECT * FROM apartments JOIN apartment_location ON apartments.location_id = apartment_location.location_id ORDER BY apartments.date DESC");
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

        //admin----------

        //get properties by id

        function getPropertiesById($apartments_id){
            $stmt = $this->dbaccess->prepare("SELECT * FROM apartments JOIN apartment_location ON apartments.location_id = apartment_location.location_id WHERE apartments_id=?");
            $stmt->bind_param("i", $apartments_id);
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

        //get properties by id



        //property count

        function propertyCount($landlords_id){
            $stmt = $this->dbaccess->prepare("SELECT COUNT(apartments_id) FROM apartments JOIN apartment_location ON apartments.location_id = apartment_location.location_id WHERE landlords_id=?");
            $stmt->bind_param("i", $landlords_id);
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

        //property count


        
        //amount count

        function amountCount($landlords_id){
            $msg = "completed";
            $stmt = $this->dbaccess->prepare("SELECT SUM(amount) FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id WHERE payments_apartments.status = ? AND apartments.landlords_id=?");
            $stmt->bind_param("is", $landlords_id, $msg);
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


        //rejectrequest
            function rejectRequest($inspectionid){
                $msg = "cancelled";
                $stmt = $this->dbaccess->prepare("UPDATE inspection SET inspection.status=? WHERE inspection_id=?");
                $stmt->bind_param("si", $msg, $inspectionid);
                $stmt->execute();

                if($stmt->affected_rows > 0){
                    $output = true;
                }else{
                    $output = false;
                }
                return $stmt->affected_rows;

            }
        //rejectrequest

        
        //acceptrequest
        function acceptRequest($msg, $inspectiondate, $inspectiontime, $inspectionid){
            $stmt = $this->dbaccess->prepare("UPDATE inspection SET status=?, inspection_date=?, inspection_time=? WHERE inspection_id=?");
            $date = date($inspectiondate);
            $time = date($inspectiontime);
            $stmt->bind_param("sssi", $msg, $inspectiondate, $inspectiontime, $inspectionid);
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $output = true;
            }else{
                $output = false;
            }
            return $output;

        }
    //acceptrequest

    //delete property
        function deleteProperty($propertyid){
            
            //prepare
            $statement = $this->dbaccess->prepare("DELETE FROM images_apartments WHERE apartments_id=?");
            //bind
            $statement->bind_param("i",$propertyid);
            $statement->execute();

            //second table
            $statement1 = $this->dbaccess->prepare("DELETE FROM apartments WHERE apartments_id=?");
            //bind
            $statement1->bind_param("i",$propertyid);
            $statement1->execute();


            if ($statement->affected_rows == 1 && ($statement1->affected_rows == 1)) {
                return true;
            }else{
                return false;
            }
        }
            
        

    //delete property

        function checkInspectionBeforeDelete($propertyid){
            $status = "booked";
            //prepare
            $statement2 = $this->dbaccess->prepare("SELECT COUNT(apartments_id) FROM inspection WHERE apartments_id=? AND status=?");
            //bind
            $statement2->bind_param("is", $propertyid, $status);
            $statement2->execute();
            $record = $statement2->get_result();
            $num = $record->fetch_assoc();
            return $num;
        }


        //check for unique fields
        /* 
        ----------------------------
        ------------------------
        --------------------
        ---------------
        */
        
        //check if email exists

        function lookForEmail($email){
            $statement = $this->dbaccess->prepare("SELECT * FROM landlords WHERE landlord_email=?");
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
            $statement = $this->dbaccess->prepare("SELECT * FROM landlords WHERE landlord_phone=?");
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
            $statement = $this->dbaccess->prepare("SELECT * FROM landlords WHERE landlord_nin=?");
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
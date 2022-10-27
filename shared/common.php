<?php
    //class definition

    class Common{
        var $dbcon;

        function __construct(){
            $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB_NAME);

            if($this->dbcon->connect_error){
                die("Connection Failed ".$this->dbcon->connect_error);
            }else{
                return "Connection Successful";
            }
        }
        //getcategory
        function getCat(){
            $st = $this->dbcon->prepare("SELECT * FROM apartment_category LIMIT 4");
            $st->execute();
            $result = $st->get_result();
            $record = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $record[] = $row;
                }
            }
            return $record;
        }
        //getcategory
        //get local government
        
        function getLg(){
            $st = $this->dbcon->prepare("SELECT * FROM apartment_location");
            $st->execute();
            $result = $st->get_result();
            $record = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $record[] = $row;
                }
            }
            return $record;
        }

        //get local government

        //get apartment
        function getApartment(){
            $st = $this->dbcon->prepare("SELECT * FROM apartment_category");
            $st->execute();
            $result = $st->get_result();
            $record = array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $record[] = $row;
                }
            }
            return $record;
        }
        //get apartment

        //getApartmentsByCategory
            function getApartmentByCategory($catid){
                $statement = $this->dbcon->prepare("SELECT * FROM images_apartments LEFT JOIN apartments ON images_apartments.apartments_id = apartments.apartments_id LEFT JOIN apartment_location ON apartment_location.location_id = apartments.location_id LEFT JOIN apartment_category ON apartment_category.category_id = apartments.category_id WHERE apartment_category.category_id=? GROUP BY images_apartments.apartments_id");
                $statement->bind_param("i", $catid);
                $statement->execute();
                $result = $statement->get_result();
                $record = array();

                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                        $record[] = $row;
                    }
                }else{
                    $record[] = "NO RECORD FOUND";
                }
                return $record;
            }

        
        //getApartmentsByCategory

        //getApartmentByLocation

            function getApartmentByLocation($loc1, $loc2, $loc3, $loc4){
                $statement = $this->dbcon->prepare("SELECT * FROM apartment_location WHERE apartment_location.location=? OR apartment_location.location=? OR apartment_location.location=? OR apartment_location.location=?");
                $statement->bind_param("ssss", $loc1, $loc2, $loc3, $loc4);
                $statement->execute();

                $result = $statement->get_result();
                $record = array();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $record[] = $row;
                        
                    }
                }else{
                    $record[] = "No Record Found";
                }
                return $record;
            }

        //getApartmentByLocation

        //getAllApartmentByLocation


            function getAllApartmentByLocation($locid){
                $statement = $this->dbcon->prepare("SELECT * FROM apartments JOIN apartment_location ON apartment_location.location_id = apartments.location_id WHERE apartments.location_id=?");
                $statement->bind_param("i", $locid);
                $statement->execute();

                $result = $statement->get_result();
                $collection = array();
                
                if($result->num_rows > 0){
                    //record exists
                    while($row = $result->fetch_assoc()){
                        $collection[] = $row;
                    }
                }else{
                    $collection[] = "No Record";
                }
                return $collection;
            }
        //getAllApartmentByLocation

        //sanitizer
            function clean($data){
                $data1 = strip_tags($data);
                $data2 = trim($data1);
                $data3 = str_replace("  "," ",$data2);
                $data4 = addslashes($data3);
                return $data4; 
            }
        //sanitizer

        //getapartmentbyid
        function getApartmentById($apartmentid){
            $statement = $this->dbcon->prepare("SELECT * FROM images_apartments LEFT JOIN apartments ON images_apartments.apartments_id = apartments.apartments_id LEFT JOIN apartment_location ON apartment_location.location_id = apartments.location_id LEFT JOIN apartment_category ON apartment_category.category_id = apartments.category_id WHERE apartments.apartments_id=?");
            $statement->bind_param("i", $apartmentid);
            $statement->execute();
            $result = $statement->get_result();
            $record = array();

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $record[] = $row;
                }
            }else{
                $record[] = "NO RECORD FOUND";
            }
            return $record;
        }
        //getapartmentbyid

        //check for inspection

        function checkForInspection($tenantid, $apartmentid){
            $statement = $this->dbcon->prepare("SELECT COUNT(inspection_id) FROM inspection WHERE tenants_id=? AND apartments_id=?");
            $statement->bind_param("ii", $tenantid, $apartmentid);
            $statement->execute();
            $count = $statement->get_result();
            return $count->fetch_assoc();
        }

        //check for inspection
        
        //insert into inspection
        function inspection($tenantid, $apartmentid){
            //prepare
            $stmt = $this->dbcon->prepare("INSERT INTO inspection (tenants_id, apartments_id) VALUES (?,?)");
            //bind
            $stmt->bind_param("ii", $tenantid, $apartmentid);
            //execute
            $stmt->execute();

            if($stmt->affected_rows > 0){
                $output = $stmt->insert_id;
            }else{
                $output = false.$stmt->error;
            }
            return $output;
        }
    //insert into inspection

    //logout

    function logout(){
        session_start();
        session_destroy();
        //redirect to login page
        header("Location: signin.php");
        exit();
    }

    //logout

    function checkStatus($apartmentid){
        $statement = $this->dbcon->prepare("SELECT * FROM apartments WHERE apartments_id=?");
        $statement->bind_param("i", $apartmentid);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }else{
            return "NO RECORD";
        }
    }

    //search apartment

    
    function searchApartment($search){
        //prepare the statement
        $stmt = $this->dbcon->prepare("SELECT * FROM images_apartments JOIN apartments ON images_apartments.apartments_id=apartments.apartments_id LEFT JOIN apartment_category ON apartments.category_id=apartment_category.category_id LEFT JOIN apartment_location ON apartment_location.location_id=apartments.location_id WHERE apartments.title LIKE ? OR apartments.address LIKE ? OR apartments.description LIKE ? OR apartment_category.category LIKE ? OR apartment_location.location LIKE ? GROUP BY apartments.apartments_id LIMIT 10");
        //bind
        $searchstr = "%$search%";
        $stmt->bind_param("sssss",$searchstr, $searchstr, $searchstr, $searchstr, $searchstr);
        //execute
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }

        }else{
            $data = "NO RECORD";
        }

        return $data;
    }
    //end searchstudent method

    }
    
?>
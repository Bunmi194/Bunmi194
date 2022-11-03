<?php
    include_once "constants.php";
    //class definition
    class Payment{
        //member variables
        public $tenantid;
        public $apartmentid;
        public $reference;
        public $key;
        public $dbcon;

        //member functions

        public function __construct(){
            $this->dbcon = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB_NAME);
            $this->key = "sk_test_1c6935580e77aee5f31ad70219030a3ea7dd09ab";

            if($this->dbcon->connect_error){
                die("Error ".$this->dbcon->connect_error);
            }else{
                //echo "Connection Successful";
            }
        }

        public function insertPaymentRecord($tenantid, $apartmentid, $amount, $reference){
            //prepare the statement
            $stmt = $this->dbcon->prepare("INSERT INTO payments_apartments (tenants_id, apartments_id, amount, reference) VALUES (?,?,?,?)");
            //bind
            $stmt->bind_param("iiss", $tenantid, $apartmentid, $amount, $reference);
            //execute
            $stmt->execute();

            if($stmt->affected_rows == 1){
                //success
                return true;
            }else{
                //failed
                file_put_contents("errorlog.txt", $stmt->error, FILE_APPEND);
                return false;
            }
        }

        public function makePayment($amount, $reference, $email){
            $url = "https://api.paystack.co/transaction/initialize";
            $callback = "http://localhost/homify/paystack_callback.php";
            $key = "sk_test_1c6935580e77aee5f31ad70219030a3ea7dd09ab";

            $message = [
                "email"=>$email,
                "amount"=>$amount * 100,
                "reference"=>$reference,
                "callback_url"=>$callback
            ];

            $messagestr = http_build_query($message);

            //step 1: initialize
            $ch = curl_init();
            //step 2: set call options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $messagestr);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer $key",
                "Cache-Control: no cache"

            ));
            //step 3: execute
            $response = curl_exec($ch);

            if(curl_error($ch) == true){
                die("Paymment failed");
            }

            //step 4

            curl_close($ch);

            $result = json_decode($response);
            return $result;
        }

        public function verifyPayment($reference){
            $url = "https://api.paystack.co/transaction/verify/".$reference;
            //initialize curl
            $ch = curl_init();
            //set call options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//return string instead of printing it out
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //do not verify SSL certificate
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$this->key,
            "Cache-Control: no cache"
        ));
        //execute
        $result = curl_exec($ch);
            if (curl_error($ch)) {
                die("CURL Error: ".curl_error($ch));
            }
        //close
        curl_close($ch);
        return json_decode($result);
        }

        public function updateTransaction($date, $reference){
            $status = "completed";
            $statement = $this->dbcon->prepare("UPDATE payments_apartments SET status=?, updated=? WHERE reference=?");
            $statement->bind_param("sss", $status, $date, $reference);
            $statement->execute();

            if ($statement->affected_rows > 0) {
                return "success";
            }else{
                return "failed";
            }
        }

        //update apartment status after payment
        public function selectApartmentId($reference){
            $statement = $this->dbcon->prepare("SELECT * FROM payments_apartments JOIN apartments ON payments_apartments.apartments_id = apartments.apartments_id WHERE payments_apartments.reference=?");
            $statement->bind_param("s", $reference);
            $statement->execute();
            $result = $statement->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }else{
                return "failed";
            }
        }

        public function updateApartmentStatus($apartmentid){
            $status = "Paid";
            $statement = $this->dbcon->prepare("UPDATE apartments SET status=? WHERE apartments_id=?");
            $statement->bind_param("ss", $status, $apartmentid);
            $statement->execute();

            if ($statement->affected_rows > 0) {
                return "success";
            }else{
                return "failed";
            }
        }
    }
?>
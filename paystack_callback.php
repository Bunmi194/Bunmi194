<?php
session_start();
    include_once "shared/constants.php";
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    //echo $_REQUEST['reference'];
    if (isset($_REQUEST['reference'])) {
        include_once "shared/payment.php";
        //create instance of payment class
        $objpay = new Payment();
        //access verifyPaystackTransaction method
        $result = $objpay->verifyPayment($_REQUEST['reference']);
        // echo "<pre>";
        // print_r($result->data->created_at);
        // echo "</pre>";
        // echo "<br/>";
        // echo "<hr>";
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";

        if ($result->data->status == "success") {    
            $datepaid = $result->data->created_at;
            $reference = $_REQUEST['reference'];
            // access updateTransaction method
            $output = $objpay->updateTransaction($datepaid, $reference);
            
        //     echo "<hr>";   
        // echo "<pre>";
        // print_r($update);
        // echo "</pre>";
        // echo $update['apartments_id'];
            if ($output == "success") {
                # redirect to transaction.php
                $payupdate = new Payment();
                $update = $payupdate->selectApartmentId($reference);            
                $updateApartment = $payupdate->updateApartmentStatus($update['apartments_id']);
                $_SESSION['payment'] = "success";
                header("Location: success.php");
                exit();
            }
            }else{
                die("Oops! something went wrong");
                header("index.php");
                exit();
        }
        
    }
?>
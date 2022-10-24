<?php

    session_start();
    echo $_REQUEST['apartmentid'];
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        
    if(isset($_REQUEST['btnpay']) && $_SESSION['logger'] = "K!NG_DAViD" && isset($_SESSION['id'])){
        
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        //add payment class
        include_once "shared/payment.php";
        //instantiate payment class
        $payobj = new Payment();
        //reference insert transaction method
        $apartmentid = $_REQUEST['apartmentid'];
        $tenantid = $_SESSION['id'];
        $amount = $_REQUEST['amount'];
        $reference = "HOMIFY".time().rand().$apartmentid.$tenantid;
        $email = $_SESSION['email'];
        $insert = $payobj->insertPaymentRecord($tenantid, $apartmentid, $amount, $reference);

        if($insert == true){
            #initialize paystack transaction
            $output = $payobj->makePayment($amount, $reference, $email);

            echo "<pre>";
            print_r($output);
            echo "</pre>";
            $redirect = $output->data->authorization_url;
            if(!empty($redirect)){
                header("Location: $redirect");
                exit;
            }
        }else{
            echo "Oops! something happened!";
        }
    }else{
        header("Location: signin.php");
        exit();
    }

?>


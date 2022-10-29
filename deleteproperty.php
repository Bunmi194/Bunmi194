<?php
    session_start();
    include_once "shared/constants.php";
    include_once "shared/landlord.php";
    if(isset($_REQUEST['btndelete']) && isset($_SESSION['landlord'])){
        $id = $_REQUEST['apt'];
        $delobj = new Landlord;
        $result = $delobj->checkInspectionBeforeDelete($_REQUEST['apt']);
        $resultPay = $delobj->checkPaymentBeforeDelete($_REQUEST['apt']);
        // echo "<pre>";
        // print_r($resultPay);
        // echo "</pre>";
        // exit;

        if ($result['COUNT(apartments_id)'] > 0) {
            $_SESSION['delmsg'] = "<div class='alert alert-danger'>Property has been booked for inspection</div>";
        }elseif($resultPay['COUNT(apartments_id)'] > 0){
            $_SESSION['delmsg'] = "<div class='alert alert-danger'>A pending transaction has been made for this property. Please try again later</div>";
        }else{
            $delobj2 = new Landlord;
        $result2 = $delobj2->deleteProperty($_REQUEST['apt']);

            if ($result2 == true) {
                $_SESSION['delmsg'] = "<div class='alert alert-success'>Property has been successfully deleted</div>";
            }else{
                $_SESSION['delmsg'] = "<div class='alert alert-danger'>Oops! Something went wrong. Please try again later</div>";
            }
        }
        header("Location: myproperties.php");
        exit();
    }
?>
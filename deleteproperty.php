<?php
    session_start();
    include_once "shared/constants.php";
    include_once "shared/landlord.php";
    if(isset($_REQUEST['btndelete'])){
        $id = $_REQUEST['apt'];
        $delobj = new Landlord;
        $result = $delobj->checkInspectionBeforeDelete($_REQUEST['apt']);
        // echo "<pre>";
        // print_r($result['COUNT(apartments_id)']);
        // echo "</pre>";
        // exit;
        if ($result['COUNT(apartments_id)'] > 0) {
            $_SESSION['delmsg'] = "<div class='alert alert-danger'>Property has been booked for inspection</div>";
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
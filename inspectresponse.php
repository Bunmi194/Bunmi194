<?php
session_start();
include_once "shared/constants.php";
include_once "shared/landlord.php";
include_once "shared/common.php";
include_once "shared/tenant.php";

$id = $_REQUEST["apartmentid"];
$landmsg = new Landlord();
   $res = $landmsg->getLandlordId($id);
   $landlord_id = $res[0]['landlords_id'];
   //echo $landlord_id;
   if(!isset($_SESSION['logger']) && !isset(($_SESSION['lastname']))){
    $_SESSION['break'] = "You need to log in to access the page";
    header("Location: signin.php");
    exit();
    }
    
    if(isset($_REQUEST['btnno'])){
        header("Location: more.php?apartmentid=$id");
        exit();
    }elseif(isset($_REQUEST['btninspect']) && $_SESSION['logger'] = "K!NG_DAViD"){
        //method to message owner
        include_once "shared/tenant.php";
        $check = new Common();
        $checkCount = $check->checkForInspection($_SESSION['id'], $id);
        $counter = $checkCount['COUNT(inspection_id)'];
        $obj = new Common();
        $check = $obj->checkStatus($id);
        
        if ($counter > 0) {
            $_SESSION['counter'] = "You have previously made a request to inspect this property!";
            header("Location: more.php?apartmentid=$id");
            exit();
        }elseif ($check['status'] == "Paid") {
            $_SESSION['paid'] = "This property is not available for inspection! Please check for other properties.";
            header("Location: more.php?apartmentid=$id");
            exit();
        }else{
            $aptmsg = new Common();
            $aptmsg2 = new Tenant();
            $result = $aptmsg->inspection($_SESSION['id'], $id);//inspection id
            // echo $result;
            // echo $result;
            // var_dump($result) ;
            
            $message = $_SESSION['lastname']." ".$_SESSION['firstname']." has requested to inspect your property at ".$res[0]['address']." with the title '".$res[0]['title']."'";
            $insert = $aptmsg2->insertTenantMessage($id, $_SESSION['id'], $message, $result);
            $landmsg = new Landlord();
            $landlordmessage = $landmsg->getMessageCount($landlord_id);
            // echo "<pre>";
            // print_r($landlordmessage);
            // echo "</pre>";
            // //if success save success alert in a variable and echo
            $_SESSION['apartmentinspect'] = "Your request to inspect this apartment has been successfully sent. The owner of this property will fix a date for inspection.";
            header("Location: more.php?apartmentid=$id");
            exit();
        }
        
    }

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    
    // echo "<pre>";
    // print_r($res);
    // echo "</pre>";
        
    
?>

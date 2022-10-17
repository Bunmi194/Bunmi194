<?php
session_start();
include_once "shared/constants.php";
include_once "shared/landlord.php";
include_once "shared/tenant.php";
$id = $_SESSION["apartmentid"];
$landmsg = new Landlord();
   $res = $landmsg->getLandlordId($id);
   $landlord_id = $res[0]['landlords_id'];
   echo $landlord_id;
    if(isset($_REQUEST['btnno'])){
        header("Location: more.php?apartmentid=$id");
        exit();
    }elseif(isset($_REQUEST['btnyes'])){
        //method to message owner

        $aptmsg = new Tenant();
        $result = $aptmsg->inspection($_SESSION['id'], $id);//inspection id
        // echo $result;
        // echo $result;
        // var_dump($result) ;
        $message = $_SESSION['lastname']." ".$_SESSION['firstname']." has requested to inspect your property at ".$res[0]['address']." with the title '".$res[0]['title']."'";
        $insert = $aptmsg->insertTenantMessage($_SESSION['apartmentid'], $_SESSION['id'], $message, $result);
        $landmsg = new Landlord();
        $landlordmessage = $landmsg->getMessageCount($landlord_id);
        echo "<pre>";
        print_r($landlordmessage);
        echo "</pre>";
        // //if success save success alert in a variable and echo
        $_SESSION['apartmentinspect'] = "Your request to inspect this apartment has been successfully sent. The owner of this property will fix a date for inspection.";
        header("Location: more.php?apartmentid=$id");
        exit();
    }

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    
    echo "<pre>";
    print_r($res);
    echo "</pre>";
        
    
?>

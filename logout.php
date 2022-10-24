<?php
    include_once "shared/landlord.php";
    include_once "shared/tenant.php";
    $object = new Landlord();
    $object->logout();

    if(isset($_REQUEST['tenbtnlogout'])){
        $object = new Tenant();
        $object->logout();
    }

    if(isset($_REQUEST['btnphsignout'])){
        $object = new Common();
        $object->logout();
    }

    
?>
<?php
    session_start();
    include_once "shared/constants.php";
    include_once "shared/tenant.php";
    include_once "shared/landlord.php";

    if (isset($_SESSION['id']) && $_SESSION['logger'] = "K!NG_DAViD") {
        //tenant suspension
        if (isset($_REQUEST['btnsuspend'])) {
            //suspend tenant
            $obj = new Tenant();
            $suspensionStatus = $obj->isSuspended($_REQUEST['id']);
            echo "<pre>";
            print_r($suspensionStatus);
            echo "</pre>";
            if ($suspensionStatus['active_status'] == "active") {
                $suspend = new Tenant();
                $suspendTenant = $suspend->suspendTenant($_REQUEST['id']);
                $_SESSION['suspension_status'] = 'Tenant has been suspended';
                header("Location: alltenants.php");
                exit();
            }else{
                $_SESSION['suspension_status'] = 'Tenant has already been suspended';
                header("Location: alltenants.php");
                exit();
            }
        }
        if (isset($_REQUEST['btnunsuspend'])) {
            //unsuspend tenant
            $obj = new Tenant();
            $suspensionStatus = $obj->isSuspended($_REQUEST['id']);
            echo "<pre>";
            print_r($suspensionStatus);
            echo "</pre>";
            if ($suspensionStatus['active_status'] != "active") {
                $unsuspend = new Tenant();
                $unsuspendTenant = $unsuspend->unsuspendTenant($_REQUEST['id']);
                $_SESSION['suspension_status'] = 'Tenant is now active';
                header("Location: alltenants.php");
                exit();
            }else{
                $_SESSION['suspension_status'] = 'Tenant is already active';
                header("Location: alltenants.php");
                exit();
            }
        }
        
    }
?>
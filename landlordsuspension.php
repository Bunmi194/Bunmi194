<?php
    session_start();
    include_once "shared/constants.php";
    include_once "shared/tenant.php";
    include_once "shared/landlord.php";

    if (isset($_SESSION['id']) && $_SESSION['logger'] = "K!NG_DAViD") {
        //landlord suspension
        if (isset($_REQUEST['btnsuspend'])) {
            //suspend landlord
            $obj = new Landlord();
            $suspensionStatus = $obj->isSuspended($_REQUEST['id']);
            echo "<pre>";
            print_r($suspensionStatus);
            echo "</pre>";
            if ($suspensionStatus['active_status'] == "active") {
                $suspend = new Landlord();
                $suspendTenant = $suspend->suspendLandlord($_REQUEST['id']);
                $_SESSION['suspension_status'] = 'Landlord has been suspended';
                header("Location: alllandlords.php");
                exit();
            }else{
                $_SESSION['suspension_status'] = 'Landlord has already been suspended';
                header("Location: alllandlords.php");
                exit();
            }
        }
        if (isset($_REQUEST['btnunsuspend'])) {
            //unsuspend landlord
            $obj = new Landlord();
            $suspensionStatus = $obj->isSuspended($_REQUEST['id']);
            echo "<pre>";
            print_r($suspensionStatus);
            echo "</pre>";
            if ($suspensionStatus['active_status'] != "active") {
                $unsuspend = new Landlord();
                $unsuspendTenant = $unsuspend->unsuspendLandlord($_REQUEST['id']);
                $_SESSION['suspension_status'] = 'Landlord is now active';
                header("Location: alllandlords.php");
                exit();
            }else{
                $_SESSION['suspension_status'] = 'Landlord is already active';
                header("Location: alllandlords.php");
                exit();
            }
        }
        
    }
?>
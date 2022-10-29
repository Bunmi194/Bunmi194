<?php
session_start();
include_once "shared/constants.php";
include_once "shared/landlord.php";
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
    if(isset($_REQUEST['btnreject'])){
        //rejected
        $rejectmsg = new Landlord();
        $out = $rejectmsg->rejectRequest($_REQUEST['id']);
        if($out == true){
            $_SESSION['cancel'] = "Request has been successfully cancelled.";
            header("Location: inspectionbooked.php");
            exit();
        }else{
            $_SESSION['cancel'] = "Request has been successfully cancelled.";
            header("Location: inspectionbooked.php");
            exit();
        }
        //header("Location: messages.php");


    }elseif(isset($_REQUEST['btnaccept'])){
        //accepted
        //go to date time page and book
        $error = array();
        
        $date = date_create($_REQUEST['date']);
        $now = date_create(date('Y-m-d'));
        // echo "<pre>";
        // print_r(date_diff($now, $date));
        // echo "</pre>";
        $interval = date_diff($now, $date)->invert;
        if(empty($_REQUEST['date']) || empty($_REQUEST['time'])){
            //please fill all fields
            $error['field'] = "Please choose a date and time";
            include_once "inspectionbooking.php";
            exit();
        }elseif($interval != 0){
            $error['dateinterval'] = "Please choose a valid date";
            include_once "inspectionbooking.php";
            exit();
        }else{
        $msg = "booked";
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        $bookmsg = new Landlord();
        $out = $bookmsg->acceptRequest($msg, $date, $time, $_REQUEST['id']);

            if ($out == 1) {
                $_SESSION['booked'] = "You have successfully booked a property for inspection. Please check your inspection dashboard to keep track of events.";
                header("Location: inspectionbooked.php");
                exit();
            }else{
                $_SESSION['booked'] = "Oops! Something went wrong. Please try again later.";
                header("Location: inspectionbooked.php");
                exit();
            }

        
       
    //    var_dump(date($_REQUEST['date']));
    //    var_dump(date($_REQUEST['time']));
//       echo date($_REQUEST['time']);
        }
    }else{
        header("Location: inspectionbooked.php");
        exit();
    }

?>
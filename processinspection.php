<?php
session_start();
include_once "shared/constants.php";
include_once "shared/landlord.php";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
    if(isset($_REQUEST['btnno']) || isset($_REQUEST['btncancel'])){
        unset($_SESSION['inspection_id']);
        header("Location: messages.php");
        exit();
    }elseif(isset($_REQUEST['btnyes'])){
        //rejected
        $msg = "cancelled";
        $rejectmsg = new Landlord();
        $out = $rejectmsg->rejectRequest($msg, $_SESSION['inspection_id']);
       var_dump($out);
        if($out){
            $output = "Request has been successfully cancelled";
        }else{
            $output = "Oops! Something went wrong";
        }
        header("Location: messages.php");
        return $output;

    }elseif(isset($_REQUEST['btnaccept'])){
        //accepted
        //go to date time page and book
        $error = array();
        if(empty($_REQUEST['date']) || empty($_REQUEST['time'])){
            //please fill all fields
            $error[] = "Please choose a date and time";
            include_once "inspectionbooking.php";
            exit();
        }else{
        $msg = "booked";
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        $bookmsg = new Landlord();
        $out = $bookmsg->acceptRequest($msg, $date, $time, $_SESSION['inspection_id']);

        $_SESSION['booked'] = "You have successfully booked a property for inspection. Please check your inspection dashboard to keep track of events.";
        header("Location: inspectionbooked.php");
       
    //    var_dump(date($_REQUEST['date']));
    //    var_dump(date($_REQUEST['time']));
//       echo date($_REQUEST['time']);
        }
    }

?>
<?php
    include_once "shared/constants.php";

    //login for landlords

    

    if(isset($_REQUEST['btnsubmit'])){
        # validate login form
        $errors = array();
        if(empty($_REQUEST['email'])){
            $errors['email'] = "Email field is required";
        }
        if(empty($_REQUEST['password'])){
            $errors['password'] = "Password field is required";
        }
        //check if there is no validation error
        if(empty($errors)){
            //add object of student class
            include_once "shared/landlord.php";
        //create object of student class
                $obj = new Landlord();
        // reference login method

        $output = $obj->login($_REQUEST['email'], $_REQUEST['password']);
        if($output == false){
            $errors['signin'] = "Invalid username of password!";
        }else{
            //redirect the user to dashboard
            header("Location: landashboard.php");
            exit();
        }
    }
}

    //login for tenants
    
    if(isset($_REQUEST['tenbtnsubmit'])){
        # validate login form
        $errors = array();
        if(empty($_REQUEST['tenemail'])){
            $errors['tenemail'] = "Email field is required";
        }
        if(empty($_REQUEST['tenpassword'])){
            $errors['tenpassword'] = "Password field is required";
        }
        //check if there is no validation error
        if(empty($errors)){
            //add object of student class
            include_once "shared/tenant.php";
        //create object of student class
        $obj = new Tenant();
        // reference login method

        $output = $obj->login($_REQUEST['tenemail'], $_REQUEST['tenpassword']);
        if($output == false){
            $errors['tensignup'] = "Invalid username of password!";
        }else{
            //redirect the user to dashboard
            header("Location: tendashboard.php");
            exit();
        }
    }
}

?>
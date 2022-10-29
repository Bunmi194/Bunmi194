<?php
    include_once "portalheader.php";
?>
    <?php    
    // session_start();
    // if (isset($_SESSION['lastname'])) {
    //     //check
    // }else{
    //     include_once "header.php";
    // }  
    include_once "shared/constants.php";

//     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["btnregister"])){
//         //validate
        
//     $errors = array();
//         // validate
//         $errors = array(); //empty array
//         if(empty($_REQUEST['firstname'])){
//             $errors['errfirstname'] = "Firstname field is required!";
//         }
//         if(empty($_REQUEST['lastname'])){
//             $errors['errlastname'] = "Lastname field is required!";
//         }
//         if(empty($_REQUEST['address'])){
//             $errors['erraddress'] = "Address field is required!";
//         }
//         if(empty($_REQUEST['email'])){
//             $errors['erremail'] = "Email Address field is required!";
//         }
//         if(empty($_REQUEST['phone'])){
//             $errors['errphone'] = "Phone Number field is required!";
//         }
//         if(empty($_REQUEST['nin'])){
//             $errors['errnin'] = "NIN field is required!";
//         }
//         if(empty($_REQUEST['admin_id'])){
//             $errors['erradmin_id'] = "Admin ID field is required!";
//         }
//         if(empty($_REQUEST['keylogin'])){
//             $errors['errkeylogin'] = "Key field is required!";
//         }
//         if(empty($_REQUEST['propertyvalidationnumber'])){
//             $errors['errpropertyvalidationnumber'] = "Property Validation Number field is required!";
//         }
//         if(empty($_REQUEST['password'])){
//             $errors['errpwd'] = "Password field is required!";
//         }elseif(strlen($_REQUEST['password']) < 6){
//             $errors['errpwd'] = "Password must be more than 5 characters!";
//         }elseif($_REQUEST['password'] != $_REQUEST['confirmpassword']){
//             $errors['errpwd'] = "Passwords don't match";
//         }
//         //check if there is no validation error
//         if(empty($errors)){
//             #process the form data            
//             include_once "shared/landlord.php";

//         //end validate
//         $landlord = new Landlord();
//     $insert = $landlord->register($_REQUEST['lastname'], $_REQUEST['firstname'], $_REQUEST['address'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['password'], $_REQUEST['propertyvalidationnumber'], $_REQUEST['accountname'], $_REQUEST['accountnumber'], $_REQUEST['bankname'], $_REQUEST['nin'], $_REQUEST['admin_id'], $_REQUEST['keylogin']) ;
//     if($insert != "cool"){
//         echo $insert;
//     }else{
//         header("Location: tendashboard.php");
//     }
//     }
// }
//     //tenant form
//     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["tenbtnregister"])){
//         //validate
        
//     $errors = array();
//     // validate
//     $errors = array(); //empty array
//     if(empty($_REQUEST['tenfirstname'])){
//         $errors['errtenfirstname'] = "Firstname field is required!";
//     }
//     if(empty($_REQUEST['tenlastname'])){
//         $errors['errtenlastname'] = "Lastname field is required!";
//     }
//     if(empty($_REQUEST['tenaddress'])){
//         $errors['errtenaddress'] = "Address field is required!";
//     }
//     if(empty($_REQUEST['tenemail'])){
//         $errors['errtenemail'] = "Email Address field is required!";
//     }
//     if(empty($_REQUEST['tenphone'])){
//         $errors['errtenphone'] = "Phone Number field is required!";
//     }
//     if(empty($_REQUEST['tennin'])){
//         $errors['errnin'] = "NIN field is required!";
//     }
//     if(empty($_REQUEST['tenpassword'])){
//         $errors['errtenpwd'] = "Password field is required!";
//     }elseif(strlen($_REQUEST['tenpassword']) < 6){
//         $errors['errtenpwd'] = "Password must be more than 5 characters!";
//     }elseif($_REQUEST['tenpassword'] != $_REQUEST['tenconfirmpassword']){
//         $errors['errtenpwd'] = "Passwords don't match";
//     }
//     //check if there is no validation error
//     if(empty($errors)){
//         #process the form data            
//         include_once "shared/tenant.php";
//         $tenant = new Tenant();
//         $insert = $tenant->register($_REQUEST['tenlastname'], $_REQUEST['tenfirstname'], $_REQUEST['tenaddress'], $_REQUEST['tenemail'], $_REQUEST['tenphone'], $_REQUEST['tenpassword'], $_REQUEST['tennin']) ;
//         if($insert != "cool"){
//             echo $insert;
//         }else{

//             header("Location: index.php");
//         }
//         }
// }
    
    include_once "shared/tenant.php";
    $tenant = new Tenant();
    $count = $tenant->getInspectionCount($_SESSION['id']);
    $amountCount = $tenant->amountCount($_SESSION['id']);
    $countRent = $tenant->countRentedProperties($_SESSION['id']);
    // echo "<pre>";
    // print_r($countRent);
    // echo "</pre>";
    // exit();
?>
<style>
    .username{
        background-color: #ddd;
    }
    .username h3{
        margin-top: 20px;
    }
    #dashwrapchild1{
        background-color: #023430;
    }
    .dashboarditems a{
        color: #fff;
    }
    .dashboarditems{
        background-color: #000;
        color: #fff;
    }
    #inspection, .inspection{
        background-color: navy;
    }
    #payments, .payments{
        background-color: green;
    }
    #apartments, .apartments{
        background-color: red;
    }
    .dashboardblock{
        background-color: #ddd;
        padding: 30px;
    }
    .inner p{
        font-weight: bold;
        text-align: center;
        color: #fff;
    }
    .innerbig p{
        font-weight: bold;
        text-align: center;
        color: #fff;
        margin: auto;
        padding-top: 100px;
    }
    
    .dashboardbottom{
            margin: 100px 0px 0px 0px;
        }
        .landashboard{
            margin-top: 50px;
            margin-bottom: 100px;
        }
        .username h3{
            padding-top: 20px;
        }
        @media screen and (min-width: 300px) and (max-width: 400px){
            .innerbig{
                width: 40px;
                margin: 0px -100px !important;
                padding: 0px -100px !important;
            }
        }
        @media screen and (max-width: 1000px){
            .innerbig{
                width: 80px;
                margin: 0px -100px !important;
                padding: 0px -100px !important;
            }
            .small{
                width: 50%;
            }
        }
        @media screen and (max-width: 1200px){
            .innerbig{
                width: 200px;
                margin: 0px -100px !important;
                padding: 0px -100px !important;
            }
            .small{
                width: 60%;
            }
        }
</style>

    <div>
        <div class="dashwrap">            
            <div class="dashwrapchild" id="dashwrapchild1">
                <div class="profilepix hide">
                    <img src="images/yaba.jpg" alt="profile photo" class="img-fluid">
                </div>
                <div class="username small">
                    <h3><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']?></h3>
                </div>
                <div class="dashboardbottom">
                    <a href="#">
                        <div class="dashboarditems">
                            Dashboard
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Inspections
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Payments
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Rented Properties
                        </div>
                    </a>

                </div>
            </div>
            <div class="dashwrapchild" id="dashwrapchild2">
                <div class="header">
                    <a href="tenproperties.php" class="btn btn-success block">Rented Properties: <?php echo $countRent['COUNT(payments_id)']?></a>
                    <a href="tenpayments.php" class="btn btn-primary block">Payments: <?php 
                        if ($amountCount[0]['SUM(amount)'] > 0) {
                            echo "&#8358;".number_format($amountCount[0]['SUM(amount)']);
                        }else{
                            echo "&#8358;0";
                        }
                    ?></a>
                    <a href="tenmessages.php" class="btn btn-secondary block">Inspections: <?php echo $count['COUNT(inspection_id)'] ?></a>
                    <button name="tenbtnlogout" type="button" class="btn btn-primary block"><a href="logout.php">Log Out</a></button>
                    
                </div>
                <h2 class="dashboardblock landashboard">My Dashboard</h2>
                <div class="innerdashboard">
                    <div class="innerbig inspection">
                        <p>Total: <?php echo $count['COUNT(inspection_id)'] ?></p>
                        <p>Inspections</p>
                    </div>
                    <div class="innerbig payments">
                        <p>Total: <?php 
                        if ($amountCount[0]['SUM(amount)'] > 0) {
                            echo "&#8358;".number_format($amountCount[0]['SUM(amount)']);
                        }else{
                            echo "&#8358;0";
                        }
                    ?></p>
                        <p>Payments</p>
                    </div>
                    <div class="innerbig apartments">
                        <p>Total: <?php echo $countRent['COUNT(payments_id)']?></p>
                        <p>Rented Apartments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once "footer.php";
?>
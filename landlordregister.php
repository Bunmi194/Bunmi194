<?php    
    session_start();
    include_once "shared/constants.php";
    include_once "shared/landlord.php";
    if (isset($_SESSION['lastname'])) {
        include_once "styleheader.php";
    }else{
        include_once "header.php";
    }  

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["btnregister"])){
        //validate
        
        
        //email   
        $check = new Landlord();
        $checkEmail = $check->lookForEmail($_REQUEST['email']);
        //phone
        $checkPhone = $check->lookForPhone($_REQUEST['phone']);
        //nin
        $checkNin = $check->lookForNin($_REQUEST['nin']);


    $errors = array();
        // validate
        $errors = array(); //empty array
        if($checkEmail == "yes"){
            $errors['checkEmail'] = "Email already exists!";
        }
        if($checkPhone == "yes"){
            $errors['checkPhone'] = "Phone number already exists!";
        }
        if($checkNin == "yes"){
            $errors['checkNin'] = "Nin already exists!";
        }
        
        

        if(empty($_REQUEST['firstname'])){
            $errors['errfirstname'] = "Firstname field is required!";
        }
        if(empty($_REQUEST['lastname'])){
            $errors['errlastname'] = "Lastname field is required!";
        }
        if(empty($_REQUEST['address'])){
            $errors['erraddress'] = "Address field is required!";
        }
        if(empty($_REQUEST['email'])){
            $errors['erremail'] = "Email Address field is required!";
        }
        if(empty($_REQUEST['phone'])){
            $errors['errphone'] = "Phone Number field is required!";
        }
        if(empty($_REQUEST['nin'])){
            $errors['errnin'] = "NIN field is required!";
        }
        if(empty($_REQUEST['admin_id'])){
            $errors['erradmin_id'] = "Admin ID field is required!";
        }

        if(!empty($_REQUEST['admin_id']) && ($_REQUEST['admin_id'] != 1)){
            $errors['erradmin_id'] = "Incorrect Admin ID! Please contact your administrator";
        }

        if(empty($_REQUEST['keylogin'])){
            $errors['errkeylogin'] = "Key field is required!";
        }

        if(!empty($_REQUEST['keylogin']) && ($_REQUEST['keylogin'] != "JKL194LA")){
            $errors['errkeylogin'] = "Key does not exist! Please contact your administrator";
        }

        if(empty($_REQUEST['propertyvalidationnumber'])){
            $errors['errpropertyvalidationnumber'] = "Property Validation Number field is required!";
        }
        if(empty($_REQUEST['password'])){
            $errors['errpwd'] = "Password field is required!";
        }elseif(strlen($_REQUEST['password']) < 6){
            $errors['errpwd'] = "Password must be more than 5 characters!";
        }elseif($_REQUEST['password'] != $_REQUEST['confirmpassword']){
            $errors['errpwd'] = "Passwords don't match";
        }
        //check if there is no validation error
        if(empty($errors)){
            #process the form data            
            include_once "shared/landlord.php";

        //end validate
        $landlord = new Landlord();
    $insert = $landlord->register($_REQUEST['lastname'], $_REQUEST['firstname'], $_REQUEST['address'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['password'], $_REQUEST['propertyvalidationnumber'], $_REQUEST['accountname'], $_REQUEST['accountnumber'], $_REQUEST['bankname'], $_REQUEST['nin'], $_REQUEST['admin_id'], $_REQUEST['keylogin']) ;
    if($insert != "cool"){
        $_SESSION['errten'] = "Oops! something went wrong";
        header("Location: landlordregister.php");
        exit();
    }else{
        $_SESSION['lastname'] = $_REQUEST['lastname'];
        $_SESSION['firstname'] = $_REQUEST['firstname'];
        $_SESSION['email'] = $_REQUEST['email'];
        $_SESSION['landlord'] = "landlord";
        $_SESSION['logger'] = "K!NG_DAViD";
        header("Location: landashboard.php");
        exit();
    }
    }
}
    //tenant form
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
//             header("Location: landashboard.php");
//             exit();
//         }
//         }
// }
    ?>
<style>
    .choice{
        font-size: 18px;
        text-align: center;
        margin: 100px 0px 0px 0px;
        padding: 10px;
        background-color: #ddd;
        font-weight: bold;
    
    }
    .regstyle{
        height: 100px;
        background-color: #ddd;
    }
    .registercontainer{
    display: flex;
    justify-content: space-between;
    margin: 0%;
    }
    #registerform2{
        background-color: #000 !important;
        color: #fff;
        margin-bottom: 0px;
    }
    #registerform1{
        margin-bottom: 0px;
    }
    .error{
        padding-left: 0px !important;
        padding-top: -80px !important;
        padding-bottom: -80px !important;
        color: red !important;
        font-size: 14px;
    }
</style>

<div class="choice">
<?php
        if (isset($_SESSION['errten'])) {
            echo "<p class='error'>".$_SESSION['errten']."</p>";
            unset($_SESSION['errten']);
        }
    ?>
    
<p><b>Click the button below to register as a tenant.</b></p>
        <a href="register.php" class="btn btn-primary">Tenants</a>
</div>
    <div class="registercontainer">
        <div class="registerstyle">
            <h1><b>Get Homified!</b></h1>
        </div>
        <div class="registerstyle2">
        <form action="" method="POST" id="registerform1" class="form-control">
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="firstname" class="form-label">First Name: </label>
                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?php if(isset($_REQUEST['firstname'])) echo $_REQUEST['firstname']?>">
                        <?php if(isset($errors['errfirstname'])) echo "<p class='error'>".$errors['errfirstname']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label for="lastname" class="form-label">Last Name: </label>
                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php if(isset($_REQUEST['lastname'])) echo $_REQUEST['lastname']?>">
                        <?php if(isset($errors['errlastname'])) echo "<p class='error'>".$errors['errlastname']."</p>"?>
                    </div>

                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="email" class="form-label">Email: </label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php if(isset($_REQUEST['email'])) echo $_REQUEST['email']?>">
                        <?php if(isset($errors['erremail'])) echo "<p class='error'>".$errors['erremail']."</p>"?>
                        <?php if(isset($errors['checkEmail'])) echo "<p class='error'>".$errors['checkEmail']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label for="lastname" class="form-label">Phone Number: </label>
                        <input class="form-control" type="text" name="phone" id="phone" value="<?php if(isset($_REQUEST['phone'])) echo $_REQUEST['phone']?>">
                        <?php if(isset($errors['errphone'])) echo "<p class='error'>".$errors['errphone']."</p>"?>
                        <?php if(isset($errors['checkPhone'])) echo "<p class='error'>".$errors['checkPhone']."</p>"?>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="bankname" class="form-label">Bank Name: </label>
                        <input class="form-control" type="text" name="bankname" id="bankname" value="<?php if(isset($_REQUEST['bankname'])) echo $_REQUEST['bankname']?>">
                    </div>
                    <div class="formwrapchild">
                        <label for="accountnumber" class="form-label">Account Number: </label>
                        <input class="form-control" type="number" name="accountnumber" id="accountnumber" value="<?php if(isset($_REQUEST['accountnumber'])) echo $_REQUEST['accountnumber']?>">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="accountname" class="form-label">Account Name: </label>
                        <input class="form-control" type="text" name="accountname" id="accountname" value="<?php if(isset($_REQUEST['accountname'])) echo $_REQUEST['accountname']?>">
                    </div>
                    <div class="formwrapchild">
                        <label for="nin" class="form-label">National Identification Number: </label>
                        <input class="form-control" type="text" name="nin" id="nin" value="<?php if(isset($_REQUEST['nin'])) echo $_REQUEST['nin']?>">
                        <?php if(isset($errors['errnin'])) echo "<p class='error'>".$errors['errnin']."</p>"?>
                        <?php if(isset($errors['checkNin'])) echo "<p class='error'>".$errors['checkNin']."</p>"?>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="propertyvalidationnumber">Property Validation Number: </label>
                        <input class="form-control" type="text" name="propertyvalidationnumber" id="propertyvalidationnumber" value="<?php if(isset($_REQUEST['propertyvalidationnumber'])) echo $_REQUEST['propertyvalidationnumber']?>">
                        <?php if(isset($errors['errpropertyvalidationnumber'])) echo "<p class='error'>".$errors['errpropertyvalidationnumber']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="address">Address: </label><br>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="2"><?php if(isset($_REQUEST['address'])) echo $_REQUEST['address']?></textarea>
                        <?php if(isset($errors['erraddress'])) echo "<p class='error'>".$errors['erraddress']."</p>"?>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="password">Password: </label>
                        <input class="form-control" type="password" name="password" id="password">
                        <?php if(isset($errors['errpwd'])) echo "<p class='error'>".$errors['errpwd']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="confirmpassword">Confirm Password: </label>
                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="text">Admin ID: </label>
                        <input class="form-control" type="text" name="admin_id" id="admin_id" value="<?php if(isset($_REQUEST['admin_id'])) echo $_REQUEST['admin_id']?>">
                        <?php if(isset($errors['erradmin_id'])) echo "<p class='error'>".$errors['erradmin_id']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="keylogin">Key: </label>
                        <input class="form-control" type="password" name="keylogin" id="keylogin" value="<?php if(isset($_REQUEST['firstname'])) echo $_REQUEST['firstname']?>">
                        <?php if(isset($errors['errkeylogin'])) echo "<p class='error'>".$errors['errkeylogin']."</p>"?>
                    </div>
                </div>
                <button type="reset" name="btnreset" id="btnreset">Reset</button>
                <button type="submit" name="btnregister" id="btnregister">Register</button>
            </form>
        </div>

    </div>
    <div class="regstyle">

    </div>
    <script src="jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#registerform1').hide()
    

    //     $('.regtype').click(function(){
    //         if($('#reglandlord').prop("checked")){
    //             $('#registerform1').show();
    //             $('#registerform2').hide();
    //         }else{
    //             $('#registerform1').hide();
    //             $('#registerform2').show();
    //         }
    //     })
    // }
        //);
</script>



<?php
    include_once "footer.php";
?>
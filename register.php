<?php
include_once "shared/constants.php";
?>
<?php    
    session_start();
    if (isset($_SESSION['lastname'])) {
        include_once "styleheader.php";
    }else{
        include_once "header.php";
    }  

    //if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["btnregister"]) ){
        //validate
        
    //$errors = array();
        // validate
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
//     $insert = $landlord->register($_REQUEST['lastname'], $_REQUEST['firstname'], $_REQUEST['address'], $_REQUEST['email'], $_REQUEST['phone'], $_REQUEST['password'], $_REQUEST['propertyvalidationnumber'], $_REQUEST['accountname'], $_REQUEST['accountnumber'], $_REQUEST['bankname'], $_REQUEST['nin'], $_REQUEST['admin_id'], $_REQUEST['keylogin']);
//     if($insert != "cool"){
//         echo $insert;
//     }else{        
//         $_SESSION['lastname'] = $_REQUEST['tenlastname'];
//         $_SESSION['firstname'] = $_REQUEST['tenfirstname'];
//         $_SESSION['email'] = $_REQUEST['tenemail'];
//         $_SESSION['id'] = $id;
//         $_SESSION['logger'] = "K!NG_DAViD";
//         header("Location: tendashboard.php");
//     }
//     }
// }
    //tenant form
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["tenbtnregister"]) && $_SESSION['logger'] = "K!NG_DAViD"){
        //validate
        
    $errors = array();
    // validate
    $errors = array(); //empty array
    if(empty($_REQUEST['tenfirstname'])){
        $errors['errtenfirstname'] = "Firstname field is required!";
    }
    if(empty($_REQUEST['tenlastname'])){
        $errors['errtenlastname'] = "Lastname field is required!";
    }
    if(empty($_REQUEST['tenaddress'])){
        $errors['errtenaddress'] = "Address field is required!";
    }
    if(empty($_REQUEST['tenemail'])){
        $errors['errtenemail'] = "Email Address field is required!";
    }
    if(empty($_REQUEST['tenphone'])){
        $errors['errtenphone'] = "Phone Number field is required!";
    }
    if(empty($_REQUEST['tennin'])){
        $errors['errnin'] = "NIN field is required!";
    }
    if(empty($_REQUEST['tenpassword'])){
        $errors['errtenpwd'] = "Password field is required!";
    }elseif(strlen($_REQUEST['tenpassword']) < 6){
        $errors['errtenpwd'] = "Password must be more than 5 characters!";
    }elseif($_REQUEST['tenpassword'] != $_REQUEST['tenconfirmpassword']){
        $errors['errtenpwd'] = "Passwords don't match";
    }
    //check if there is no validation error
    if(empty($errors)){
        #process the form data            
        include_once "shared/tenant.php";
        $tenant = new Tenant();
        $insert = $tenant->register($_REQUEST['tenlastname'], $_REQUEST['tenfirstname'], $_REQUEST['tenaddress'], $_REQUEST['tenemail'], $_REQUEST['tenphone'], $_REQUEST['tenpassword'], $_REQUEST['tennin']) ;
        if($insert != "cool"){
            //echo $insert;
            $_SESSION['errten'] = "Oops! something went wrong";
            header("Location: register.php");
            exit();
            
        }else{
        $_SESSION['lastname'] = $_REQUEST['tenlastname'];
        $_SESSION['firstname'] = $_REQUEST['tenfirstname'];
        $_SESSION['email'] = $_REQUEST['tenemail'];
        $_SESSION['logger'] = "K!NG_DAViD";
        header("Location: tendashboard.php");
        exit();
        }
        }
}
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
    
<p><b>Click the button below to register as a landlord.</b></p>
        <a href="landlordregister.php" class="btn btn-primary">Landlords</a>
        </div>
    <div class="registercontainer">
        <div class="registerstyle">
            <h1>Get Homified!</h1>
        </div>
        <div class="registerstyle2">
         
            <form action="" method="POST" id="registerform2" class="form-control">
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenfirstname">First Name: </label>
                        <input class="form-control" type="text" name="tenfirstname" id="tenfirstname" value="<?php if(isset($_REQUEST['tenfirstname'])) echo $_REQUEST['tenfirstname']?>">
                        <?php if(isset($errors['errtenfirstname'])) echo "<p class='error'>".$errors['errtenfirstname']."</p>"?>
                        

                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenlastname">Last Name: </label>
                        <input class="form-control" type="text" name="tenlastname" id="tenlastname" value="<?php if(isset($_REQUEST['tenlastname'])) echo $_REQUEST['tenlastname']?>">
                        <?php if(isset($errors['errtenlastname'])) echo "<p class='error'>".$errors['errtenlastname']."</p>"?>
                    </div>

                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenemail">Email: </label>
                        <input class="form-control" type="email" name="tenemail" id="tenemail" value="<?php if(isset($_REQUEST['tenemail'])) echo $_REQUEST['tenemail']?>">
                        <?php if(isset($errors['errtenemail'])) echo "<p class='error'>".$errors['errtenemail']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenphone">Phone Number: </label>
                        <input class="form-control" type="text" name="tenphone" id="tenphone" value="<?php if(isset($_REQUEST['tenphone'])) echo $_REQUEST['tenphone']?>">
                        <?php if(isset($errors['errtenphone'])) echo "<p class='error'>".$errors['errtenphone']."</p>"?>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenaddress">Address: </label><br>
                        <textarea class="form-control" name="tenaddress" id="tenaddress" cols="30" rows="2"><?php if(isset($_REQUEST['tenaddress'])) echo $_REQUEST['tenaddress']?></textarea>
                        <?php if(isset($errors['errtenaddress'])) echo "<p class='error'>".$errors['errtenaddress']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenaddress">National Identification Number: </label>
                        <input class="form-control" type="text" name="tennin" id="tenaddress" value="<?php if(isset($_REQUEST['tennin'])) echo $_REQUEST['tennin']?>">
                        <?php if(isset($errors['errnin'])) echo "<p class='error'>".$errors['errnin']."</p>"?>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenpassword">Password: </label>
                        <input class="form-control" type="password" name="tenpassword" id="tenpassword">
                        <?php if(isset($errors['errtenpwd'])) echo "<p class='error'>".$errors['errtenpwd']."</p>"?>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenconfirmpassword">Confirm Password: </label>
                        <input class="form-control" type="password" name="tenconfirmpassword" id="tenconfirmpassword">
                        <?php if(isset($errors['errtenemail'])) echo "<p class='error'>".$errors['errtenemail']."</p>"?>
                    </div>
                </div>
                <button type="reset" name="btnreset" id="btnreset">Reset</button>
                <button type="submit" name="tenbtnregister" id="tenbtnregister">Register</button>
            </form>
        </div>

    </div>
    <div class="regstyle">

    </div>
    <script src="jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#registerform1').hide()
    

        $('.regtype').click(function(){
            if($('#reglandlord').prop("checked")){
                $('#registerform1').show();
                $('#registerform2').hide();
            }else{
                $('#registerform1').hide();
                $('#registerform2').show();
            }
        })
    }
        );
</script>



<?php
    include_once "footer.php";
?>
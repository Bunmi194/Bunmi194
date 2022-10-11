<?php        
    include_once "shared/constants.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["btnregister"])){
        //validate
        
    $errors = array();
        // validate
        $errors = array(); //empty array
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
        if(empty($_REQUEST['keylogin'])){
            $errors['errkeylogin'] = "Key field is required!";
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
        echo $insert;
    }else{
        header("Location: landashboard.php");
    }
    }
}
    //tenant form
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["tenbtnregister"])){
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
            echo $insert;
        }else{
            header("Location: landashboard.php");
        }
        }
}
    ?>
    <?php
    include_once "header.php";
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
</style>

<div class="choice">
    
<p>Register as a...?</p>
        <input type="radio" name="signintype" id="reglandlord" class="regtype">
        <label for="reglandlord">Landlord</label>
        <input type="radio" name="signintype" id="regtenant" class="regtype" checked>
        <label for="regtenant">Tenant</label>
        </div>
    <div class="registercontainer">
        <div class="registerstyle">
            <h1>Get Homified!</h1>
        </div>
        <div class="registerstyle2">
            <form action="#" method="POST" id="registerform1" class="form-control">
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="firstname" class="form-label">First Name: </label>
                        <input class="form-control" type="text" name="firstname" id="firstname">
                    </div>
                    <div class="formwrapchild">
                        <label for="lastname" class="form-label">Last Name: </label>
                        <input class="form-control" type="text" name="lastname" id="lastname">
                    </div>

                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="email" class="form-label">Email: </label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                    <div class="formwrapchild">
                        <label for="lastname" class="form-label">Phone Number: </label>
                        <input class="form-control" type="text" name="phone" id="phone">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="bankname" class="form-label">Bank Name: </label>
                        <input class="form-control" type="text" name="bankname" id="bankname">
                    </div>
                    <div class="formwrapchild">
                        <label for="accountnumber" class="form-label">Account Number: </label>
                        <input class="form-control" type="text" name="accountnumber" id="accountnumber">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label for="accountname" class="form-label">Account Name: </label>
                        <input class="form-control" type="text" name="accountname" id="accountname">
                    </div>
                    <div class="formwrapchild">
                        <label for="nin" class="form-label">National Identification Number: </label>
                        <input class="form-control" type="text" name="nin" id="nin">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="propertyvalidationnumber">Property Validation Number: </label>
                        <input class="form-control" type="text" name="propertyvalidationnumber" id="propertyvalidationnumber">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="address">Address: </label><br>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="password">Password: </label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="confirmpassword">Confirm Password: </label>
                        <input class="form-control" type="password" name="confirmpassword" id="confirmpassword">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="text">Admin ID: </label>
                        <input class="form-control" type="text" name="admin_id" id="admin_id">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="keylogin">Key: </label>
                        <input class="form-control" type="text" name="keylogin" id="keylogin">
                    </div>
                </div>
                <button type="reset" name="btnreset" id="btnreset">Reset</button>
                <button type="submit" name="btnregister" id="btnregister">Register</button>
            </form>
            <form action="#" method="POST" id="registerform2" class="form-control">
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenfirstname">First Name: </label>
                        <input class="form-control" type="text" name="tenfirstname" id="tenfirstname">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenlastname">Last Name: </label>
                        <input class="form-control" type="text" name="tenlastname" id="tenlastname">
                    </div>

                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenemail">Email: </label>
                        <input class="form-control" type="email" name="tenemail" id="tenemail">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenphone">Phone Number: </label>
                        <input class="form-control" type="text" name="tenphone" id="tenphone">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenaddress">Address: </label><br>
                        <textarea class="form-control" name="tenaddress" id="tenaddress" cols="30" rows="2"></textarea>
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenaddress">National Identification Number: </label>
                        <input class="form-control" type="text" name="tennin" id="tenaddress">
                    </div>
                </div>
                <div class="formwrap">
                    <div class="formwrapchild">
                        <label class="form-label" for="tenpassword">Password: </label>
                        <input class="form-control" type="password" name="tenpassword" id="tenpassword">
                    </div>
                    <div class="formwrapchild">
                        <label class="form-label" for="tenconfirmpassword">Confirm Password: </label>
                        <input class="form-control" type="password" name="tenconfirmpassword" id="tenconfirmpassword">
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
<?php
    include_once "shared/constants.php";

    //login for landlords

    

    if(isset($_REQUEST['btnsubmit'])){
        # validate login form
        $errors = array();
        if(empty($_REQUEST['email'])){
            $errors[] = "Email field is required";
        }
        if(empty($_REQUEST['password'])){
            $errors[] = "Password field is required";
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
            $errors[] = "Invalid username of password!";
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
            $errors[] = "Email field is required";
        }
        if(empty($_REQUEST['tenpassword'])){
            $errors[] = "Password field is required";
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
            $errors[] = "Invalid username of password!";
        }else{
            //redirect the user to dashboard
            header("Location: tendashboard.php");
            exit();
        }
    }
}

    include_once "header.php";
?>
<style>
    #form1, #form2{
        margin: auto;
    }
    .form-control{
        width: 70% !important;
    }
    .form{
        width: 85% !important;
    }
    .signindirection{
        width: 100%;
        padding-bottom: 20px;
    }
    .container-fluid{
        margin: 80px 0px 200px 0px;
    }
    .loginstyle2{
        margin-bottom: 0px !important;
    }
    .loginstyle p{
        margin-top: 70px;
    }
</style>
<div class="container-fluid">
    <div class="signin">
        
        <div class="row">
            <div class="col loginstyle">
                <h2>Expert solution to housing problems</h2>
                <p>Let's get you started to affordable housing plans with zero agent fees and full government regulatory support.</p>
                
            </div>
            <div class="col loginstyle2">
                <form action="" method="" class="form-control" id="form1">
                    <input type="text" name="email" id="email" placeholder="Enter your email address (for landlords)..." class="form"><br>
                    <input type="password" name="password" id="password" placeholder="Enter your password..." class="form"><br>
                    <button class="form" type="submit" name="btnsubmit" id="login">Log In</button>
                    
                <div class="signindirection">
                    <p>Are you a registered landlord? Click on the button below to sign in.</p>
                    <input type="radio" name="signintype" id="landlord" class="type">
                    <label for="landlord">Landlord</label>
                    <input type="radio" name="signintype" id="tenant" class="type" checked>
                    <label for="tenant">Tenant</label>
                </div>

                </form>
                <form action="" method="" class="form-control" id="form2">
                    <input type="text" name="tenemail" id="email" placeholder="Enter your email address (for tenants)..." class="form"><br>
                    <input type="password" name="tenpassword" id="password" placeholder="Enter your password..." class="form"><br>
                    <button class="form" type="submit" name="tenbtnsubmit" id="login">Log In</button>
                    
                <div class="signindirection">
                    <p >Are you a registered landlord? Click on the button below to sign in.</p>
                    <input type="radio" name="signintype" id="landlord" class="type">
                    <label for="landlord">Landlord</label>
                    <input type="radio" name="signintype" id="tenant" class="type" checked>
                    <label for="tenant">Tenant</label>
                </div>

                </form>
                

            </div>
        </div>
    </div>
</div>

<script src="jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#form1').hide()
    

        $('.type').click(function(){
            if($('#landlord').prop("checked")){
                $('#form1').show();
                $('#form2').hide();
            }else{
                $('#form1').hide();
                $('#form2').show();
            }
        })
    }
        );
</script>


<?php
    include_once "footer.php";
?>
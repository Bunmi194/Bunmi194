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
    
    .span{
        margin: -30px 0px;
        padding: -30px 0px;
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
                <section>
                        <form action="" method="" class="form-control" id="form1">
                        <span class="span"><?php 
                            if(isset($errors["signin"])){
                                echo $errors["signin"];
                            }else{
                                echo " ";
                            }
                        ?></span>
                        <input type="text" name="email" id="email" placeholder="Enter your email address (for landlords)..." class="form">
                        <span class="span"><?php 
                            if(isset($errors["email"])){
                                echo $errors["email"];
                            }else{
                                echo " ";
                            }
                        ?></span><br>
                        <input type="password" name="password" id="password" placeholder="Enter your password..." class="form"><span class="span"><?php 
                            if(isset($errors["password"])){
                                echo $errors["password"];
                            }else{
                                echo " ";
                            }
                        ?></span><br>
                        <button class="form" type="submit" name="btnsubmit" id="login">Log In</button>
                        
                    <div class="signindirection">
                    </div>
                    
                    </form>
                </section>
                <section id="formsection">
                        <form action="" method="POST" class="form-control" id="form2">
                    <span><?php if(isset($errors["tensignup"])) echo $errors["tensignup"];?></span>
                        <input type="text" name="tenemail" id="email" placeholder="Enter your email address (for tenants)..." class="form"><span><?php if(isset($errors["tenemail"])) echo $errors["tenemail"];?></span>
                        <input type="password" name="tenpassword" id="password" placeholder="Enter your password..." class="form"><span><?php if(isset($errors["tenpassword"])) echo $errors["tenpassword"];?></span>
                        <button class="form" type="submit" name="tenbtnsubmit" id="login">Log In</button>

                </section>
            
        <div class="signindirection">
                    <p>Are you a registered landlord? Click on the button below to sign in.</p>
                    <input type="radio" name="signintype" id="landlord" class="type" value="landlord">
                    <label for="landlord">Landlord</label>
                    <input type="radio" name="signintype" id="tenant" class="type" value="tenant" checked>
                    <label for="tenant" >Tenant</label>
                    </form>
            <!-- <?php
                    include "radio.php";
                ?> -->
        </div>
        
        </form>
        </div>
        <!-- <?php
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        ?> -->
                   <!-- <input type="hidden" name="me" value="<?php  $c = $_REQUEST['signintype']; echo $c?>" id="rew"> -->
        </div>
    </div>
</div>

<script src="jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#form1').hide();
            // alert(c);
         $('[name=signintype]').click(function(){
            if($('#landlord').prop('checked')==true){
                $('#form2').hide();
                $('#form1').show();
            }else{
                $('#form1').hide();
                $('#form2').show();
            }
            //landlord
            var btn = "";
            var email = $('#email').val();
            var password = $('#password').val();
        
            //$('#formsection').load("signinform.php", {state: c});
        })
        // $('#btnsubmit').click(function(){
        //     $.ajax({
        //         type: "POST",
        //         url: "signinscript.php",
        //         data: "btnsubmit="+btn+"&email="+email+"&password="+password,
        //         success: function(){
        //             alert("success");
        //         }
                
        //     });
        // });
    });
</script>
<?php
    include_once "footer.php";
?>
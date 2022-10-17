<?php
    $state = $_REQUEST['state'];
    if($state=="landlord"){
        echo '<form action="" method="" class="form-control" id="form1">
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
            <?php
                include "radio.php";
            ?>
    </div>
    
    </form>';
    }else{
        echo '<form action="" method="" class="form-control" id="form2">
        <span><?php if(isset($errors["tensignup"])) echo $errors["tensignup"];?></span>
            <input type="text" name="tenemail" id="email" placeholder="Enter your email address (for tenants)..." class="form"><span><?php if(isset($errors["tenemail"])) echo $errors["tenemail"];?></span>
            <input type="password" name="tenpassword" id="password" placeholder="Enter your password..." class="form"><span><?php if(isset($errors["tenpassword"])) echo $errors["tenpassword"];?></span>
            <button class="form" type="submit" name="tenbtnsubmit" id="login">Log In</button>
            
        <div class="signindirection">
            <?php
                    include "radio.php";
                ?>
        </div>
        
        </form>';
    }
?>
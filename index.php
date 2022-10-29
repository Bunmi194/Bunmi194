<?php
    session_start();
    if (isset($_SESSION['lastname'])) {
        include_once "portalheader.php";
    }else{
        include_once "header.php";
    }
    include_once "shared/constants.php";
    include_once "shared/common.php";
?>
<style>
   
</style>
<div class="banner">
                <div class="overlay">
                    <div class="bannerbg">
                        <div class="nm">
                        <div id="banner-child-1">
                        <p id="writeup-body">
                            <h2 class="anim" id="writeup">
                                <span>Smart Housing Solutions</span> <span>Designed For Smarter</span> <span>People.</span>
                            </h2>
                            <p class="anim" id="writeup2">
                            Get your properties listed for free and have over 10 million Lagosians browse through them. Built for landlords and tenants who are ready to cut off agents in order to make housing affordable and accessible to all. Designed with your safety and convenience at heart.
                            </p>
                        </p>
                        <a href="signin.php"><button class="anim" id="btn">Get Started</button></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="">
            <p class="propertyheader">Listed Properties</p>
            <div class="properties block">
                <?php 
                    $cobj = new Common();
                    $result = $cobj->getCat();
                    foreach ($result as $key => $value) {
                        $category = $value['category'];
                        $img = $value['image'];
                        $catid = $value['category_id'];
                ?>
                        
                        <div>
                        <form action="category.php?cat=<?php echo $catid?>" method="POST">
                            <img src="images/<?php echo $img?>" alt="" width="300" height="200">
                            <p class="bold"><?php echo $category?></p>
                            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
                            <button name="<?php echo $catid?>" type="submit">View More</button>
                        </form>
                        </div>
                <?php 
                    }

                ?>
            </div>
        </div>
        <div class="mand">
            <h2 id="secure">
                Securing an apartment doesn't have to be frustrating
            </h2>
            <p>
                Our mandate is to eradicate the unnecessary burden that comes with renting an apartment in Lagos coupled with the unreasonably high agent fees.
            </p>
            <a href="signin.php"><button class="" id="">Get Started</button></a>
        </div>
        <div class="divstyle">

        </div>
        <div class="proploc">
            <p class="propertyheader">Properties By Location</p>
            <div class="properties block">
                
                <?php
                    
                    //if(isset($_REQUEST['btnsubmit'])){
                        $locobj = new Common();
                        $record = $locobj->getApartmentByLocation("Ejigbo","Victoria Island", "Ojodu","Yaba");
                        // echo "<pre>";
                        // print_r($record);
                        // echo "</pre>";
                        if($record == "No Record Found"){
                            return "Oops! No Record Found!";
                        }else{
                            foreach ($record as $key => $value) {
                                $locid = $value['location_id'];
                                $loc = $value['location'];
                                $img = $value['image'];
                        ?>
                                <div>
                                <form action="location.php?locid=<?php echo $locid?>" method="POST">
                                    <img src="properties/<?php echo $img?>" alt="" width="300" height="200">
                                    <p class="bold"><?php echo $loc?> - LAGOS</p>
                                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Nigeria</span><br>
                                    <button type="submit" name="btnsubmit">View More</button>
                                </form>
                            </div>
                        <?php
                            }
                        }
                    //}

                        ?>
                

            </div>
        </div>
        <div class="divstyle">

        </div>
        <div class="mandatewrapper">
            <div class="mandatewrapper-child">
                <img src="images/house.png" alt="house">
                <h3>Rent Faster</h3>
                <p>With all houses in Lagos state listed on one platform, you can find the apartment that fits your budget in less than 48hrs.</p>
            </div>
            <div class="mandatewrapper-child">
                <img src="images/no-fee.png" alt="free">
                <h3>Zero Agent Fee</h3>
                <p><?php if (defined("APP_NAME")) {
        echo APP_NAME;
    }?> connects tenants directly to landlords without the need for any agent fees. You pay the exact rent and move in immediately.</p>
            </div>
            <div class="mandatewrapper-child">
                <img src="images/regulation.png" alt="regulation">
                <h3>Government Regulation</h3>
                <p>Bid farewell to tenant-landlord disagreements as the platform is regulated by the state government and all users are mandated to agree to our terms and conditions. </p>
            </div>
        </div>
        <div class="mandatebelow mand">
            <h2>Automated House Rental System</h2>
            <p>With a click of a button, tenants pay rents and landlords receive payments instantly.</p>
        </div>
        <div class="slider hide" id="container">
            <div class="" id="panel">
                <section class="sliderchild sliderelementchild" id="slide1">
                    <img src="images/happyhome.jpg" alt="happyhome">                   
                </section>    
                <section class="sliderchild sliderelementchild" id="slide2">                    
                    <img src="images/kit.jpg" alt="image1">   
                </section>            
                <section class="sliderchild sliderelementchild" id="slide3">
                    <img src="images/h2.jpg" alt="house">   
                </section>              
                       
                <section class="sliderchild" id="slide4">
                    <img src="images/img3.jpg" alt="imag">
                </section>
                <section class="sliderchild" id="slide5">
                    <img src="images/img4.jpg" alt="im">
                </section>  
                           
                <section class="sliderchild" id="slide6">                    
                    <img src="images/a1.jpg" alt="imaw"> 
                </section>                
                <section class="sliderchild" id="slide7">                    
                    <img src="images/img5.jpg" alt="imagw">
                </section>
                <section class="sliderchild" id="slide8">                    
                    <img src="images/img6.jpg" alt="imagwkl">
                </section>
                <section class="sliderchild" id="slide9">                    
                    <img src="images/img7.jpg" alt="imagwl">
                </section>                
                            
                <section class="sliderchild" id="slide10">                    
                    <img src="images/a2.jpg" alt="imagdls">  
                </section>                
                <section class="sliderchild" id="slide11">
                    <img src="images/img8.jpg" alt="imagsl">
                </section>
                <section class="sliderchild" id="slide12">
                    <img src="images/img9.jpg" alt="imagesd">
                </section>
                <section class="sliderchild" id="slide13">
                    <img src="images/img10.jpg" alt="imagedk">
                </section>                
                      
                <section class="sliderchild" id="slide14">                    
                    <img src="images/a3.jpg" alt="imagesl">   
                </section>                
                <section class="sliderchild" id="slide15">
                    <img src="images/img11.jpg" alt="imagedl">
                </section>
                <section class="sliderchild" id="slide16">
                    <img src="images/img12.jpg" alt="imagels">
                </section>
                <section class="sliderchild" id="slide17">
                    <img src="images/imglast.jpg" alt="imagdl">
                </section>
            </div>                
        </div>
        <div class="featureswrap">
            <h2 class="propertyheader">Upcoming features</h2>
            <div class="featureswrapper">
                <div class="features">
                    <img src="images/remote.png" alt="remote">
                    <h3>Remote Inspection</h3>
                    <p>Inspect houses without paying a visit through video calls</p>
                </div>
                <div class="features">
                    <img src="images/barcode.png" alt="barcode">
                    <h3>Barcode Generation</h3>
                    <p>Paste Barcodes on your apartments for online inspection.</p>
                </div>
                <div class="features">
                    <img src="images/logistics.png" alt="logistics">
                    <h3>Logistics Support</h3>
                    <p>Affordable logistics solutions to help move you to your next level.</p>
                </div>
                <div class="features">
                    <img src="images/construction.png" alt="artisan">
                    <h3>User Services</h3>
                    <p>Get paid while putting your skills to work.</p>
                </div>
            </div>
        </div>        
        <div class="divstyle">

        </div>
<?php 
     include_once "footer.php";
?>
  
    <?php
    session_start();
    
    include_once "shared/constants.php";
    include_once "shared/common.php";
?>
<?php  
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="shared/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <title><?php if (defined("APP_NAME")) {
        echo APP_NAME;
    }?></title>
    <style> 
               
        ul li{
            display: inline-block;
            list-style-type: none;
            margin: 0px 0px 0px 7%;
        }
            div{
        min-height: 10%;
        border: 0px solid red;
    }
        nav{
        display: flex;
        width: 100%;    
        justify-content: space-around;
        position: fixed;
        top: 0%;
        padding-top: 0%;
        background-color: #fff;
        z-index: 5;
        border-bottom: 5px solid green;
        }
        h3{
            font-size: 16px;
        }
        h2{
            font-size: 24px;
        }
        body{
            font-size: ;
        }
        button{
            width: ;
        } 
        #logo{
            margin: 15px 0px !important;
        }
        #about{
            margin-top: 10px !important;
        }
        a{
            text-decoration: none;
            color: black;
        }
        
        #secure{
            text-align: center;
        }
        #btn2{
            height: 10px !important;
        }
        .banner{
    color: #000;
    margin-top: 6.3%;
    /* border: 3px solid black; */
    }
    .overlay{
    /* border: 3px solid blue; */
    }
    div.bannerbg{
    display: flex;
    justify-content: space-around;
    padding: 0% 0%;
    /* border: 1px solid red; */
    background-image: url('arc.jpg');
    border-bottom-right-radius: 100%;
    background-color: #023430;
}
.mandatewrapper-child{
    width: 30%;
    /* border: 1px solid red; */
    text-align: center;
}
#container .sliderchild {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  display: -webkit-box;
  display: -ms-flexbox;
  color: #333;
  text-align: left;
  /* border-right: 1px solid #f00; */
}
        .mandatebelow{
            margin: 5%;
            width: 90%;
            padding: 10% 5%;
        }
        .dashwrap{
            display: flex;
            height: auto;
            margin: 100px 0px;

        }
        #dashwrapchild1{
            width: 30%;
            height: 
        }
        #dashwrapchild2{
            width: 70%;
            height: ;
        }
        .profilepix{
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: auto;
            margin-top: 50px !important;
        }
        .profilepix img{
            width: inherit;
            height: inherit;
            border-radius: 50%;
         
        }
        .username{
            width: 200px;
            height: 20px;
            margin: auto;
            text-align: center;
            margin-top: 10px !important;
        }
        .dashboarditems{
            margin: 20px;
            padding: 10px;
            text-align: center;
        }
        .innerdashboard{
            display: flex;
            justify-content: space-around;
            margin: 50px 10px;
        }
        .innerbig{
            width: 200px;
            height: 300px;
            border-radius: 10px;
        }
        .inner{
            height: 100px;
            width: 200px;
            border-radius: 10px;
        }
        .header{
            margin: 20px 10px;
        }
        .header [type="button"]{
            margin: 10px 40px;
        }
        a:hover{
            color: #000 !important;
        }
        #button2:hover{
            color: #fff !important;
        }
        .carousel-item img{
            width: inherit !important;
            height: inherit !important;
        }
        .imgsearch{
            width: 6%;
            margin: 0px 10px 10px 10px;
        }
        .logolink img{
            width: 10%;
        }     
        .logolink:hover{
            text-decoration: none !important;
        }   
        .logolink h2:hover{
            text-decoration: none !important;
        }
        div #spanlogo:hover{
            text-decoration: none !important !important;
        }
        .propertyheader{
        font-size: 24px;
        text-align: center;
        margin: 100px 0px;
        padding: 20px;
        background-color: #ddd;
        font-weight: bold;
    }
    .bold{
        font-weight: bold;
    }
    p.bold{
        margin-left: 0px;
    }
    .imgloc{
            width: 4%;
            margin: 2px;
    }
    .mand{
            width: 80%;
            height: ;
            text-align: center;
            margin: auto;
            margin-top: 100px !important;
            margin-bottom: 100px !important;
            padding-top: 50px;
            background-color: #1D1D1D;
            color: #fff;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 5px 10px #ABABAB;
    }
    .mand p{
        font-size: 24px;
    }
    .proploc{
        margin: 0px;
        background-color: #EDEBEE;
    }
    .divstyle{
        height: 100px;
        background-color: #EDEBEE;
    }
    .mandatewrapper{
    display: flex;    
    justify-content: space-between;
    margin: 100px 0px;
}
.featureswrap{
    margin: 0%;
    background-color: #EDEBEE;
}  
.slider {
    will-change: transform;
    z-index: 6;
    margin-bottom: 200px;
  }
  .footer{
    margin-top: 100px;
  }
  .copyright{
    background-color: #023430;
    color: #fff;
  }
  .footerwrapper{
    background-color: #1D1D1D;
    color: #fff;
  }
  .socialitem a{
    color: #fff;
  }
  .socialitem a:hover{
    color: #fff !important;
  }
  .socials a, .copyright a{
    color: #fff;
  }
  .socials a:hover{
    color: #fff !important;
    text-decoration: none;
  }
  .socials img{
    margin-left: 10px;
    margin-right: 10px;
  }
  .container-fluid{
    margin-top: 50px;
  }
</style>      
</head>
<body>
    <div>
        <div class="viewwrapper">
            <nav>            
                <div id="logo">
                        <a href="index.php" class="logolink">
                        <h2 id="spanlogo"><img id="homelogo" src="images/home.png" alt="logo"><?php if (defined("APP_NAME")) {
        echo APP_NAME;
    }?></h2>
                        </a>
                        </div>
                <div id="search">                    
                        <input type="text" name="search" id="searchinput" placeholder="search an apartment..."><img class="imgsearch" src="images/search.png">                    
                </div>
                <div id="about">
                    <ul>
                        <li><a href="more.php">Properties</a></li>
                        <?php
                            if (isset($_SESSION['lastname']) && isset($_SESSION['landlord'])) {
                        ?>  
                            <a href="landashboard.php" class="hide">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                            <button type="button" id="button" disabled>Lock</button>
                            </a>
                            <button type="button" id="button"><a href="logout.php" id="button2" name="btnphsignout">Lock</a><img src="images/padlck.png" width="30%"></button>
                        <?php
                            }elseif(isset($_SESSION['role'])){
                        
                        ?>
                            <a href="admindashboard.php" class="hide">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                        </a>
                        <button type="button" id="button"><a href="logout.php" id="button2" name="btnphsignout">Lock</a><img src="images/padlck.png" width="30%"></button>
                        <?php
                            }elseif(isset($_SESSION['lastname']) && !isset($_SESSION['landlord']) && !isset($_SESSION['role'])){
                        ?>
                        <a href="tendashboard.php" class="hide">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                        </a>
                        <button type="button" id="button"><a href="logout.php" id="button2" name="btnphsignout">Lock</a><img src="images/padlck.png" width="30%"></button>
                        <?php
                            }else{

                            
                        ?>
                        <li><a href="signin.php">Sign In</a></li>
                        <button type="button" id="button"><a href="register.php" id="button2">Register</a></button>
                        <?php
                            
                            }
                        ?>
                    </ul>
                </div>
            </nav>
<style>
   .blurr{
        filter:;
        /* position: relative; */
        top: 0px;
        /*z-index: -1;*/
   }
</style>

    <div class="banner">
    <div class="blurr">
    <div class="container">
        <div class="row">
            <div id="searchresult" style="width:100%">

            </div>
        </div>

    </div>
                <div class="overlay">
                    <div class="bannerbg">
                        <div class="nm">
                        <div id="banner-child-1" style="filter:blur(5px)">
                        <p id="writeup-body">
                            <h2 class="anim" id="writeup">
                                <span>Smart Housing Solutions</span> <span>Designed For Smarter</span> <span>People.</span>
                            </h2>
                            <p class="anim" id="writeup2">
                            Get your properties listed for free and have over 10 million Lagosians browse through them. Built for landlords and tenants who are ready to cut off agents in order to make housing affordable and accessible to all. Designed with your safety and convenience at heart.
                            </p>
                        </p>
                        <button class="anim" id="btn">Get Started</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="blurr" style="filter:blur(5px)">
            <p class="propertyheader">Listed Properties</p>
            <div class="properties">
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
        <div class="mand blurr" style="filter:blur(5px)">
            <h2 id="secure" class="blurr">
                Securing an apartment doesn't have to be frustrating
            </h2>
            <p>
                Our mandate is to eradicate the unnecessary burden that comes with renting an apartment in Lagos coupled with the unreasonably high agent fees.
            </p>
            <button class="" id="">Get Started</button>
        </div>
        <div class="divstyle blurr">

        </div>
        <div class="proploc blurr" style="filter:blur(5px)">
            <p class="propertyheader">Properties By Location</p>
            <div class="properties">
                
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
        <div class="mandatewrapper blurr" style="filter:blur(5px)">
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
        <div class="mandatebelow mand blurr">
            <h2>Automated House Rental System</h2>
            <p>With a click of a button, tenants pay rents and landlords receive payments instantly.</p>
        </div>
        <div class="slider blurr" id="container">
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
        <div class="featureswrap blurr">
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
        <div class="divstyle blurr">

        </div>
        <script src="jquery/jquery.js"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function(){
                //alert('Yo!')
                $("#search").keyup(function(){
                    var search = document.getElementById('searchinput').value;
                    //alert(search)
                    //using jquery ajax method to make request and send data
                    $.ajax({
                        url: "searchresult.php",
                      data: "searchitems="+search,
                        type: "POST",
                        success: function(response){
                            //console.log(response);
                            $('#searchresult').html(response);
                         },
                        error: function(error){
                            console.log(error);
                        }
                    });
            });
        });
        </script>
        <div class="blurr">
<?php 
     include_once "footer.php";
?>
</div>
<?php
ob_end_flush();
?>
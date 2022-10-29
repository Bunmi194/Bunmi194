<?php
    session_start();
    ob_start();
    if (!isset($_SESSION['logger']) || ($_SESSION['logger'] != "K!NG_DAViD")) {
        $_SESSION['break'] = "You need to log in to access the page";
        header("Location: signin.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="shared/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inspiration&family=Lobster&family=Poppins:ital,wght@1,400;1,600&family=Quicksand&display=swap" rel="stylesheet">
    <title><?php if (defined("APP_NAME")) {
        echo APP_NAME;
    }?></title>
    <style>  
        body{
            font-family: 'Quicksand', sans-serif;
        }      
        ul li{
            display: inline-block;
            list-style-type: none;
            margin: 0px 0px 0px 4%;
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
  /*media queries*/
  @media screen and (min-width: 200px) and (max-width: 600px){
    .hide{
        display: none;
    }
    nav{
        width: 100%;
    }
    .block{
        display: block;
        align: center;
        text-align: center;
    }
    ul li{
            display: inline-block;
            list-style-type: none;
            margin: 0px !important;
        }
    #banner-child-1{
        width: 100%;
        margin-top: 30px;
        }
    #banner-child-2{
        border-radius: 2px !important;
}
div.bannerbg{
    display: flex;
    justify-content: space-around;
    padding: 0% 0%;
    /* border: 1px solid red; */
    background-image: url('arc.jpg');
    border-bottom-right-radius: 0%;
    background-color: #023430;
}
.space{
    margin-top: 10%;
    margin-left: 10px;
    padding-top: 20px;
}
#signin{
    font-size: 20px;
    margin-top: 20px;
}
  }
  @media screen and (min-width: 601px) and (max-width: 800px){
    .hide{
        display: none;
    }
    nav{
        width: 100%;
    }
    .block{
        display: block;
        align: center;
        text-align: center;
    }
    ul li{
            display: inline-block;
            list-style-type: none;
            margin: 0px !important;
        }
    #banner-child-1{
        width: 100%;
        margin-top: 30px;
        }
    #banner-child-2{
        border-radius: 2px !important;
}
div.bannerbg{
    display: flex;
    justify-content: space-around;
    padding: 0% 0%;
    /* border: 1px solid red; */
    background-image: url('arc.jpg');
    border-bottom-right-radius: 0%;
    background-color: #023430;
}
.space{
    margin-top: 10%;
    margin-left: 200px;
    padding-top: 20px;
}
#signin{
    font-size: 20px;
    margin-top: 20px;
}
  }
  @media screen and (min-width: 801px) and (max-width: 1150px){
    .hide{
        display: none;
    }
    nav{
        width: 100%;
    }
    .block{
        display: block;
        align: center;
        text-align: center;
    }
    ul li{
            display: inline-block;
            list-style-type: none;
            margin: 0px !important;
        }
    #banner-child-1{
        width: 100%;
        margin-top: 30px;
        }
    #banner-child-2{
        border-radius: 2px !important;
}
div.bannerbg{
    display: flex;
    justify-content: space-around;
    padding: 0% 0%;
    /* border: 1px solid red; */
    background-image: url('arc.jpg');
    border-bottom-right-radius: 0%;
    background-color: #023430;
}
.space{
    margin-top: 10%;
    margin-left: 300px;
    padding-top: 20px;
}
#signin{
    font-size: 24px;
    margin-top: 20px;
}
  }
</style>      
</head>
<body>
    <div>
        <div class="viewwrapper">
            <nav>            
                <div id="logo">
                        <a href="index.php" class="logolink">
                        <h2 id="spanlogo"><img class="hide" id="homelogo" src="images/home.png" alt="logo"><?php if (defined("APP_NAME")) {
        echo APP_NAME;
    }?></h2>
                        </a>
                        </div>
                <div id="search" class="hide hide2">                    
                        <input type="text" name="search" id="search"><img class="imgsearch" src="images/search.png">                    
                </div>
                <div id="about">
                    <ul>
                        <li class="hide"><a href="#">Solutions</a></li>
                        <li class="hide"><a href="more.php">Properties</a></li>
                        <?php
                            if (isset($_SESSION['landlord'])) {
                        ?>
                        <a href="landashboard.php">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                        </a>
                        <?php
                            }elseif(isset($_SESSION['role'])){
                        ?>
                            <a href="admindashboard.php">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                        </a>
                        <?php
                            }else{
                        ?>
                        <a href="tendashboard.php">
                            <li><b>Welcome <?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname'];?></b></li>
                        </a>
                        <?php
                            }
                        ?>
                        <button type="button" id="button"><a href="logout.php" id="button2" name="btnphsignout">Lock</a></button>
                    </ul>
                </div>
            </nav>
            

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                .searchdiv h3{
                        font-size: 20px;
                        font-weight: bold;
                        margin: 10px;
                }
        </style>
</head>
<body>
<?php

if(isset($_REQUEST['searchitems'])){
//add student class
include_once "shared/common.php";
include_once "shared/constants.php";
//create object of student class
$obj = new Common();

// echo "<pre>";
// print_r($obj);
// echo "</pre>";
//reference
if (!empty($_REQUEST['searchitems'])) {                
$searchprop = $obj->searchApartment($_REQUEST['searchitems']);

// echo "<pre>";
// print_r($searchprop);
// echo "</pre>";
// exit;
$i = 25;
        if ($searchprop == "NO RECORD") {                
        echo "<div class='alert alert-warning'>No Record Found</div>";
        }else{
        ?>

      <div style='position: absolute; width:100%; height: 200px; z-index: 4'>
      <?php
foreach($searchprop as $key => $value){
        $url = $value['url'];
        
        ?>
        
        <a href="more.php?apartmentid=<?php echo $value['apartments_id']?>">
        <div class="col-md-6 searchdiv" style="width:100%; height: 200px; display:flex; border: 2px solid silver; border-radius: 5px; margin: 12px; background-color: #eeeeee; z-index: 5; padding-right: 30px; margin-right: 400px;">
                <div style="width: 100%">
                <img src="<?php echo 'properties/'.$url?>" alt="profile image" class="img-fluid" style="width: 100%; height: 100%">
                </div>
                <div style="width: 100%; ">
                <h3>House Title: <?php echo $value['title']?></h3>
                <h3>Location: <?php echo $value['location']?></h3>
                <h3>Status: <?php echo $value['status']?></h3>
                <h3>Price: <?php echo number_format($value['price'])?></h3>
                </div>

        </div>
        </a>
        <?php
        
}
?>
</div>
       <?php 

        }
}else{
        echo "<div class='alert alert-warning'>No Record Found</div>";
}
// echo "<pre>";
// print_r($students);
// echo "</pre>";

}
?>
</body>
</html>
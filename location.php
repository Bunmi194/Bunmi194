<?php
    session_start();
    if (isset($_SESSION['lastname'])) {
        include_once "portalheader.php";
    }else{
        include_once "header.php";
    }
    include_once "shared/common.php";
    include_once "shared/constants.php";
?>
<style>
    #header{
        margin-top: 100px;
    }
    /* .morewrapper{
        display: flex;
    } */
    /* .morewrapperchild{
        width: 20%;
        height: inherit;
    } */
    .slider{
        width: 60% !important;

    }
    .cat p, .bold{
        max-width: inherit;
    }
    .category{
        margin: 10px;
    }
    .error{
        height: 300px;
        margin: 150px;
    }
    .error p{
        margin: auto;
        padding: 120px 260px;
        font-weight: bold;
    }
    
</style>
    <?php

            $locobj = new Common();
            $result = $locobj->getAllApartmentByLocation($_REQUEST['locid']);
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";

            if($result[0] == "No Record"){
                echo "<div class='error alert alert-danger'><p>NO RECORD FOUND! PLEASE CHECK BACK LATER</p></div>";
            }else{
        
    ?>
    <div id="header">
        <h2>Location: <?php echo $result[0]['location']?></h2>
    </div>
    <div class="row category">
             <?php 
                // $img = $result['image'];
                // $apartment_id = $result['apartments_id'];
                // $title = $result['title'];
                // $price = $result['price'];
                // $status = $result['status'];
                // $loc = $result['location'];

                foreach ($result as $key => $value) {

            ?>
            
                    <div class="col-md-4 mt-2 cat">
                    <form action="more.php?apartmentid=<?php echo $value["apartments_id"];?>" method="POST">
                    <img src="properties/<?php echo $value['image'];?>" alt="" width="300" height="200">
                    <p class="bold">Title: <?php echo $value['title'];?></p>
                    <p class="bold">Price: &#8358; <?php echo number_format($value['price'])?></p>
                    <p class="bold">Status: <?php echo $value['status'];?></p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold"><?php echo $value['location'];?></span><br>
                    <button name="btnapt" type="submit">View More</button>
                    </form>
                </div>
            <?php
                }
            }
             ?>
        
    </div>
        
    
<?php
    include_once "footer.php";
?>
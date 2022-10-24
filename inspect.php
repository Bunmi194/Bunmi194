<?php
    include_once "portalheader.php";
session_start();
$_SESSION['apartmentid'] = $_REQUEST["apartmentid"];
    include_once "header.php";
    include_once "shared/common.php";
    include_once "shared/constants.php";
?>
<style>
    #header{
        margin-top: 100px;
    }
    .morewrapper{
        display: flex;
        justify-content: space-between;
        height: inherit;
    }
    .morewrapperchild{
        width: 60%;
        max-height: inherit;
        /* background-color: red; */
    }
    .slider{
        width: 60% !important;

    }
    .description{
        margin-top: 100px;
    }
    #price{
        font-weight: bold;
    }
    .imgprop{
        margin: 10px;
    }
    .imgprop:hover{
        cursor: pointer;
    }
    .aside{
        background-color: green;
        width: 20%;
    }
    .space{
        margin-left: 20px;
    }
    .spacebtn{
        margin: 30px 60px;
        text-align: center;
    }
    .form-control h5{
        text-align: center;
        padding: 10px;
    }
    .forms{
        display: inline-block;
        margin-left: 0px;
        margin-right: 30px;
        /* width: 100px; */
    }
    #btnno{
        margin-left: 100px !important;
    }
</style>
<?php
    $apt = new Common();
    $result = $apt->getApartmentById($_REQUEST['apartmentid']);
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // foreach ($result as $key => $value) {
    //     $row = $value
    // }
?>
            <div class="row">
            <div class="offset-1 col-6 mt-5 mb-5 p-5">
                
                <div class="form-control">
                    <h5>Are you sure you want to inspect this property?</h5>
                    <form action="inspectresponse.php" method="POST" class="forms btn">                    
                        <button id="btnno" type="submit" class="btn btn-danger spacebtn" name="btnno">No</button>
                    </form>
                    <form action="inspectresponse.php" method="POST" class="forms btn">
                        <button type="submit" class="btn btn-primary spacebtn" name="btnyes">Yes</button>
                    </form>

    </div>
            </div>
    <div id="header">
        <h2>House Title: <?php echo $result[0]['title']?></h2>
        <h3>Category: <?php echo $result[0]['category']?></h3>
        <h3>Status: <?php echo $result[0]['status']?></h3>
        <h4>Location: <?php echo $result[0]['location']?></h4>
        <h4>Date Uploaded: <?php 
            $date = $result[0]['date'];
            echo date('jS M Y', strtotime($date));
        ?></h4>
    </div>
    <div class="morewrapper">
        <div class="morewrapperchild aside">
            left
        </div>
        <div class="morewrapperchild">
            <div class="row space" >
                <div class="col">
                    <img id="bigpropimage" style="width: 700px; height: 400px; border: 1px solid red" src="properties/<?php echo $result[0]['url']?>" alt="apartment photo">
                </div>
            </div>
            <div class="row">
                <?php
                    foreach ($result as $key => $value) {
                        
                    
                ?>
                <div class="col-3">
                <img class="imgprop" style="width: 150px; height: 100px; border: 1px solid red" src="properties/<?php echo $value['url']?>" alt="apartment photo">
                </div>

                <?php
                    }
                ?>
            </div>
            <div class="description">
                <h2>Description</h2>
                <p><?php echo $result[0]['description']?></p>
                <p><span id="price">Price:</span> &#8358;<?php echo number_format($result[0]['price'])?></p>
                
                <div class="action">
                        
                <form action="inspect.php" method="POST" class="forms">
                            <button type="submit" name="btninspect">Inspect</button>
                            <input type="hidden" name="apartmentid" value="<?php echo $_REQUEST['apartmentid']
                            ?>">
                        <input type="hidden" name="amount" value="<?php echo $result[0]['price']
                        ?>">
                        </form>
                        <form action="paywithpaystack.php" method="POST" class="forms">
                            <button type="submit" name="btnpay">Rent</button>
                            <input type="hidden" name="apartmentid" value="<?php echo $_REQUEST['apartmentid']
                            ?>">
                        <input type="hidden" name="amount" value="<?php echo $result[0]['price']
                        ?>">
                        <input type="hidden" name="apartmentid" value="<?php echo $_REQUEST['apartmentid']?>">
                        </form>
                </div>
            </div>
        </div>
        <div class="morewrapperchild aside">
            right
        </div>
        
        <?php
            // echo "<pre>";
            // print_r($_REQUEST);
            // echo "</pre>";
        ?>
    </div>
    <script src="jquery/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.imgprop').click(function(){
                let img = $(this).attr("src");
                //alert(img);
                $('#bigpropimage').attr("src", img);
            })
        })
    </script>
<?php
    include_once "footer.php";
?>
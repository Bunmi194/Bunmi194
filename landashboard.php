<?php
session_start();
    include_once "portalheader.php";
    include_once "shared/constants.php";
    include_once "shared/landlord.php";
    $landlord_id = $_SESSION['id'];
    $landmsg = new Landlord();
    $landlordmessage = $landmsg->getMessageCount($landlord_id);
    $landinsp = new Landlord();
    $landlord_inspect = $landinsp->getInspectionCount($landlord_id);
    $landprop = new Landlord();
    $landlord_prop = $landprop->getAllProperties($landlord_id);
    $propcount = new Landlord();
    $propertyCount = $propcount->propertyCount($landlord_id);
    $amountcount = new Landlord();
    $amount = $amountcount->amountCount($landlord_id);
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    echo "<pre>";
    print_r($amount[0]);
    echo "</pre>";

    
?>
<style>
    .username{
        background-color: #ddd;
    }
    .username h3{
        margin-top: 20px;
    }
    #dashwrapchild1{
        background-color: #023430;
    }
    .dashboarditems a{
        color: #fff;
    }
    .dashboarditems{
        background-color: #000;
        color: #fff;
    }
    #inspection, .inspection{
        background-color: navy;
    }
    #payments, .payments{
        background-color: green;
    }
    #apartments, .apartments{
        background-color: red;
    }
    .dashboardblock{
        background-color: #ddd;
        padding: 30px;
    }
    .inner p{
        font-weight: bold;
        text-align: center;
        color: #fff;
    }
    .innerbig p{
        font-weight: bold;
        text-align: center;
        color: #fff;
        margin: auto;
        padding-top: 100px;
    }
    
    .dashboardbottom{
            margin: 100px 0px 0px 0px;
        }
        .landashboard{
            margin-top: 50px;
            margin-bottom: 100px;
        }
        .username h3{
            padding-top: 20px;
        }
</style>

    <div>
        <div class="dashwrap">            
            <div class="dashwrapchild" id="dashwrapchild1">
                <div class="profilepix">
                    <img src="images/yaba.jpg" alt="profile photo" class="img-fluid">
                </div>
                <div class="username">
                    <h3><?php if(isset($_SESSION['lastname'])){
                        echo $_SESSION['firstname']." ".$_SESSION['lastname'];
                    }?></h3>
                </div>
                <div class="dashboardbottom">
                    <a href="#">
                        <div class="dashboarditems">
                            Dashboard
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Inspections
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Payments
                        </div>
                    </a>
                    <a href="#">
                        <div class="dashboarditems">
                            Listed Properties
                        </div>
                    </a>

                </div>
            </div>
            <div class="dashwrapchild" id="dashwrapchild2">
                <div class="header">
                    <a href="uploadproperty.php" class="btn btn-success">Upload Property</a>
                    <button type="button" class="btn btn-primary"><a href="myproperties.php">View My Properties</a></button>
                    <button type="button" class="btn btn-secondary"><a href="inspection.php">Inspections: <?php if(isset($_SESSION['id'])){
                            echo $landlord_inspect['COUNT(inspection_id)'];
                    }
                        ?></a></button>
                    <button type="button" class="btn btn-danger"><a href="messages.php">Messages: <?php if(isset($_SESSION['id'])){
                            echo $landlordmessage['COUNT(inspection_id)'];
                    }
                        ?></a></button>
                    <button type="button" class="btn btn-primary"><a href="logout.php">Log Out</a></button>
                    
                </div>
                <h2 class="dashboardblock landashboard">My Dashboard</h2>
                <div class="innerdashboard">
                    <div class="innerbig inspection">
                        <p>Total: <?php if(isset($_SESSION['id'])){
                            echo $landlord_inspect['COUNT(inspection_id)'];
                    }
                        ?></p>
                        <p>Inspections</p>
                    </div>
                    <div class="innerbig payments">
                        <p>Total: <?php if(isset($_SESSION['id'])){
                            if(isset($amount[0]['SUM(amount)']) && $amount[0]['SUM(amount)'] > 0){
                                echo "&#8358;".$amount[0]['SUM(amount)'];
                            }else{                                
                                echo "&#8358;"."0";
                            }
                    }
                        ?></p>
                        <p>Payments</p>
                    </div>
                    <div class="innerbig apartments">
                        <p>Total:  <?php if(isset($_SESSION['id'])){
        echo $propertyCount[0]['COUNT(apartments_id)'];
}
?></p>
                        <p>Listed Apartments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once "footer.php";
?>
<!-- 
<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
?> -->
<?php
    session_start();
    include_once "portalheader.php";
    include_once "shared/tenant.php";
    $tenant = new Tenant();
    $count = $tenant->getInspectionCount($_SESSION['id']);
    $amountCount = $tenant->amountCount($_SESSION['id']);
    $countRent = $tenant->countRentedProperties($_SESSION['id']);
    // echo "<pre>";
    // print_r($countRent);
    // echo "</pre>";
    // exit();
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
                    <h3>Bunmi Oladipupo</h3>
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
                            Rented Properties
                        </div>
                    </a>

                </div>
            </div>
            <div class="dashwrapchild" id="dashwrapchild2">
                <div class="header">
                    <a href="tenproperties.php" class="btn btn-success">Rented Properties: <?php echo $countRent['COUNT(payments_id)']?></a>
                    <a href="tenproperties.php" class="btn btn-primary">Payments: <?php 
                        if ($amountCount[0]['SUM(amount)'] > 0) {
                            echo "&#8358;".$amountCount[0]['SUM(amount)'];
                        }else{
                            echo "&#8358;0";
                        }
                    ?></a>
                    <a href="tenmessages.php" class="btn btn-secondary">Inspections: <?php echo $count['COUNT(inspection_id)'] ?></a>
                    <button name="tenbtnlogout" type="button" class="btn btn-primary"><a href="logout.php">Log Out</a></button>
                    
                </div>
                <h2 class="dashboardblock landashboard">My Dashboard</h2>
                <div class="innerdashboard">
                    <div class="innerbig inspection">
                        <p>Total: <?php echo $count['COUNT(inspection_id)'] ?></p>
                        <p>Inspections</p>
                    </div>
                    <div class="innerbig payments">
                        <p>Total: <?php 
                        if ($amountCount[0]['SUM(amount)'] > 0) {
                            echo "&#8358;".$amountCount[0]['SUM(amount)'];
                        }else{
                            echo "&#8358;0";
                        }
                    ?></p>
                        <p>Payments</p>
                    </div>
                    <div class="innerbig apartments">
                        <p>Total: <?php echo $countRent['COUNT(payments_id)']?></p>
                        <p>Rented Apartments</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once "footer.php";
?>
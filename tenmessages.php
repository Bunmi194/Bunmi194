<?php 
        session_start();
        include_once "portalheader.php";
?>
<style>
    .forms{
        display: inline-block;
    }
    #tenmessages{
        margin-top: 50px;
        font-weight: bold;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/tenant.php";
        $tenmessage = new Tenant();
        $resultset = $tenmessage->getTenantMessage($_SESSION['id']);
        
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";

        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r($resultset);
        // echo "</pre>";
        // exit();
        if(isset($_REQUEST['output'])){
            echo $output;
        }
    ?>
    <h2 id="tenmessages">My Messages</h2>
    <?php
        if ($resultset[0] == "NO RECORD") {
            echo "<div class='alert alert-danger'>NO RECORD FOUND</div>";
        }else{
    ?>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">Message</th>
            <th>Price</th>
            <th>Property Status</th>
            <th>Inspection Date</th>
            <th>Inspection Time</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {                
            $landlordfirstname = $value["landlord_firstname"];
            $landlordlastname = $value["landlord_lastname"];
            $propertytitle = $value["title"];
            $propertyaddress = $value["address"];
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo "<b>$landlordfirstname $landlordlastname</b> has approved your request to inspect the property <b>$propertytitle</b> at <b>$propertyaddress</b>"; ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo date('jS M Y', strtotime($value['inspection_date']))?></td>
                <td><?php echo date("g:i a", strtotime($value['inspection_time'])) ?></td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
    <?php include_once "footer.php"?>
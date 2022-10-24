<?php 
        session_start();
        include_once "portalheader.php";
?>
<style>
    .forms{
        display: inline-block;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/tenant.php";
        $tenantprop = new Tenant();
        $resultset = $tenantprop->getRentedProperties($_SESSION['id']);
        
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        
        echo "<pre>";
        print_r($resultset);
        echo "</pre>";
        if(isset($_SESSION['mssgf'])){
            echo $_SESSION['mssgf'];
            unset($_SESSION['mssgf']);
        }
        if(isset($_SESSION['mssg'])){
            echo $_SESSION['mssg'];
            unset($_SESSION['mssg']);
        }
        if(isset($_SESSION['delmsg'])){
            echo $delmsg;
            unset($_SESSION['delmsg']);
        }
    ?>
    <h2>My Properties</h2>
    <?php
        if ($resultset[0] == "NO RECORD") {
            echo "<div class='alert alert-danger'>NO RECORD FOUND</div>";
        }else{
    ?>
        <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">Property Title</th>
            <th>Address</th>
            <th>Price</th>
            <th>Status</th>
            <th>Location</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo $value['location'] ?></td>
            
                
        <?php
            }
        ?>
        </tbody>
    </table>
    <?php
        }
    ?>
    <script type="text/javascript" language="javascript">
        function deleteCheck(e){            
        let deleteprompt = confirm("Are you sure you want to delete this property?");
         if (deleteprompt == true) {
            return true;
         }else{
         e.preventDefault();
         return false;
         }
        }
    </script>
    <?php include_once "footer.php"?>
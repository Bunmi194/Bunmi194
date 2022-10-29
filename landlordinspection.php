<?php   
        include_once "portalheader.php";
        session_start();
        if (!isset($_SESSION['landlord'])) {
            $_SESSION['break'] = "You need to log in as a landlord to access the page";
            header("Location: signin.php");
            exit();
        }
?>
<style>
    .forms{
        display: inline-block;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/landlord.php";
        $landmessage = new Landlord();
        $resultset = $landmessage->getAllInspections($_SESSION['id']);
        
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";

        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r($resultset);
        // echo "</pre>";
        if(isset($_REQUEST['output'])){
            echo $output;
        }
    ?>
    <h2>My Inspections</h2>
    <?php
        if ($resultset[0] == "NO RECORD") {
            echo "<div class='alert alert-danger'>NO RECORD FOUND</div>";
        }else{
    ?>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">Property Title</th>
            <th>Inspection Date</th>
            <th>Inspection Status</th>
            <th>Booked Date</th>
            <th>Date Uploaded</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo date('jS M Y', strtotime($value['inspection_date'])) ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo date('jS M Y', strtotime($value['booked_date'])) ?></td>
                <td><?php echo date('jS M Y', strtotime($value['date_registered'])) ?></td>
                
        <?php
            }
        }
        ?>
        </tbody>
    </table>
    <?php include_once "footer.php"?>
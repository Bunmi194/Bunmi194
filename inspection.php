<?php 
        session_start();
        include_once "header.php";
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
        
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";

        
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
        
        echo "<pre>";
        print_r($resultset);
        echo "</pre>";
        if(isset($_REQUEST['output'])){
            echo $output;
        }
    ?>
    <h2>My Messages</h2>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">Property Title</th>
            <th>Inspection Date</th>
            <th>Status</th>
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
        ?>
        </tbody>
    </table>
    <?php include_once "footer.php"?>
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
        include_once "shared/landlord.php";
        include_once "shared/admin.php";
        $landmessage = new Admin();
        $resultset = $landmessage->getAllLandlords();
        
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
    <?php
        if ($resultset[0] == "NO RECORD") {
            echo "<div class='alert alert-danger'>NO RECORD FOUND</div>";
        }else{
    ?>
    <h2>All Landlords</h2>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Account Details</th>
            <th>NIN</th>
            <th>KEY</th>
            <th>Date Registered</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $value['landlord_id'] ?></td>
                <td><?php echo $value['landlord_lastname']." ".$value['landlord_firstname'] ?></td>
                <td><?php echo $value['landlord_email'] ?></td>
                <td><?php echo $value['landlord_phone'] ?></td>
                <td><?php echo $value['account_name']."<br>".$value['account_number']."<br>".$value['bank_name'] ?></td>
                <td>
                <?php echo $value['landlord_nin']?>
                </td>
                <td>
                <?php echo $value['keylogin']?>
                </td>
                <td>
                <?php echo $value['date_registered']?>
                </td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
    <script type="text/javascript" language="javascript">
        function popprompt(e){
            let prompt = confirm("Are you sure you want to accept this inspection request?");
            if (prompt == true) {
                return true;
            }else{
                e.preventDefault();
                return false;
            }
        }

            function popprompt2(e){
            let prompt = confirm("Are you sure you want to reject this inspection request?");
            if (prompt == true) {
                return true;
            }else{
                e.preventDefault();
                return false;
            }
        }
    </script>
    <?php include_once "footer.php"?>
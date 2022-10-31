<?php 
        session_start();
        include_once "portalheader.php";
?>
<style>
    .forms{
        display: inline-block;
    }
    #alltenantstop{
        margin-top: 50px;
        font-weight: bold;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/landlord.php";
        include_once "shared/admin.php";
        $landmessage = new Admin();
        $resultset = $landmessage->getAllTenants();
        
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
    
    <h2 id="alltenantstop">All Tenants</h2>
    <?php
        if (isset($_SESSION['suspension_status'])) {
            echo "<div class='alert alert-warning'>".$_SESSION['suspension_status']."</div>";
            unset($_SESSION['suspension_status']);
        }
    ?>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>NIN</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $value['tenant_id'] ?></td>
                <td><?php echo $value['lastname']." ".$value['firstname'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td>
                <?php echo $value['nin']?>
                </td>
                
                <td>
                    <form action="suspension.php?id=<?php echo $value['tenant_id'] ?>" method="POST">
                        <button type="submit" name="btnsuspend">Suspend</button>
                        <button type="submit" name="btnunsuspend">Unsuspend</button>
                    </form>
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
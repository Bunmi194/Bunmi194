<?php 
        session_start();
        unset($_SESSION['inspection_id']);
        $_SESSION['inspection_id'] = $_REQUEST['id'];
        include_once "portalheader.php";
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
    .form-control h5{
        text-align: center;
        padding: 10px;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/landlord.php";
        $landmessage = new Landlord();
        $resultset = $landmessage->getAllMessages($_SESSION['id']);
        
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";

        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r($resultset);
        // echo "</pre>";
    ?>
          <div class="form-control">
                    <h5>Are you sure you want to reject this request?</h5>
                    <form action="processinspection.php" method="POST" class="forms btn">                    
                        <button id="btnno" type="submit" class="btn btn-danger spacebtn" name="btnno">No</button>
                    </form>
                    <form action="processinspection.php" method="POST" class="forms btn">
                        <button type="submit" class="btn btn-primary spacebtn" name="btnyes">Yes</button>
                    </form>

    </div>
    <h2>My Messages</h2>
    <table class="table">
        <thead>
            <th>S/N</th>
            <th style="text-align:center">Message</th>
            <th>Price</th>
            <th>Status</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php
            $i = 1;
            foreach ($resultset as $key => $value) {
        ?>
                <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $value['message'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo $value['description'] ?></td>
                <td><?php echo $value['inspection_date'] ?></td>
                <td>
                    <form action="processinspection.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms">
                        
                        <button type="submit" class="btn btn-success" name="btnaccept" disabled>Accept</button>
                    </form>
                    <form action="processinspection.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms">
                    <button type="submit" class="btn btn-danger" name="btnreject" disabled>Reject</button>
                </form>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <?php include_once "footer.php"?>
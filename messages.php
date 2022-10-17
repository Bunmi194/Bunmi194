<?php 
        session_start();
        include_once "header.php"
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
        $resultset = $landmessage->getAllMessages($_SESSION['id']);
        
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
                <td><?php echo $value['date'] ?></td>
                <td>
                    <form action="messagesresponse.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms">
                    <?php
                        if(isset($value['status']) && $value['status'] != "pending"){
                            echo '<button type="submit" class="btn btn-success mt-2" name="btnaccept" disabled>Accept</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-success mt-2" name="btnaccept">Accept</button>';
                        }
                    ?>

                    </form>
                    <form action="messagesres.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms">
                    <?php
                        if(isset($value['status']) && $value['status'] != "pending"){
                            echo '<button type="submit" class="btn btn-danger mt-2" name="btnreject" disabled>Reject</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-danger mt-2" name="btnreject">Reject</button>';
                        }
                    ?>
                    
                </form>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <?php include_once "footer.php"?>
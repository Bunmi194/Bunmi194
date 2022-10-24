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
                    <form action="inspectionbooking.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms" onsubmit="popprompt(event)">
                    <?php
                        if(isset($value['status']) && $value['status'] != "pending"){
                            echo '<button type="submit" class="btn btn-success mt-2" name="btnacceptreal" class="popbutton" disabled>Accept</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-success mt-2" name="btnacceptreal" class="popbutton">Accept</button>';
                        }
                    ?>

                    </form>
                    <form action="processinspection.php?id=<?php echo $value['inspection_id'] ?>" method="POST" class="forms" onsubmit="popprompt2(event)">
                    <?php
                        if(isset($value['status']) && $value['status'] != "pending"){
                            echo '<button type="submit" class="btn btn-danger mt-2" name="btnyes" class="popbutton" disabled>Reject</button>';
                        }else{
                            echo '<button type="submit" class="btn btn-danger mt-2" name="btnyes" class="popbutton">Reject</button>';
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
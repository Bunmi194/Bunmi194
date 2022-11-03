<?php 
        session_start();
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
    #landlordproperties{
        margin-top: 50px;
        font-weight: bold;
    }
    .spacetop{
        margin-top: 40px;
    }
</style>
<body>
    <?php

        include_once "shared/constants.php";
        include_once "shared/landlord.php";
        $landmessage = new Landlord();
        $resultset = $landmessage->getAllProperties($_SESSION['id']);
        
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";

        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        
        // echo "<pre>";
        // print_r($resultset);
        // echo "</pre>";
        if(isset($_SESSION['mssgf'])){
            echo $_SESSION['mssgf'];
            unset($_SESSION['mssgf']);
        }
        if(isset($_SESSION['mssg'])){
            echo $_SESSION['mssg'];
            unset($_SESSION['mssg']);
        }
        if(isset($_SESSION['delmsg'])){
            echo $_SESSION['delmsg'];
            unset($_SESSION['delmsg']);
        }
    ?>
    <h2 id="landlordproperties">My Properties</h2>
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
            <th>Date Updated</th>
            <th>Action</th>
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
                <td><?php echo date('jS M Y', strtotime($value['date'])) ?></td>
                <td>
                    <form action="editproperty.php?apartmentid=<?php echo $value['apartments_id'] ?>" method="POST">
                    <?php
                        if (isset($_SESSION['role'])) {
                    ?>
                    
                    <button type="submit" class="btn btn-primary" disabled>Edit</button>
                    <?php
                        }else{
                    ?>
                    
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <?php
                        }
                    ?>
                        <input type="hidden" name="apt" value="<?php echo $value['apartments_id'] ?>">
                    </form>
                    <form action="deleteproperty.php?apartmentid=<?php echo $value['apartments_id'] ?>" method="POST" onsubmit="deleteCheck(event)">
                        <?php
                            if (isset($_SESSION['role'])) {
                        ?>
                        <button type="submit" class="btn btn-danger" name="btndelete" id="btndel" disabled>Delete</button>
                        <?php
                            }else{
                        ?>
                        <button type="submit" class="btn btn-danger" name="btndelete" id="btndel">Delete</button>
                        <?php
                            }
                        ?>
                        <input type="hidden" name="apt" value="<?php echo $value['apartments_id'] ?>">
                    </form>
                </td>
                
        <?php
            }
        }
        ?>
        </tbody>
    </table>
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
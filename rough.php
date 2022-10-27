<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "shared/constants.php";
        include_once "shared/common.php";
        $obj = new Common();
        $check = $obj->checkStatus(1);
        
        echo "<pre>";
        print_r($check);
        echo "</pre>";
        echo $check['status'];
        exit;
        $date1 = date_create("2022-10-26");
        $date2 = date_create(date('Y-m-d'));
        echo "<pre>";
        print_r(date_diff($date2, $date1));
        echo "</pre>";
        echo date_diff($date2, $date1)->invert;
        exit();
        //echo password_hash("12345678JKL194LA$$",PASSWORD_DEFAULT);
        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        include_once "shared/constants.php";
        include_once "shared/tenant.php";
        $mene = new Tenant();
        $sk = $mene->lookForEmail('fjkrt@gmail.com');

        echo "<pre>";
        print_r($sk);
        echo "</pre>";

    ?>
    <form action="">
    <input type="date" name="date" id="date">
    <input type="time" name="time" id="time">
    <button type="submit">Submit</button>
    </form>
    
    
</body>
</html>

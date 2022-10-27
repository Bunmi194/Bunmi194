<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
        .align{
            margin-left: 43%;
        }
        .font{
            font-family: bold;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        if ($_SESSION['payment'] = "success" && ($_SESSION['logger'] = "K!NG_DAViD")) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col alert alert-success">
                    <p class="font">Your payment has been successfully received.</p>
                    <a href="index.php" class="btn btn-primary align">Go to Home Page</a>
                </div>
            </div>
        </div>
    <?php
        }else{
            header("index.php");
            exit();
        }
    ?>
</body>
</html>
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
        echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";
    ?>
    <form action="">
    <input type="date" name="date" id="date">
    <input type="time" name="time" id="time">
    <button type="submit">Submit</button>
    </form>
    
    
</body>
</html>
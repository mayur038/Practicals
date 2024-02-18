<?php 

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php 
    if(isset($_SESSION['username']))
    {
        echo "hey, ".$_SESSION['username']." Doing good !!";
    }
    else 
    {
        header("location:5.php");
    }
    ?></h1>
</body>
</html>
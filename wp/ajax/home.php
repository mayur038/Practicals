<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    
    if(isset($_SESSION['uname'])){
        echo "<h1>Hello ".$_SESSION['uname'].", <br> what's your plan for today ? </h1> ";
        
    }
    ?>
    <form action="projectconnect.php" method="post">
    <button name="logout">logout</button>
    </form>
</body>
</html>
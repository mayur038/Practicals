<?php

    // Connection To the database ------------------------------------------------------------------------------
    $server = "localhost";
    $username = "root"; 
    $password = "";
    $db = "test";
    $con = mysqli_connect($server,$username,$password,$db);

    if(!$con)
    {
        echo "Database Error : Connection failed <br>".mysqli_connect_error();
    }

    // complete------------------------------------------------------------------------------------------------

else
{
    session_start();
    //User Login -----------------------------------------------------------------------------------------------

    if(isset($_POST['logout']))
    {
        session_destroy();
        header("location:login.php");
    }

    if(isset($_POST['submit']))
    {
    
    
    $uname = (string) $_POST['username'];
    $pwd = (string) $_POST['password'];

       $connect = "SELECT * FROM `users` WHERE `Username` = '$uname'";
       $c_run = mysqli_query($con,$connect);
        $row = mysqli_fetch_array($c_run);
       $nu = mysqli_num_rows($c_run);
       
      
       if($con -> query($connect) == TRUE)
       {
        
                if($nu == 1)
                { 
                    
                    if($pwd == $row['password'])
                    {
                        $cookie_name = 'Username';
                        $_SESSION['uname'] = $uname;
                      
                        setcookie($cookie_name,$uname,time()+5555*60);
                        setcookie('Password',$pwd,time()+(5555*60));
                       header("location:home.php?log=15");
                        
                    }
                    else
                    {
                        echo "<script></script>";
                        header("locaton:login.php");
                    }
                }
                else
                {
                    header("location:../HTML/login.php?rn=p");
                    // echo "Invalid Username Enter Valid Username and try again..";
                }
       }
       else{
           echo "<label>ERROR  : $sql <br> $con->error</label>";
 
       echo $connect;

    }    
    }
}   
    $con->close();
    // connection close
?>
 
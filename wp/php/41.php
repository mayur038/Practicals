<?php
$server = "localhost";
$uname = "root";
$pass = "";
$dbname = "test";
$connect = mysqli_connect($server,$uname,$pass,$dbname);

if(!$connect)
{
    echo mysqli_connect_error($connect);
}
else
{
   
if(isset($_POST['submit']))
{
        $name = $_POST['name'];
       $dob = $_POST['dob'];
       $gender = $_POST['gender'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $state = $_POST['state'];
       $education = $_POST['education'];    
     
       $pimaddress = addslashes(file_get_contents($_FILES['image']['tmp_name']));
      
       $query = "INSERT INTO `wp_test`( `name`, `dob`, `gender`, `email`, `mobile`,
    `address`, `state`, `education`, `image`, `date`) VALUES ('$name',
    '$dob','$gender','$email','$phone','$address','$state','$education',
    '$pimaddress',CURRENT_TIMESTAMP());";

    $QRUN = mysqli_query($connect,$query);

    if(!$QRUN)
    {
        echo $connect->error;
    }
    else
    {
        echo "<h1>Inserted sucessfully</h1>";
        echo "<a href='41form.html'>Back to home</a>";
    }

}
}
?>
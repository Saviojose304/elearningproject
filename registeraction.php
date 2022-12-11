<?php

$mysqli = new mysqli("localhost", "elearning", "bFQFI838xI5)Pl8r", "elearning");

if ($mysqli == false) {
    die("could not connect" . $mysqli->connect_error);
}

if($_POST)
{
    $username = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $sql ="SELECT email,password FROM user_register_tb where email='$username' and password='$pass'";

    if ($mysqli->query($sql) === false){
        echo '<script>alert("Login successfully")</script>';
        echo "<script>window.location.replace('E-Learning.php') </script>";
    
      } 
      else{
        echo "Error:Could not able to execute $sql. " . $mysqli->error;
      }
}
$mysqli->close();
?>
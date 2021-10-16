<?php
session_start();
if($_SESSION['auth2']=="true")
{
   
     if((time() -$_SESSION['last_login_timestamp'])>900)
   {
    header('location:logout.php');
   }
   else{
    $_SESSION['last_login_timestamp']=time();
   }
}
else {
  header('Location:main1.php');
 }
require "dbconfig.php";
 $con=mysqli_connect($host,$user,$pass,$db) or die("we couldn't connect");
$id=$_REQUEST['id'];
$query = "DELETE FROM police WHERE username='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: policereport.php"); 
?>
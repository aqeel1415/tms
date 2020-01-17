<?php
if (isset($_POST['Save'])){
session_start();

 $connection = mysqli_connect("localhost","root","","ats_db");
  error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$locationID = $_POST['location_id'];
$locationname = $_POST['location_name'];
$teacherid = $_POST['teacher_id'];

if(strcmp($teacherid, 'null') == 0){
 mysqli_query($connection,"UPDATE location SET location_name='$locationname' , teacher_id=NULL  where location_id = '$locationID' ");   
} 

else{ 
 mysqli_query($connection,"UPDATE location SET location_name='$locationname' , teacher_id='$teacherid' WHERE location_id='$locationID' ");      
}

echo '<script> location.replace("settings.php"); </script>';
mysqli_close($connection);
}


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("settings.php"); </script>';
    exit();
    }
?> 
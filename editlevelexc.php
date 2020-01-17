<?php

if (isset($_POST['Save'])){
session_start();

 $connection = mysqli_connect("localhost","root","","ats_db");
 error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$levelID = $_POST['level_id'];
$levelname = $_POST['level_name'];

mysqli_query($connection,"UPDATE level SET level_name='$levelname'   WHERE level_id='$levelID'");
echo '<script> location.replace("settings.php"); </script>';
mysqli_close($connection);
 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("settings.php"); </script>';
    exit();
    }
?> 
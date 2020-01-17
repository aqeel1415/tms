<?php 

if (isset($_POST['Save'])){
session_start();

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$unitID = $_POST['unit_id'];
$unitname = $_POST['unit_name'];

mysqli_query($connection,"UPDATE unit SET unit_name='$unitname'   WHERE unit_id='$unitID'");
echo '<script> location.replace("settings.php"); </script>';
mysqli_close($connection);

}


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("settings.php"); </script>';
    exit();
    }


?> 
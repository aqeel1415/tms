<?php

if (isset($_POST['Save'])){
session_start();
  $connection = mysqli_connect("localhost","root","","ats_db");
   error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$loctools_id = $_POST['loctools_id'];
$new_qty = $_POST['new_qty'];
mysqli_query($connection,"UPDATE locationtools SET qty='$new_qty' WHERE locationtool_id ='$loctools_id'");

include 'quantity_recalculator.php';
include 'check_sufficiency.php';
echo '<script> location.replace("tools.php"); </script>';
mysqli_close($connection);


 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("tools.php"); </script>';
    exit();
    }
?> 
<?php  

if (isset($_POST['Save'])){
session_start();

   $connection = mysqli_connect("localhost","root","","ats_db");
    error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$level_id = $_POST['student_level'];
$chapter_id = $_POST['student_chapter'];
$quantity = $_POST['tool_quantity'];
$chpt_id = $_POST['chpt_id'];
    
mysqli_query($connection,"UPDATE chaptertools SET level_id= '$level_id' , req_qty='$quantity' , chapter_id='$chapter_id' where chaptertool_id='$chpt_id' ");

include 'check_sufficiency.php';
echo '<script> location.replace("settings.php"); </script>';
mysqli_close($connection);
}


if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("settings.php"); </script>';
    exit();
    }
?> 
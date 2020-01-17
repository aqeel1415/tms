<?php  
 if (isset($_POST['Save'])){
session_start();
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }

$studentID = $_POST['studentid'];
$studentname = $_POST['student_name'];
$studentemail=$_POST['student_email'];
$studentphone=$_POST['student_phone']; 	
$student_level = $_POST['student_level'];
$student_chapter = $_POST['student_chapter'];

mysqli_query($connection,"UPDATE student SET student_name='$studentname', student_email='$studentemail' , student_phone='$studentphone' ,level_id='$student_level' ,chapter_id='$student_chapter'  WHERE student_id='$studentID'");

include 'quantity_recalculator.php';
include 'check_sufficiency.php';
echo '<script> location.replace("student.php"); </script>';
mysqli_close($connection);



 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("student.php"); </script>';
    exit();
    }

?> 
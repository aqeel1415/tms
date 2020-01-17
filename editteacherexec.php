<?php
if (isset($_POST['Save'])){
session_start();
 $connection = mysqli_connect("localhost","root","","ats_db");
  error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }

$teacherID = $_POST['teacherid'];
$teachername = $_POST['teacher_name'];
$teacheremail=$_POST['teacher_email'];
$teacherphone=$_POST['teacher_phone'];
$teachercloan=$_POST['cons_loan'];
$teachernloan = $_POST['noncons_loan'];

    
mysqli_query($connection,"UPDATE teacher SET teacher_name='$teachername', teacher_email='$teacheremail' , teacher_phone='$teacherphone', cons_loan='$teachercloan', noncons_loan='$teachernloan' WHERE teacher_id='$teacherID'");
echo '<script> location.replace("teacher.php"); </script>';
mysqli_close($connection);



 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("teacher.php"); </script>';
    exit();
    }
?> 
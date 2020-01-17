<?php 

if (isset($_POST['Save'])){
session_start();

  $connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


$tool_id = $_POST['tool_id'];
$toolname = $_POST['tool_name'];
$toolcodeid=$_POST['tool_code_id'];
$tool_sn=$_POST['tool_sn'];
$tooltype=$_POST['tool_type'];
$toolremark=$_POST['tool_remark'];




mysqli_query($connection,"UPDATE tool SET tool_name='$toolname' , tool_sn='$tool_sn', tool_type='$tooltype', code_id='$toolcodeid' , tool_type='$tooltype' , tool_remark='$toolremark'  WHERE tool_id='$tool_id' ");


echo '<script> location.replace("tools.php"); </script>';
mysqli_close($connection);



 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("tools.php"); </script>';
    exit();
    }
?> 
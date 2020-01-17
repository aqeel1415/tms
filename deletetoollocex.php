<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_POST['yes'])){
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

    
    $tool_id =$_POST['id'];
    mysqli_query($connection,"DELETE FROM locationtools where tool_id='$tool_id'");

                include 'quantity_recalculator.php';
                include 'check_sufficiency.php';
                echo '<script> location.replace("tools.php"); </script>'; 
                exit();   
      }

    if (isset($_POST['no']))
    {
    echo '<script> location.replace("tools.php"); </script>';
    exit();
    }		
?> 

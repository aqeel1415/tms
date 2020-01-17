<?php 
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
    
    $student_level =$_POST['student_level'];
    $chpater_id =$_POST['chapter_id'];
    $tool_id =$_POST['tool_id'];
    $qnty =$_POST['req_quantity'];

 			mysqli_query($connection,"INSERT INTO chaptertools (level_id , chapter_id , tool_id , req_qty )
            VALUES ( '$student_level' , '$chpater_id' , '$tool_id' , '$qnty')" );           
			
          $update = mysqli_query($connection,"INSERT INTO totalqtyneed (tool_id , chapter_id)
          VALUES ( '$tool_id' ,'$chpater_id' )");  

            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';
	    echo '<script> location.replace("settings.php"); </script>';
	    exit();


?> 

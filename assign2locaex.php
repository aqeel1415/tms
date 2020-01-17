<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
    
    $teacher_id =$_POST['teacher_id'];
    $unit_id =$_POST['tool_unit'];
    $tool_locid =$_POST['tool_location'];
			

  mysqli_query($connection,"UPDATE location SET teacher_id='$teacher_id' where location_id = '$tool_locid' and unit_id = '$unit_id' " );    

            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';			
            echo '<script> location.replace("teacher.php"); </script>'; 
			exit();
    
		
?> 

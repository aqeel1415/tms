<?php 
    
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

		
    $unit_name =$_POST['unit_name'];
			
			mysqli_query($connection,"INSERT INTO unit ( unit_name )
            VALUES ( '$unit_name' )" );
			
			
			echo '<script> location.replace("settings.php"); </script>';
			exit();


?>

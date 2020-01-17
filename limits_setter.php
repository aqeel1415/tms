<?php 
$connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);


    $noncons_loan =$_POST['noncons_loan'];	
    $connections_loan =$_POST['cons_loan'];
    mysqli_query($connection,"UPDATE teacher SET cons_loan_limit='$connections_loan' ");
    mysqli_query($connection,"UPDATE teacher SET noncons_loan_limit='$noncons_loan' ");

    include 'quantity_recalculator.php';
    include 'check_sufficiency.php';
    echo '<script> location.replace("settings.php"); </script>';
    exit();
		
			
	


?>
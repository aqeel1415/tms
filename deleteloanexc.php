
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>


<?php 
if (isset($_POST['yes']))
	{
            $connection = mysqli_connect("localhost","root","","ats_db");
            error_reporting(E_ALL ^ E_DEPRECATED);
			if (!$connection)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			
			$toolloan_id = $_POST['id'];
            $result0 = mysqli_query($connection,"SELECT status FROM toolloan where toolloan_id = '$toolloan_id' ");
            $row0 = mysqli_fetch_array($result0);
            $status = $row0['status'];
            if(strcmp($status, 'Returned') == 0){
			 mysqli_query($connection,"DELETE FROM toolloan WHERE toolloan_id='$toolloan_id'");
                
            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';
             echo '<script> location.replace("index.php"); </script>';
			 exit(); 
            }
            else {
            echo '<div class="errorDiol">';
            echo "<br/>The order should be checked to be returned first in order to be deleted<br/>";
            echo '</div>';  
            echo '<form action="index.php">';
            echo '<div class="errorDiol">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';
            }
            mysqli_close($connection);
      
    }


            if (isset($_POST['no']))
            {
            echo '<script> location.replace("index.php"); </script>';
            exit();
            }



    
    ?>

    
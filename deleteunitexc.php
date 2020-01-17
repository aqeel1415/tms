
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
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
			
			
			$unit_id = $_POST['id'];
      
            $Nloan = false;
            $Nloct = false;
            $Nloc = false;
    
            $result4 = mysqli_query($connection,"SELECT * FROM toolloan where unit_id = '$unit_id' ");
            $row4 = mysqli_num_rows($result4);
            $result5 = mysqli_query($connection,"SELECT * FROM locationtools where unit_id = '$unit_id' ");
            $row5 = mysqli_num_rows($result5);
            $result6 = mysqli_query($connection,"SELECT * FROM location where unit_id = '$unit_id' ");
            $row6 = mysqli_num_rows($result6);
    

    
            if ($row4 > 0){
            $Nloan = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The unit has some orders that should be deleted first in order to delete it<br/>";
            echo '</div>';
            }
    
            if ($row5 > 0){
            $Nloct = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The unit has some tools in its location, delete them first in order to delete the unit<br/>";
            echo '</div>';
            }

            if ($row6 > 0){
            $Nloc = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The unit has some locations, delete them first in order to delete the unit<br/>";
            echo '</div>';
            }
    
            if(($Nloan === false) and ($Nloct === false) and ($Nloc === false)) {
            mysqli_query($connection,"DELETE FROM unit WHERE unit_id='$unit_id'");
                
            include 'quantity_recalculator.php';
            include 'check_sufficiency.php'; 
            echo '<script> location.replace("settings.php"); </script>';
            exit();
            mysqli_close($connection);
            }

			
			mysqli_close($connection);
			}
		 if (isset($_POST['no']))
	        {
			
			echo '<script> location.replace("settings.php"); </script>';
			exit();
		
			}



            echo '<form action="settings.php">';
            echo '<div class="buttons">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';

			?>
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
			
			
			$location_id = $_POST['id'];
            $Nloan = false;
            $Nloc = false;
    

            $result5 = mysqli_query($connection,"SELECT * FROM toolloan where location_id = '$location_id' ");
            $row5 = mysqli_num_rows($result5);
            $result6 = mysqli_query($connection,"SELECT * FROM locationtools where location_id = '$location_id' ");
            $row6 = mysqli_num_rows($result6);
    

    
            if ($row5 > 0){
            $Nloan = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The location is assigned in some orders, delete them first in order to delete the location<br/>";
            echo '</div>';
            }

            if ($row6 > 0){
            $Nloc = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The location has some tools, delete or move them first in order to delete the location<br/>";
            echo '</div>';
            }
      
      
      
      
            if(($Nloan === false) and ($Nloc === false)) {
            mysqli_query($connection,"DELETE FROM location WHERE location_id='$location_id'");
                
                
			echo '<script> location.replace("settings.php"); </script>';
            exit();
            mysqli_close($connection);
            }
         }


           if (isset($_POST['no']))
	        {
			
			echo '<script> location.replace("settings.php"); </script>';
			exit();
		
			}

            echo '<form action="settings.php">';
            echo '<div class="errorDiol">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';

			?>
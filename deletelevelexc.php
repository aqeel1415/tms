<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>


<?php  
  if (isset($_POST['yes']))
	{
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			
			$level_id = $_POST['id'];
            $Nchpt = false;
            $Nstudn = false;
            $Nchp = false;
    
            $result4 = mysqli_query($connection,"SELECT * FROM chaptertools where level_id = '$level_id' ");
            $row4 = mysqli_num_rows($result4);
            $result5 = mysqli_query($connection,"SELECT * FROM student where level_id = '$level_id' ");
            $row5 = mysqli_num_rows($result5);
            $result6 = mysqli_query($connection,"SELECT * FROM chapter where level_id = '$level_id' ");
            $row6 = mysqli_num_rows($result6);
    

    
            if ($row4 > 0){
            $Nchpt = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The level has some chapters with tools assigned to them, delete them first in order to delete the level<br/>";
            echo '</div>';
            }
    
            if ($row5 > 0){
            $Nstudn = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The level is assigned to some students, change them first in order to delete the level<br/>";
            echo '</div>';
            }
      
            if ($row6 > 0){
            $Nchp = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The level has some chapters, delete them first in order to delete the level<br/>";
            echo '</div>';
            }
      
      
           if(($Nchpt === false) and ($Nstudn === false) and ($Nchp ===false)) {
            mysqli_query($connection,"DELETE FROM level WHERE level_id='$level_id'");
               
            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';
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
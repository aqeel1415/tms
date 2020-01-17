
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
			
			
			$chapter_id = $_POST['id'];
            $Nchp = false;
            $Nstudn = false;
            $Nloc = false;
    
            $result4 = mysqli_query($connection,"SELECT * FROM chaptertools where chapter_id = '$chapter_id' ");
            $row4 = mysqli_num_rows($result4);
            $result5 = mysqli_query($connection,"SELECT * FROM plan_content where chapter_id = '$chapter_id' ");
            $row5 = mysqli_num_rows($result5);
            $result6 = mysqli_query($connection,"SELECT * FROM totalqtyneed where chapter_id = '$chapter_id' ");
            $row6 = mysqli_num_rows($result6);
    

    
            if ($row4 > 0){
            $Nchp = true;    
            echo '<div class="errorDiol">';
            mysqli_query($connection,"UPDATE chaptertools SET chapter_id=NULL where chapter_id = '$chapter_id'");   
            echo "<br/>The chapter has some tool assigned to it, delete them first in order to delete the chapter<br/>";
            echo '</div>';
            }
    
            if ($row5 > 0){
            $Nstudn = true;    
            echo '<div class="errorDiol">';
            mysqli_query($connection,"UPDATE plan_content SET chapter_id=NULL where chapter_id = '$chapter_id'");
            echo "<br/>The chapter is assigned to some plan contents, change them first in order to delete the chapter<br/>";
            echo '</div>';
            }

    
            if ($row6 > 0){
            $Nloc = true;    
            echo '<div class="errorDiol">';
            mysqli_query($connection,"UPDATE totalqtyneed SET chapter_id=NULL where chapter_id = '$chapter_id'");
            echo "<br/>The chapter is assigned to some needed table, change them first in order to delete the chapter<br/>";
            echo '</div>';
            }


      
      
           if(($Nchp === false) and ($Nstudn === false) and ($Nloc === false)) {
            mysqli_query($connection,"DELETE FROM chapter WHERE chapter_id='$chapter_id'");
               
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
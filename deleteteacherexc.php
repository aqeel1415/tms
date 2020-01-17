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
			
			
			$teacher_id = $_POST['id'];
            $Nloca = false;
            $Nloan = false;
    
            $result4 = mysqli_query($connection,"SELECT * FROM location where teacher_id = '$teacher_id' ");
            $row4 = mysqli_num_rows($result4);
            $result5 = mysqli_query($connection,"SELECT * FROM toolloan where teacher_id = '$teacher_id' ");
            $row5 = mysqli_num_rows($result5);
    

    
            if ($row4 > 0){
            $Nloca = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The teacher is a assigned in some locations, change those locations to other teachers in order to delete him<br/>";
            echo '</div>';
            }
    
            if ($row5 > 0){
            $Nloan = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The teacher has some orders that should be deleted first in order to delete him<br/>";
            echo '</div>';
            }
    
            if(($Nloca === false) and ($Nloan === false)) {
            mysqli_query($connection,"DELETE FROM teacher WHERE teacher_id='$teacher_id'");
            echo '<script> location.replace("teacher.php"); </script>';
            exit();
            mysqli_close($connection);
            }
			}


		 if (isset($_POST['no']))
	        {
			
			echo '<script> location.replace("teacher.php"); </script>';
			exit();
		
			}




            echo '<form action="teacher.php">';
            echo '<div class="buttons">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';
    
    
			?>
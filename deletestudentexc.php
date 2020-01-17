

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
			
			
			$student_id = $_POST['id'];
            $Nloan = false;

    

            $result5 = mysqli_query($connection,"SELECT * FROM toolloan where student_id = '$student_id' ");
            $row5 = mysqli_num_rows($result5);

    
    
            if ($row5 > 0){
            $Nloan = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The student is assigned in some orders, delete them first in order to delete the student<br/>";
            echo '</div>';
            }


            if($Nloan === false) {
            mysqli_query($connection,"DELETE FROM student WHERE student_id='$student_id'");
                
            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';
            echo '<script> location.replace("student.php"); </script>';
            exit();
            mysqli_close($connection);
            }
        }
			 if (isset($_POST['no']))
	        {
            echo '<script> location.replace("student.php"); </script>';
			exit();
			}


            echo '<form action="student.php">';
            echo '<div class="buttons">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';


			
?>
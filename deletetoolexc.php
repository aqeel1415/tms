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
			
			
			$tool_id = $_POST['id'];
            $Nchp = false;
            $Nloan = false;
            $Nloc = false;
    
            $result4 = mysqli_query($connection,"SELECT * FROM chaptertools where tool_id = '$tool_id' ");
            $row4 = mysqli_num_rows($result4);
            $result5 = mysqli_query($connection,"SELECT * FROM toolloan where tool_id = '$tool_id' ");
            $row5 = mysqli_num_rows($result5);
            $result6 = mysqli_query($connection,"SELECT * FROM locationtools where tool_id = '$tool_id' ");
            $row6 = mysqli_num_rows($result6);
    

    
            if ($row4 > 0){
            $Nchp = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The tool is assigned in some chapters, delete them first in order to delete the tool<br/>";
            echo '</div>';
            }
    
            if ($row5 > 0){
            $Nloan = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The tool is assigned in some orders, delete them first in order to delete the tool<br/>";
            echo '</div>';
            }

            if ($row6 > 0){
            $Nloc = true;    
            echo '<div class="errorDiol">';
            echo "<br/>The tool is assigned in some locations, delete them first in order to delete the tool<br/>";
            echo '</div>';
            }
    
            if(($Nchp === false) and ($Nloan === false) and ($Nloc === false)) {
            mysqli_query($connection,"DELETE FROM toolsneeded WHERE tool_id='$tool_id'");
            mysqli_query($connection,"DELETE FROM tool WHERE tool_id='$tool_id'");
            echo '<script> location.replace("tools.php"); </script>';
            exit();
            mysqli_close($connection);
            }
         }


           if (isset($_POST['no']))
	       {
			
			echo '<script> location.replace("tools.php"); </script>';
			exit();
		
			}



            echo '<form action="tools.php">';
            echo '<div class="errorDiol">';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';
			?>
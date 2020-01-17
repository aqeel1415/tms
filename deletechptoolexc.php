<?php
  if (isset($_POST['yes']))
	{
            $connection = mysqli_connect("localhost","root","","ats_db");
            error_reporting(E_ALL ^ E_DEPRECATED);
			if (!$connection)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			
			$chpt_id = $_POST['id'];
        
           $result3 = mysqli_query($connection,"SELECT * FROM chaptertools where chaptertool_id='$chpt_id' ");
           $row3 = mysqli_fetch_assoc($result3); 
            
            $chapter_id = $row3['chapter_id'];
            $tool_id = $row3['tool_id'];
            
			mysqli_query($connection,"DELETE FROM chaptertools WHERE chaptertool_id='$chpt_id'");

            mysqli_query($connection,"DELETE FROM totalqtyneed WHERE chapter_id ='$chapter_id' and tool_id ='$tool_id' ");
      
      
            include 'quantity_recalculator.php';
            include 'check_sufficiency.php';
	    echo '<script> location.replace("settings.php"); </script>';
	    exit();
	    mysqli_close($connection);
	}


if (isset($_POST['no']))
	        {
			
		echo '<script> location.replace("settings.php"); </script>';
		exit();
		
	}
?>
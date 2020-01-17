<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_GET['id']))
	{
	echo '<form action="editlevelexc.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$levelid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM level WHERE level_id = $levelid");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="level_id" value="'. $row['level_id'] .'">'; 
            echo 'Name : </br>'.'<input class="selectadj" type="text" name="level_name" value="'. $row['level_name'] .'">'; 
            echo '<br>';
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
            echo '</div>';
            echo '</form>';
			}
			?>
			
			


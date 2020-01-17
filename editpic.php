
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_GET['id']))
	{
	$connection = mysqli_connect("localhost","root","","ats_db");
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


		
		$id=$_GET['id'];
		$result = mysqli_query($connection,"SELECT * FROM tool WHERE tool_id = $id");

           while($row = mysqli_fetch_array($result))
           {
            echo '<div class="buttons">';
            echo "<img width=200 height=180 alt='Unable to View' src='" . $row["tool_image"] . "'>";
            echo '</div>';
            }
            echo '<form action="editpicexec.php" method="post" enctype="multipart/form-data">';
	        echo '<br>';
			echo '<input type="hidden" name="toolimage" value="'. $_GET['id'] .'">';
			echo 'Select Image';
			echo '<br>';
			echo '<input type="file" class="btn btn-default" name="image">'.'<br>';
            echo '<div class="modalbuttons">';
			echo '<input type="submit" class="btn btn-default" data-toggle="modal" value="Upload">';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
            echo '</div>';
            echo '</form>';
			}
?>
			

<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>


<?php
 if (isset($_GET['id']))
	{
			$student_id = $_GET['id'];
			echo '<form action="deletestudentexc.php" method="post">';
			echo '<input name="id" type="hidden" value="'. $student_id . '" />';
			echo 'Are you sure you want to delete this student?';
			echo '<div class="modalbuttons">'.'<input  class="btn btn-default" name="yes" type="submit" value="Yes" />'."  ".'<input  class="btn btn-default" data-toggle="modal" id="nobtn" type="submit" name="no" data-dismiss="modal" value="No" />'.'</div>';
			echo '</form>';
			
	}
			
?>

			
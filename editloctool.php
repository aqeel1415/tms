<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_GET['id']))
	{
            echo '<form action="editloctoolexc.php" method="post">';
            echo '<br>';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
            $loctools =$_GET['id'];
            echo '<input type="hidden" name="loctools_id" value="'. $loctools .'">';
			$result = mysqli_query($connection,"SELECT * FROM locationtools WHERE locationtool_id = '$loctools' ");
			$row = mysqli_fetch_assoc($result);
            echo '<div style="text-align:center;">'; 
            echo 'Quantity : '.'<input class="selectadj" type="number" min="0" name="new_qty" value="'. $row['qty'] .'">';
            echo '<p>&nbsp;</p>';                 
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
            echo '</div>';
            echo '</form>';
  }
?>
			
			

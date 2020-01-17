<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/> 
    

<?php
if (isset($_GET['id']))
	{
	echo '<form action="editplanexec.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}

			$planid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM plan,level where plan.level_id = level.level_id and plan.plan_id = $planid");

			$row = mysqli_fetch_array($result);
            echo '<input type="hidden" name="planid" value="'. $row['plan_id'] .'">'; 
            echo'Name : '.'</br>'.'<input class="selectadj" type="text" name="plan_name" value="'. $row['plan_name'] .'">'; 
            echo '<br>';
            echo'Plan Start : '.'</br>'.'<input class="selectadj" type="date" name="plan_start" value="'. $row['plan_start_date'] .'">'.'</br>';  
            echo'Plan End : '.'</br>'.'<input class="selectadj" type="date" name="plan_end" value="'. $row['plan_end_date'] .'">'.'</br>';             
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
  			
	        echo '</form>';
            }
			
			?>
			

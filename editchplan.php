<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/> 
    

<?php
if (isset($_GET['id']))
	{
	echo '<form action="editchplanex.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			$plan_cont_id=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM plan_content,chapter,level where plan_content.chapter_id = chapter.chapter_id and plan_content.level_id = level.level_id and plan_content.plan_cont_id = $plan_cont_id");

			$row = mysqli_fetch_array($result);
            echo '<input type="hidden" name="chplanid" value="'. $row['plan_cont_id'] .'">';             
            echo '<input type="hidden" name="plan_chapter" value="'. $row['chapter_id'] .'">'; 
            echo'Chapter Start : '.'</br>'.'<input class="selectadj" type="date" name="chapter_start" value="'. $row['chapter_start_date'] .'">'.'</br>';  
    
/*            echo'Chapter End : '.'</br>'.'<input class="selectadj" type="date" name="chapter_end" value="'. $row['chapter_end_date'] .'">'.'</br>';*/             
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
  			
	        echo '</form>';
            }
			
			?>
			

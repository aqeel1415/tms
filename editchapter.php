<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_GET['id']))
	{
	echo '<form action="editchapterexc.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$chapterid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM chapter,level WHERE level.level_id = chapter.level_id and chapter.chapter_id = $chapterid");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="chapter_id" value="'. $row['chapter_id'] .'">'; 
            echo 'Chapter : </br>'.'<input type="text" class="selectadj" name="chapter_name" value="'. $row['chapter_name'] .'">'; 
            echo '<br>';
            echo 'Level  : </br>';
            echo '<select class="selectadj" name="level_id"> ';
            echo '<option value='. $row['level_id'] .' >'. $row['level_name'] .'</option>';
            $prelvlid= $row['level_id'];
            $dd_res=mysqli_query($connection,"Select * from level where level_id != $prelvlid ");
            while($r=mysqli_fetch_row($dd_res))
            { 
            echo '<option value="'.$r[0].'"> '.$r[1].' </option>';
            }

            echo'</select><br />';  
            echo 'Duration : </br>'.'<input type="number" min="1" class="selectadj" name="chapter_duration" value="'. $row['chapter_duration'] .'">'; 
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
	        echo '</form>';
			}
			?>
			
			

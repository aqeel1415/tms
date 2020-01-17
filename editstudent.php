<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>   
<?php
if (isset($_GET['id']))
	{
	echo '<form action="editstudentexec.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$studentid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM student,level,chapter WHERE student.level_id = level.level_id and student.chapter_id = chapter.chapter_id and student.student_id = $studentid");

			$row = mysqli_fetch_array($result);
            echo '<input type="hidden" name="studentid" value="'. $row['student_id'] .'">'; 
            echo'Name : '.'</br>'.'<input class="selectadj" type="text" name="student_name" value="'. $row['student_name'] .'">'; 
            echo '<br>';
            echo'Email : '.'</br>'.'<input class="selectadj" type="text" name="student_email" value="'. $row['student_email'] .'">'; 
            echo '<br>';
            echo'Phone : '.'</br>'.'<input class="selectadj" type="text" name="student_phone" value="'. $row['student_phone'] .'">'; 
            echo '<br>';
                
            echo 'Level : <br />';
                
            echo '<select class="selectadj" name="student_level" id="level_chosen5"> ';
            echo '<option value='. $row['level_id'] .' >'. $row['level_name'] .'</option>';
            $prelvlid= $row['level_id'];
            $res=mysqli_query($connection,"Select * from level where level_id != $prelvlid ");
            while($row1=mysqli_fetch_row($res))
            { 
            echo '<option value="'.$row1[0].'"> '.$row1[1].' </option>';
            }
            echo'</select><br />';
            
            echo'Chapter : <br /> ';  
            echo'<select class="selectadj" name="student_chapter" id="chapters_has5"> '; 
            echo' <option value='. $row['chapter_id'] .' >'. $row['chapter_name'] .'</option>'; 
            echo'</select> <br/>';
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
  			
	        echo '</form>';
            }
			
			?>
			

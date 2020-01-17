<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>


<?php
if (isset($_GET['id']))
	{
            echo '<form action="editlocexec.php" method="post">';
            echo '<br>';
            echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$locationid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT teacher.teacher_id,teacher.teacher_name,location.location_id,location.location_name FROM location LEFT JOIN teacher ON location.teacher_id =teacher.teacher_id where location.location_id = $locationid ORDER BY teacher.teacher_name;");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="location_id" value="'. $row['location_id'] .'">'; 
            echo'Location : '.'</br>'.'<input class="selectadj" type="text" name="location_name" value="'. $row['location_name'] .'">'; 
            echo '<br>';
            echo'Teacher : </br>'; 
            echo '<select class="selectadj" name="teacher_id"> ';
                
        if ($row['teacher_id'] == null){
            echo '<option value="null" >None</option>';  
            $pretchrid= $row['teacher_id'];
            $dd_res=mysqli_query($connection,"Select * from teacher where teacher_id != '$pretchrid'");
                while($r=mysqli_fetch_row($dd_res))
                    { 
                        echo '<option value="'.$r[1].'"> '.$r[0].' </option>';
                    }
            echo'</select><br />'; 
        }
               
        else{
            echo '<option value='. $row['teacher_id'] .' >'. $row['teacher_name'] .'</option>';  
            $pretchrid= $row['teacher_id'];
            $dd_res=mysqli_query($connection,"Select * from teacher where teacher_id != '$pretchrid'");
                while($r=mysqli_fetch_row($dd_res))
                    { 
                        echo '<option value="'.$r[1].'"> '.$r[0].' </option>';
                    }
            
            echo '<option value="null">None</option>';
            echo'</select><br />';
        }
            
            
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
    
    
	        echo '</form>';
			}
			?>
			
			


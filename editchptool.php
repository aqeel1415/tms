<script src="js/Retreivels.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>
 
<?php
if (isset($_GET['id']))
	{
	echo '<form action="editchptoolexec.php" method="post">';
	echo '<br>';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$chptid=$_GET['id'];
            echo '<input type="hidden" name="chpt_id" value="'. $chptid .'">';
			$result = mysqli_query($connection,"SELECT * FROM chaptertools,tool,level,chapter where chaptertools.tool_id = tool.tool_id and chaptertools.level_id = level.level_id and chaptertools.chapter_id = chapter.chapter_id and chaptertools.chaptertool_id = $chptid ");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="chapter_id" value="'. $row['chapter_id'] .'">'; 
            echo 'Level : <br />';
            echo '<select class="selectadj" name="student_level" id="level_chosen4"> ';
            echo '<option value='. $row['level_id'] .' >'. $row['level_name'] .'</option>';
            $prelvlid= $row['level_id'];
            $dd_res=mysqli_query($connection,"Select * from level where level_id != $prelvlid ");
            while($r=mysqli_fetch_row($dd_res))
            { 
            echo '<option value="'.$r[0].'"> '.$r[1].' </option>';
            }
            echo'</select><br />';
            
            echo'Chapter : <br /> ';  
            echo'<select class="selectadj" name="student_chapter" id="chapters_has4"> '; 
            echo' <option value='. $row['chapter_id'] .' >'. $row['chapter_name'] .'</option>'; 
            echo'</select> <br/>';
            echo'Quantity per student : '.'</br>'.'<input class="selectadj" name="tool_quantity"  type="number"  max="1000000" min="1"  onkeypress="return isNumberKey(event)" value="'. $row['req_qty'] .'">'; 
            echo '<br>';
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
	        echo '</form>';
			}
?>
			
			

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
if (isset($_GET['id']))
	{
	echo '<form action="addchplanex.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$planid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM plan where plan_id = $planid ");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="plan_id" value="'. $row['plan_id'] .'">'; 
    
            $levelid = $row['level_id'];
            echo 'Unit : </br>';  
            echo '<select class="selectadj" name="chapter_id" >';  
            echo '<option value="" >select</option> '; 
                     $dd_res=mysqli_query($connection,"Select * from chapter where level_id= $levelid ")
                     while($r=mysqli_fetch_row($dd_res))
                     { 
                           echo '<option value='$r[0]'>'.$r[1].' </option>';
                     }

            echo '</select><br />';  
            echo '<br>';            
            echo 'Chapter Start : </br>'.'<input class="selectadj"  name="ch_start_date"  type="date" class="ed" ">'; 
            echo '<br>';            
            echo 'Chapter End : </br>'.'<input class="selectadj"  name="ch_end_date" type="date" class="ed" ">'; 
            echo '<br>';
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Add" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
            echo '</div>';
            echo '</form>';
			}



?>
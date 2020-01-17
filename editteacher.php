<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>  



<?php
        if (isset($_GET['id']))
           {
	       echo '<form action="editteacherexec.php" method="post">';
	       echo '<br>';
	       echo '<input type="hidden" name="" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$teacherid=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM teacher WHERE teacher_id = $teacherid");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="teacherid" value="'. $row['teacher_id'] .'">'; 
            echo'Name : '.'</br>'.'<input class="selectadj" type="text" name="teacher_name" value="'. $row['teacher_name'] .'">'; 
            echo '<br>';
            echo'Email : '.'</br>'.'<input class="selectadj" type="email" name="teacher_email" value="'. $row['teacher_email'] .'">'; 
            echo '<br>';
            echo'Phone : '.'</br>'.'<input class="selectadj" type="text" name="teacher_phone" value="'. $row['teacher_phone'] .'">'; 
            echo '<br>';
            echo'Consumable tools : '.'</br>'.'<input class="selectadj" type="number"  max="1000000" min="0"  onkeypress="return isNumberKey(event)"  name="cons_loan" value="'. $row['cons_loan'] .'">'; 
            echo '<br>';
            echo'Nonconsumable tools : '.'</br>'.'<input class="selectadj" type="number"  max="1000000" min="0"  onkeypress="return isNumberKey(event)"  name="noncons_loan" value="'. $row['noncons_loan'] .'">'; 
            echo '<br>';
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
	        echo '</form>';
			}
?>
			
			

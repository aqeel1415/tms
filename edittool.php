<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>


<?php
if (isset($_GET['id']))
	{
	echo '<form action="edittoolex.php" method="post">';
	echo '<br>';
	echo '<input type="hidden" value="'. $_GET['id'] .'">';
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			
			$tool_id=$_GET['id'];
			$result = mysqli_query($connection,"SELECT * FROM tool WHERE tool_id = $tool_id");

			$row = mysqli_fetch_assoc($result);
            echo '<input type="hidden" name="tool_id" value="'. $row['tool_id'] .'">'; 
            echo "<img width=60 height=60 alt='Unable to View' src='" . $row["tool_image"] . "'>";
            echo '<br>';
            echo'Name : '.'</br>'.'<input class="selectadj" type="text" name="tool_name" value="'. $row['tool_name'] .'">'; 
            echo '<br>';
            echo'Code ID : '.'</br>'.'<input class="selectadj" type="text" name="tool_code_id" value="'. $row['code_id'] .'">'; 
            echo '<br>';
            echo'Type : </br>';    
            echo '<select class="selectadj" name="tool_type" >';
            $prevttype = $row['tool_type'];
            echo '<option value="'.$prevttype.'" > '.$prevttype.' </option>';          
            if(strcmp($prevttype, 'Consumable') == 0){
            echo '<option value="NonConsumable"> NonConsumable </option>';
            echo '<option value="Device"> Device </option>';
            }
            if(strcmp($prevttype, 'NonConsumable') == 0){
            echo '<option value="Consumable"> Consumable </option>';
            echo '<option value="Device"> Device </option>';
            }
            else {
            echo '<option value="NonConsumable"> NonConsumable </option>';
            echo '<option value="Consumable"> Consumable </option>';    
            }    
            echo'</select></br>';
             
            echo'Serial Number : '.'</br>'.'<input class="selectadj" type="text" name="tool_sn" value="'. $row['tool_sn'] .'" onkeypress="return isNumberKey(event)">';
             echo '<br>'; 
            echo'Remarks: </br>'.'<input class="selectadj" type="text" name="tool_remark" value="'. $row['tool_remark'] .'">'; 
            echo '<br>'; 
            echo '<div class="modalbuttons">';    
            echo '<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
            echo '  ';
            echo '<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
  			echo '</div>';
  			
	        echo '</form>';
			}
			?>
			
			

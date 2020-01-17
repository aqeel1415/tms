<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/Retreivels.js"></script>


<input name="teacher_id" type="hidden" value= "<?php echo $_GET['id']; ?>">



<?php 
;
if (isset($_GET['id']))
{
            $inv_id = $_GET['id'];
			echo '<form action="return_tool_proc.php" name="returnedtools" method="post"  onsubmit="return validateReturntoolsForm()">';
/*			echo '<input name="inv_id" type="hidden" value="'. $inv_id . '" />';*/
    
            $connection = mysqli_connect("localhost","root","","ats_db");
            error_reporting(E_ALL ^ E_DEPRECATED);
                if (!$connection){die('Could not connect: ' . mysql_error());}
                
    
                $result = mysqli_query($connection,"SELECT * FROM toolloan where toolloan_id = '$inv_id' ");
                $row = mysqli_fetch_assoc($result);
                $tool_id = $row['tool_id'];
                $quantity = $row['qty_loan'];
                $teacher_id = $row['teacher_id'];
                $status = $row['status'];
    
    
    if(strcmp($status, 'Unreturned') == 0){
            echo '<input name="inv_id" type="hidden" value="'. $inv_id . '" />';
            echo '<input name="tool_id" type="hidden" value="'. $tool_id . '" />';
            echo '<input name="qty_loan" type="hidden" value="'. $quantity . '" />';
            echo '<input name="teacher_id" type="hidden" value="'. $teacher_id . '" />';
    
            echo 'Choose the location for the returned tools : <br />';
            echo 'Unit : <br />';
            echo '<select class="selectadj" name="unit_id" id="unit_chosen5">';
            echo '<option value="" >select</option>'; 
                    $connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
                    

                     $dd_res=mysqli_query($connection,"Select * from unit");
                     while($r=mysqli_fetch_row($dd_res))
                     { 
                           echo "<option value='$r[0]'> $r[1] </option>";
                     }    
            echo '</select><br />';
            echo 'Location : <br />';   
            echo '<select class="selectadj" name="location_id" id="Locs_has5">'; 
            echo '<option value="" >select</option>'; 
            echo '</select>';
            echo '<p>&nbsp;</p>';
            echo 'Are you sure you want to check the order to be returned and assign the returned tools in the specified location?';
            echo '<p>&nbsp;</p>';
			echo '<div class="modalbuttons">'.'<input  class="btn btn-default" name="yes" type="submit" value="Yes" />'."  ".'<input  class="btn btn-default" data-toggle="modal" id="nobtn" type="submit" name="no" data-dismiss="modal" value="No" />'.'</div>';
			echo '</form>';

    
    }
else {
            echo '<form action="index.php">';
            echo '<div class="errorDiol">';
            echo "<br/>The loan is already returned<br/>";
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" data-dismiss="modal" type="submit" value="Close" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';
}
    
    
}
    
?>
			
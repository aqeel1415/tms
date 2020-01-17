<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        


<?php
echo'<form action="assign2chapex.php" method="post" enctype="multipart/form-data" name="assignchap">';
$tool_id = $_GET['id'];
echo '<input name="tool_id" type="hidden" value="'. $tool_id . '" />';    
echo'Level : <br/>';
echo'<select class="selectadj" name="student_level" id="level_chosen2">'; 
echo'<option value="" >select</option>'; 

$connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
        
         $dd_res=mysqli_query($connection,"Select * from level");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        
echo'</select><br/>';
    
    
echo'Chapter : <br />';   
echo'<select class="selectadj" name="chapter_id" id="chapters_has2">'; 
echo'<option value="" >select</option>';
echo'</select><br/>';

echo'Quantity per student : <br />';
echo'<input class="selectadj" name="req_quantity" type="number"  max="1000000" min="1"  onkeypress="return isNumberKey(event)" type="number" /><br />';
    
echo'<div  class="modalbuttons">'; 
echo'<input  class="btn btn-default" data-toggle="modal" type="submit" name="Save" value="Assign"/>';
echo '  ';
echo'<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
echo'</div>'; 

echo'</form>';

    
?>
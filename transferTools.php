

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php 
echo'<form action="transferToolsex.php" method="post" enctype="multipart/form-data" name="add2loca" onsubmit="return validateForm()">';
$tool_id = $_GET['id'];
echo'<input name="tool_id" type="hidden" value= "'.$tool_id.'">';
echo'Unit :<br/>';
echo'<select class="selectadj" name="tool_unit" id="unit_chosen3"> ';
echo'<option value="" >select</option> ';
       
        $connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
        
         $dd_res=mysqli_query($connection,"Select * from locationtools,unit where locationtools.unit_id = unit.unit_id and locationtools.tool_id = '$tool_id' ");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[1]'> $r[6] </option>";
         }
echo'</select><br />';
echo'Unit Location : <br />  '; 
echo'<select class="selectadj" name="tool_location" id="Locs_has3">';
echo'<option value="" >select</option>';
echo'</select> <br/>';
    
echo'Choose the destination unit and location : <br />  ';
    
echo'Unit : <br />';
echo'<select class="selectadj" name="tool_unit2" id="unit_chosen4"> ';
echo'<option value="" >select</option> ';
         $dd_res=mysqli_query($connection,"Select * from unit");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }

echo'</select><br />';
    
echo'Unit Location : <br />';   
echo'<select class="selectadj" name="tool_location2" id="Locs_has4">'; 
echo'<option value="" >select</option> ';
echo'</select> <br/>';   
    
    
echo'Quantity to be transfer: <br />';
echo'<input class="selectadj" type="number" name="tool_quantity"  min="0" max="1000000" pattern="^[0-9]" onkeypress="return isNumberKey(event)" step="1" /><br/>';
    
    
echo'<div class="modalbuttons"> ';
echo'<input  class="btn btn-default" data-toggle="modal" name="Save" type="submit" value="Save" />';
echo '  ';
echo'<input  class="btn btn-default" data-toggle="modal" id="cancelbtn" type="submit" name="Cancel" data-dismiss="modal" value="Cancel" />';
echo'</div>';
echo'</form>';
?>
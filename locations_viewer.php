
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<script src="js/Retreivels.js"></script>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/resptable.css"/>


<div id="no-more-tables">
<table class="col-md-12 table-bordered table-striped table-condensed cf">
    <thead>
				  <tr>  
                   <td width="40" id="label"> Unit name </td>	  
                   <td width="40" id="label"> Location </td>
                   <td width="40" id="label"> Quantity </td>
                   <td width="40" id="label"> Action </td>
                      
                   </tr>  
    </thead>
    <tbody>


<?php  
            $connection = mysqli_connect("localhost","root","","ats_db");
            error_reporting(E_ALL ^ E_DEPRECATED);
                
                $tool_id = $_GET['id'];
                
                $result8 = mysqli_query($connection,"SELECT * FROM locationtools , unit , location  WHERE locationtools.tool_id = '$tool_id' and locationtools.location_id = location.location_id and locationtools.unit_id = unit.unit_id ");
                while($row8 = mysqli_fetch_array($result8))
                     {
			    echo '<tr>';
                            echo '<input name="tool_id" type="hidden" value= "' . $tool_id . '" />';
                            echo '<td data-title="Unit Name">'.$row8['unit_name'].'</td>';
                            $locationtool_id = $row8['locationtool_id'];
                            echo '<input name="unit_id" type="hidden" value= "' . $locationtool_id . '" />';
                            echo '<td data-title="Location Name">'.$row8['location_name'].'</td>';
                            echo '<input name="location_id" type="hidden" value= "' . $row8['location_id'] . '" />';
                            echo '<td data-title="Quantity">'.$row8['qty'].'</td>';
                            echo '<input name="qty" type="hidden" value= "' . $row8['qty'] . '" />';
                            echo '<td data-title="Action">';
                    
                            echo '<a rel="facebox" href=editloctool.php?id=' . $row8['locationtool_id'] .'  class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
                            echo ' ';
                    
                            echo '</td>';
				            echo '</tr>';
                            echo '</tbody>';
				      }

echo '</table><br />';    
echo '</div>';
echo '<p>&nbsp;</p>';  

echo '<div class="modalbuttons">';   
    echo '<form action="deletetoolloc.php" method="post">'; 
    echo '<input name="tool_id" type="hidden" value= "'.$tool_id.'">';
    echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Delete All"/>';
    echo '  ';
    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
    echo '</form>';
echo '</div>';
?>






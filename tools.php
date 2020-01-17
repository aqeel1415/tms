<?php
	require_once('auth.php');
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


    

<title>Tools Tracking System</title>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
 <script src="js/bootstrap.min.js"></script>   
    
    
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<link type="text/css" rel="stylesheet" href="css/resptable.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-select.min.css" />
    
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
    
})
</script> 

<script src="lib/facebox-bootstrap.js" type="text/javascript"></script>

        
<!--live search bootstrap select -->
<script src="js/bootstrap-select.min.js"></script> 
<script src="js/Retreivels.js"></script>  
</head>

<body class="buttons">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">TTS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="tools.php">Tools</a></li>  
        <li><a href="teacher.php">Teachers</a></li>
        <li><a href="student.php">Students</a></li>
        <li><a href="plan.php">Plans</a></li>
        <li><a href="settings.php">Settings</a></li>        
      </ul>
        
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    
    

<div id="no-more-tables">
			  <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
				<thead>
                  <tr>  
                   <!--<td width="50" > Tool ID </td>-->	  
                   <td width="300" > Name </td>	
                   <td width="100" > Code ID </td>	 	
                   <td width="100" > Serial Number </td>				
                   <!--<td width="50" > Tool Status </td>-->		
                   <td width="50" > Type  </td>
                   <td width="20" > Location </td> 	
                   <!--<td width="20" >  Quantity </td>-->
                   <!--<td width="10" >  Remark </td>-->
                   <td width="280" > Action </td>
                   </tr>
              </thead>
          <?php
			    $connection = mysqli_connect("localhost","root","","ats_db");
				if (!$connection)
				{
				die('Could not connect: ' . mysql_error());
                }
						
				                              
						$result3 = mysqli_query($connection,"SELECT * FROM tool");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                           /* echo '<td data-title="Tool ID">'.$row3['tool_id'].'</td>';*/
							echo '<td data-title="Name">';
							echo'<a rel="facebox" href=editpic.php?id=' . $row3["tool_id"] . '>' . $row3["tool_name"]  . '</a>';
							echo '</td>';
							echo '<td data-title="Code ID">'.$row3['code_id'].'</td>';
/*							echo '<td data-title="Serial Number">'.$row3['tool_sn'].'</td>';*/
                            /*echo '<td data-title="Tool Status">'.$row3['tool_status'].'</td>';*/
                            echo '<td data-title="Type">'.$row3['tool_type'].'</td>';
                            echo '<td data-title="Location">';
							echo'<a rel="facebox" href=locations_viewer.php?id=' . $row3["tool_id"] . '>' . 'Locations'  . '</a>';

                            echo '</td>';
                            echo '<td data-title="Tool Quantity">'.$row3['tool_quantity'].'</td>';
                           /* echo '<td>'.$row3['tool_remark'].'</td>'; */
                            echo '<td data-title="Action">';   
                            echo '<a rel="facebox" href=edittool.php?id=' . $row3["tool_id"] .'  class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
                            echo ' ';
                            echo '<a rel="facebox" href=deletetool.php?id=' . $row3["tool_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';  
                            echo ' ';
                            echo '<a rel="facebox" href=assign2chap.php?id=' . $row3["tool_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" ></i></a>';
                            echo ' ';
                            echo '<a rel="facebox" href=transferTools.php?id=' . $row3["tool_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-exchange fa-lg" aria-hidden="true" ></i></a>'; 
                            echo ' ';
                            echo '<a  rel="facebox" href=tool_rept_content.php?id=' . $row3["tool_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-file-text-o fa-lg" aria-hidden="true" ></i></a>';
                            echo '</td>';
                            echo '</tr>';
                            echo '</tbody>';
                    }
			  
			 ?>
			   
			  </table>
            </div>
<p>&nbsp;</p>    
<div class="buttons">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addtool">Add Tool</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#allrpts" >All reports</button>
<p>&nbsp;</p>
    
<!-- All tool reports Modal -->
  <div class="modal fade" style="text-align:left" id="allrpts" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Teacher Adder</h4>-->
        </div>
        <div class="modal-body">
         <form action="alltool_rept_Maker.php" method="post">
         Check the contents you want to be in the report <br/> 
         <input type='checkbox' name='t_rpt_cont[]' value='locations'>Locations<br>
         <input type='checkbox' name='t_rpt_cont[]' value='chapters'>Assigned Units<br>
         <input type='checkbox' name='t_rpt_cont[]' value='loan'>Order history<br>
         <input type='checkbox' name='t_rpt_cont[]' value='sufficiency'>Tool Sufficiency<br>
         <div class="modalbuttons">   
         <input  class="btn btn-default" data-toggle="modal" type="submit" value="Generate"/>
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  		 </div>
         </form> 

        </div>
        <div class="modal-footer">
            <br/>
           
        </div>
      </div>
    </div>
  </div>
 </div>
<!-- --> 
    
    
<!-- Add Tool Modal -->
  <div class="modal fade" style="text-align:left" id="addtool" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            
<form action="addtoolexec.php" method="post" enctype="multipart/form-data" name="addtool" onsubmit="return validatetooladdForm()" >
Name : <br />
<input class="selectadj" name="tool_name"  type="text"/><br />

Type : <br />
<select class="selectadj" name="tool_type" onchange="return selectType()"> 
    <option value="" >select</option>
    <option value="Consumable"  > Consumable </option>";
    <option value="NonConsumable"> NonConsumable </option>";
    <option value="Device"> Device </option>";
</select><br /> 

Quantity : <br />
<input class="selectadj" type="number" name="tool_quantity"  min="0"  step="1" /><br/>

Code ID : <br />
<input class="selectadj" name="tool_code_id"  type="text"  /><br />
    
Serial Number : <br />
<input class="selectadj" name="tool_sn"  type="text"  onkeypress="return isNumberKey(event)"/><br />

<input name="tool_id" type="hidden" value= "<?php echo $_GET['id']; ?>">
     

Place : <br />
  <select class="selectadj" name="tool_unit" id="unit_chosen1"> 
   <option value="" >select</option> 
    <?php 
     $connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
     

     $dd_res=mysqli_query($connection,"Select * from unit");
     while($r=mysqli_fetch_row($dd_res))
           { 
            echo "<option value='$r[0]'> $r[1] </option>";
         }
       ?>
   </select><br />
    
    
    
 Location : <br />   
    <select class="selectadj" name="tool_location"   id="Locs_has1"> 
    <option value="" >select</option> 
    </select> <br/>
    
    
    

Tool Remark : <br />
<input class="selectadj" name="tool_remark" id="tool_remark" type="text"  /><br/>


Tool Picture : <input type="file" name="image" ><br />
<div class="modalbuttons">  
<input  class="btn btn-default" data-toggle="modal" type="submit" value="Add"/>
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>     
</form>

    </div>
        <div class="modal-footer">
            <br/>
           
        </div>
      </div>
    </div>
  </div>

<!-- -->  
      <div id="no-more-tables">            
       <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
		<thead>
                  <tr>   
                   <td width="180" > Tool Name </td>
                   <td width="50" > Quantity needed </td>	
                   </tr>
                </thead>
                 <tbody>
				<?php                        
						$result8 = mysqli_query($connection,"SELECT tool_name,needed_quantity FROM toolsneeded,tool where toolsneeded.tool_id = tool.tool_id ");
						while($row8 = mysqli_fetch_array($result8))
							{
							echo '<tr>';
							echo '<td data-title="Tool Name">'.$row8['tool_name'].'</td>'; 
                            echo '<td data-title="Quantity needed">'.$row8['needed_quantity'].'</td>'; 
				            echo '</tr>';
							}
			  ?>
                          </tbody>
			  </table>
               <br />
            </div>
    
    
     
    
    
    
    
    
    
</body>
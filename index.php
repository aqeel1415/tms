<?php
	require_once('auth.php');
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tools Tracking System</title>

  
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->  
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

<!--<script src="lib/facebox-bootstrap.js" type="text/javascript"></script>-->
<script src="lib/facebox-bootstrap.js" type="text/javascript"></script>
<!--<script src="lib/bootstrap.min.js" type="text/javascript"></script>-->
<!--<script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

    
  
        
<!--live search bootstrap select -->
<!-- <script src="js/jquery.min.js"></script>  
<script src="js/bootstrap.min.js"></script>-->
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
                    <td width="20" >Order ID</td>
                    <td width="100" >Tool name</td>
                    <td width="40" >Tool Type</td>
                    <td width="80" >Teacher </td>
                    <td width="80" >Student </td>
					<td width="80" >Place </td>
					<td width="80" >Location</td>
					<td width="70" >Order time </td>
					<td width="70" >Return time</td>
					<td width="40" >Qty</td>
                    <td width="30" >Status</td>
                    <td width="70" >Action</td>
				  </tr>
                 </thead>
        		<tbody>   
          <?php
			    $connection = mysqli_connect("localhost","root","","ats_db");
				if (!$connection)
				{
				die('Could not connect: ' . mysql_error());
                }
								
				

        $result3 = mysqli_query($connection,"SELECT toolloan_id,tool_name,tool_type,teacher_name,student_name,unit_name,location_name,time_loan,time_return,qty_loan,status FROM toolloan LEFT JOIN tool ON  tool.tool_id = toolloan.tool_id LEFT JOIN teacher ON teacher.teacher_id = toolloan.teacher_id LEFT JOIN unit ON toolloan.unit_id = unit.unit_id LEFT JOIN location ON toolloan.location_id = location.location_id LEFT JOIN student ON student.student_id = toolloan.student_id ORDER BY toolloan.toolloan_id;");		
                    
                    
                while($row3 = mysqli_fetch_array($result3))
				{

                echo '<tr>';
                echo '<td data-title="Toolinventory id">'.$row3['toolloan_id'].'</td>';
/*                echo '<input name="tool_id" type="hidden" value= "' . $row3['tool_id'] . '" />';*/
                echo '<td data-title="Tool name">'.$row3['tool_name'].'</td>';
                echo '<td data-title="Tool Type">'.$row3['tool_type'].'</td>';
              	echo '<td data-title="Teacher">'.$row3['teacher_name'].'</td>';
/*                echo '<input name="teacher_id" type="hidden" value= "' . $row3['teacher_id'] . '" />';   */     
                echo '<td data-title="Student">'.$row3['student_name'].'</td>';
              	echo '<td data-title="From place">'.$row3['unit_name'].'</td>';
                echo '<td data-title="From location">'.$row3['location_name'].'</td>';
              	echo '<td data-title="Order time">'.$row3['time_loan'].'</td>';
                echo '<td data-title="Return time">'.$row3['time_return'].'</td>';
				echo '<td data-title="Quantity Ordered">'.$row3['qty_loan'].'</td>';
                echo '<input name="qty" type="hidden" value= "' . $row3['qty_loan'] . '" />';
                echo '<td data-title="Status">'.$row3['status'].'</td>';
                echo '<td data-title="Action">';  
                echo '<a rel="facebox" href=checkloan2return.php?id=' . $row3["toolloan_id"] .' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
                echo '<a rel="facebox" href=deleteloan.php?id=' . $row3["toolloan_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';   
                echo ' ';
                echo '<a  target="_blank" href=loan_rept_Maker.php?id=' . $row3["toolloan_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-file-text-o fa-lg" aria-hidden="true" >';     
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createLoan">Make Order</button>
<p>&nbsp;</p>
  <form action="return_tool_reminder_pro.php" method="post">
  <p>Send Reminders to Teachers:</p>
  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#reminderSet">Ordered Tools Today</button>
  </form>  
<p>&nbsp;</p>
  <form action="check_loan.php" method="post">
  <button type="submit" class="btn btn-primary" data-toggle="modal">Approching Orders Limits</button>
  </form>
<p>&nbsp;</p>

    
<!-- Add loans Modal -->
  <div class="modal fade" style="text-align:left" id="createLoan" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Loans Creator</h4>-->
        </div>
        <div class="modal-body">
            
    <form id="loanInfo"  action="createloanexec.php" method="post" enctype="multipart/form-data" name="createloan" onsubmit="return validateloanaddForm()">
        Tool Name : <br />
        <select  name="tool_id" class="selectpicker" data-live-search="true"> 
            <option value="" >select</option> 
               <?php 
                $connection = mysqli_connect("localhost","root","","ats_db"); error_reporting(E_ALL ^ E_DEPRECATED);
                

                 $dd_res=mysqli_query($connection,"Select * from tool");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'> $r[1] </option>";
                 }
                ?>
        </select>
        <br />

        Quantity  :<br />
        <input class="selectadj" name="tool_quantity"  type="number"  max="1000000" min="1"  onkeypress="return isNumberKey(event)" /><br />  

        Place : <br />
           <select class="selectadj" name="tool_unit" id="unit_chosen"> 
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
           <select class="selectadj" name="tool_location"   id="Locs_has"> 
            <option value="" >select</option> 
           </select> <br/>

        Teacher :<br />
        <select class="selectadj" name="teacher_id" > 
            <option value="" >select</option> 
               <?php 
                 $dd_res=mysqli_query($connection,"Select * from teacher");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[1]'> $r[0] </option>";
                 }
                ?>
        </select><br />
        Student :<br />
        <select class="selectadj"  name="student_id" > 
            <option value="" >select</option> 
               <?php 
                 $dd_res=mysqli_query($connection,"Select * from student");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[1]'> $r[0] </option>";
                 }
                ?>
        </select><br />
        <div  class="modalbuttons"> 
        <input  class="btn btn-default" data-toggle="modal" type="submit" value="Create"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div> 
        </form>
        </div>
      </div>
    </div>
  </div>
 </div>
<!-- -->

<!-- Reminders sender Modal -->
  <div class="modal fade" style="text-align:left" id="reminderSet" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          The reminders are sent successfully.  
        </div>
        <div class="modal-footer">
            <br/>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- -->  
 
<div class="footer" style="text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px;">Tools Tracking System</div>
    
</body>
</html>

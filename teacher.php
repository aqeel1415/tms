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
           <!-- <td width="25" >Teacher ID</td>-->
            <td width="100" >Name</td>
            <td width="30" >Phone</td>
            <td width="35" >Email</td>
            <td width="65" >Consumable Tools</td>
            <td width="65" >NonConsumable Tools</td>      
            <td width="80" >Action</td>       
            </tr>
            </thead>
            <tbody>
        <?php
			   $connection = mysqli_connect("localhost","root","","ats_db");
                error_reporting(E_ALL ^ E_DEPRECATED);
				if (!$connection)
				{
				die('Could not connect: ' . mysql_error());
				}
								
								
								$result3 = mysqli_query($connection,"SELECT * FROM teacher");			
								
								while($row3 = mysqli_fetch_array($result3))
								  { 	
                                 
								 echo '<tr>';
    							/* echo '<td data-title="Teacher ID">'.$row3['teacher_id'].'</td>'*/;
    				             echo '<td data-title="Name">'.$row3['teacher_name'].'</td>';
                                 echo '<td data-title="Phone">'.$row3['teacher_phone'].'</td>';
                                 echo '<td data-title="Email">'.$row3['teacher_email'].'</td>';
                                 echo '<td data-title="Consumable Loan">'.$row3['cons_loan'].'</td>';
                                 echo '<td data-title="Nonconsumable Loan">'.$row3['noncons_loan'].'</td>';
                                 echo '<td data-title="Action">'; 
                                 echo '<a  rel="facebox" href=editteacher.php?id=' . $row3["teacher_id"] .'  class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
                                 echo ' ';
                                 echo '<a rel="facebox" href=deleteteacher.php?id=' . $row3["teacher_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';   
                                 echo ' ';
                                 echo '<a rel="facebox" href=assign2loca.php?id=' . $row3["teacher_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-sign-in fa-lg" aria-hidden="true" ></i></a>';                            
                                 echo ' ';     
                                 echo '<a target="_blank" href=tchrtool_rept_Maker.php?id=' . $row3["teacher_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-list fa-lg" aria-hidden="true" ></i></a>';
                                 echo ' '; 
                                 echo '<a  rel="facebox" href=tchr_rept_content.php?id=' . $row3["teacher_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-file-text-o fa-lg" aria-hidden="true" >'; 
                                 echo ' '; 
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addteacher">Add teacher</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alltrpts">All reports</button>
<p>&nbsp;</p>
    
    
<!-- Add teacher Modal -->
  <div class="modal fade" style="text-align:left" id="addteacher" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Teacher Adder</h4>-->
        </div>
        <div class="modal-body">
            
        <form action="addteacherexec.php" method="post" enctype="multipart/form-data" name="addteacher" onsubmit="return validateTeacherForm()">
        Name : <br />
        <input class="selectadj" name="teacher_name"  type="text" /><br />
        Phone : <br />
        <input class="selectadj" name="teacher_phone"  type="text"  onkeypress="return isNumberKey(event)"/><br />
        Email :<br />
        <input class="selectadj" name="teacher_email"   type="email"   /><br />
        <br />    
        <div class="modalbuttons">  
        <input  class="btn btn-default" data-toggle="modal" type="submit" value="Add"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>      
        </form>
            
        </div>
      </div>
    </div>
  </div>
 </div>
<!-- -->

 <!-- All tchr reports Modal -->
  <div class="modal fade" style="text-align:left" id="alltrpts" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Teacher Adder</h4>-->
        </div>
        <div class="modal-body">
         <form action="alltchr_rept_Maker.php" method="post">
         Check the contents you want to be in the report <br/> 
         <input type='checkbox' name='tchr_rpt_cont[]' value='loans'>Loans info<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='toolloans'>Tools loaned<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='units'>Places assigned<br>
         <input type='checkbox' name='tchr_rpt_cont[]' value='tools'>Tools assigned<br>
         <div class="modalbuttons">   
         <input  class="btn btn-default" data-toggle="modal" type="submit" value="Generate"/>
         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  		 </div>
         </form>  
	     

        </div>
      </div>
    </div>
  </div>

<!-- --> 
</body>
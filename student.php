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
                <!--<td width="25" >Student ID</td>-->
                <td width="150" >Name</td>
                <td width="60" >ID number</td>
                <td width="100" >Email</td>
                <td width="70" >Plan</td>
                <td width="100" >Action</td> 
                </tr>
              </thead>
              <tbody>
              <?php
			   $connection = mysqli_connect("localhost","root","","ats_db");
								if (!$connection)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								
								$result3 = mysqli_query($connection,"select * from student INNER JOIN plan on student.plan_id = plan.plan_id ");
								while($row3 = mysqli_fetch_array($result3))
								  { 	 	  	 	 
								 echo '<tr>';
    							 /*echo '<td data-title="Student ID">'.$row3['student_id'].'</td>';*/
    				             echo '<td data-title="Name">'.$row3['student_name'].'</td>';
                                 echo '<td data-title="ID number">'.$row3['student_phone'].'</td>';
                                 echo '<td data-title="Email">'.$row3['student_email'].'</td>';
                                 echo '<td data-title="Level">'.$row3['plan_name'].'</td>';
                                 echo '<td data-title="Action">'; 
                                 echo'<a rel="facebox" href=editstudent.php?id=' . $row3["student_id"] . '  class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
                                 echo '  ';
                                 echo '<a rel="facebox" href=deletestudent.php?id=' . $row3["student_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';        
                                 echo '</td>';
  								 echo '</tr>';
                                 echo '</tbody>';
								  }
			  
			  ?>
			  </table>
                <br />
            </div>
<p>&nbsp;</p>    
<div class="buttons">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstudent">Add student</button>
<p>&nbsp;</p>
    
    
<!-- Add student Modal -->
  <div class="modal fade" style="text-align:left" id="addstudent" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Teacher Adder</h4>-->
        </div>
        <div class="modal-body">
        <form action="addstudentexec.php" method="post" enctype="multipart/form-data" name="addstudent" onsubmit="return validateStudentForm()">
        Name : <br />
        <input class="selectadj" name="student_name" type="text" class="ed" /><br />
        ID number : <br />
        <input class="selectadj" name="student_phone" type="text" onkeypress="return isNumberKey(event)"/><br />
        Email :<br />
        <input class="selectadj" name="student_email"  type="email"  /><br />
        Level : <br />
        <select class="selectadj" name="student_level" id="level_chosen1" > 
        <option value="" >select</option> 
        <?php 
         $dd_res=mysqli_query($connection,"Select * from level");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
        </select><br />

        Unit : <br />   
        <select  class="selectadj"  name="chapter_id" id="chapters_has1"  > 
        <option value="" >select</option> 
        </select> <br/>

        <br />    
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
 </div>
<!-- -->   
    
    
    
    
    
    
</body>
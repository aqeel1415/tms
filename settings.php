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
    
    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.tr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script>
$(document).ready(function(){

moment.locale('en');
//var ahmet = moment("25/04/2012","DD/MM/YYYY").year();
var date = new Date();
//bugun = moment(date).format("YYYY-MM-DD");
bugun = "<?php $connection = mysqli_connect("localhost","root","","ats_db");
$result7 = mysqli_query($connection,"SELECT start_date FROM plan where plan_id ='3' ");  
$row7 = mysqli_fetch_array($result7);
echo $row7[0];?>";
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        //startDate: '+1d',
        //endDate: '+0d',
        container: container,
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd',
        language: 'en',
        //defaultDate: moment().subtract(15, 'days')
        //setStartDate : "<DATETIME STRING HERE>"
      };
      date_input.val(bugun);
      date_input.datepicker(options).on('focus', function(date_input){
     $("h3").html("focus event");      
      }); ;
      
      
 date_input.change(function () {
    var deger = $(this).val();
    $("h3").html("<font color=green>" + deger + "</font>");
  });      
      
 
      
$('.input-group').find('.glyphicon-calendar').on('click', function(){
//date_input.trigger('focus');
//date_input.datepicker('show');
 //$("h3").html("event : click");


if( !date_input.data('datepicker').picker.is(":visible"))
{
    date_input.trigger('focus');
    $("h3").html("Ok"); 
 
    //$('.input-group').find('.glyphicon-calendar').blur();
    //date_input.trigger('blur');
    //$("h3").html("görünür");    
} else {
}


});      
 
 
 });
 </script>    
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
                   <td width="120" > Tool name </td>
                   <td width="60" > Level</td>	
                   <td width="60" > Unit</td>	  	
                   <td width="40" > Quantity </td>		
                   <td width="40" > Action </td>	   
                   </tr> 
               </thead>
               <tbody>
				  <?php 
                   
                    $connection = mysqli_connect("localhost","root","","ats_db");
                     error_reporting(E_ALL ^ E_DEPRECATED);
                    if (!$connection)
                     {
                        die('Could not connect: ' . mysql_error());	}
						
			$result3 = mysqli_query($connection,"SELECT * FROM chaptertools,tool,level,chapter where chaptertools.tool_id = tool.tool_id and chaptertools.level_id = level.level_id and chaptertools.chapter_id = chapter.chapter_id");
			 while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                            echo '<td data-title="Tool name">'.$row3['tool_name'].'</td>';
                            echo '<td data-title="Level">'.$row3['level_name'].'</td>';
                            echo '<td data-title="Unit">'.$row3['chapter_name'].'</td>';
                            echo '<td data-title="Quantity">'.$row3['req_qty'].'</td>';
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editchptool.php?id=' . $row3["chaptertool_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '  ';
                            echo '<a rel="facebox" href=deletechptool.php?id=' . $row3["chaptertool_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';     
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignchptool">Assign Tool to Unit</button>
<p>&nbsp;</p>
    
    
<!--  assign unit tool Modal -->
  <div class="modal fade" style="text-align:left" id="assignchptool" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
<form action="assign2chapex.php" method="post" enctype="multipart/form-data" name="assignchap">
        Tool : <br />
        <select name="tool_id" class="selectpicker" data-live-search="true"> 
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
    
Level : <br />
   <select class="selectadj" name="student_level" id="level_chosen0"> 
    <option value="" >select</option> 
       <?php 
         $connection = mysqli_connect("localhost","root","","ats_db");
         $dd_res=mysqli_query($connection,"Select * from level");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
</select><br />
    
    
Unit : <br />   
   <select class="selectadj" name="chapter_id" id="chapters_has0"> 
    <option value="" >select</option> 
   </select> <br/>

Quantity per student : <br />
<input class="selectadj" name="req_quantity" type="number"  max="1000000" min="1"  onkeypress="return isNumberKey(event)"/><br />
    
<div  class="modalbuttons"> 
<input  class="btn btn-default" data-toggle="modal" type="submit" value="Assign"/>
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
        
    
    
    
    
    
    
  <div id="no-more-tables">            
			  <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
                <thead>  
				  <tr>  
                   <!--<td width="40" > Place ID </td>	-->  
                   <td width="298" > Name </td>	
                    <td width="100" > Action </td>	
                   </tr> 
                </thead>
                <tbody>
				  <?php                        
                    $connection = mysqli_connect("localhost","root","","ats_db");
                    if (!$connection)
                     {
                        die('Could not connect: ' . mysql_error());	}
						
						$result3 = mysqli_query($connection,"SELECT * FROM unit");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                          /*  echo '<td data-title="Place id">'.$row3['unit_id'].'</td>';*/
                            echo '<td data-title="Place name">'.$row3['unit_name'].'</td>';
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editunit.php?id=' . $row3["unit_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=deleteunit.php?id=' . $row3["unit_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';    
                            echo '</td data-title="">';
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addunit">Add Place</button>
<p>&nbsp;</p>
    
    
<!-- Add place Modal -->
  <div class="modal fade" style="text-align:left" id="addunit" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
 <form action="addunitexec.php" method="post" enctype="multipart/form-data" name="addunit" onsubmit="return validateunitForm()">
Name : <br />
<input class="selectadj" name="unit_name"  type="text" class="ed" /><br />
     
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
            
  <div id="no-more-tables">           
             <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
				<thead>
                 <tr>  
                   <!--<td width="40" > Location ID </td>-->	
                   <td width="100" > Place </td>	
                   <td width="100" > Location </td>	
                   <td width="100" > Teacher </td>	
                   <td width="100" > Action </td>	   
                   </tr> 
              </thead>
               <tbody>
	    <?php                        
                $connection = mysqli_connect("localhost","root","","ats_db");
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }

  
            $result3 = mysqli_query($connection,"SELECT location_id,location_name,teacher_name,unit_name,location_id FROM location LEFT JOIN teacher ON teacher.teacher_id =location.teacher_id LEFT JOIN unit ON unit.unit_id =location.unit_id ORDER BY location.location_id;");
                   
				while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                          /*  echo '<td data-title="Location ID">'.$row3['location_id'].'</td>';*/
                            echo '<td data-title="Place">'.$row3['unit_name'].'</td>';
                            echo '<td data-title="Location">'.$row3['location_name'].'</td>';
                            echo '<td data-title="Teacher">'.$row3['teacher_name'].'</td>';
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editlocation.php?id=' . $row3["location_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=deletelocation.php?id=' . $row3["location_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';  
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addlocation">Add Location</button>
<p>&nbsp;</p>
    
    
<!-- Add location Modal -->
  <div class="modal fade" style="text-align:left" id="addlocation" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            
<form action="addlocexec.php" method="post" enctype="multipart/form-data" name="addlocation" onsubmit="return validatelocForm()">
Location : <br />
<input class="selectadj" name="location_name"  type="text" class="ed" /><br />
    
Teacher : <br />
<select class="selectadj" name="teacher_id"  > 
    <option value="" >None</option> 
       <?php 
         $dd_res=mysqli_query($connection,"Select * from teacher");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[1]'> $r[0] </option>";
         }
        ?>
</select><br />
    
Place : <br />
   <select class="selectadj" name="unit_id" > 
    <option value="" >select</option> 
       <?php 
         $dd_res=mysqli_query($connection,"Select * from unit");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
</select><br />
    
    
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
 
    
 <div id="no-more-tables">         
              <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
               <thead>
                  <tr>  
                   <!--<td width="40" > Level ID </td>	-->  
                   <td width="298" > Name </td>
                   <td width="100" > Action </td>	
                   </tr>
              </thead>
              <tbody>
				  <?php
						$result3 = mysqli_query($connection,"SELECT * FROM level");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                            /*echo '<td data-title="Level ID">'.$row3['level_id'].'</td>';*/
							echo '<td data-title="Name">'.$row3['level_name'].'</td>';
                            echo '<td data-title="Action">'; 
                            echo'<a rel="facebox" href=editlevel.php?id=' . $row3["level_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=deletelevel.php?id=' . $row3["level_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';  
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addlevel">Add Level</button>
<p>&nbsp;</p>
    
    
<!-- Add level Modal -->
  <div class="modal fade" style="text-align:left" id="addlevel" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
<form action="addlevelexec.php" method="post" enctype="multipart/form-data" name="addlevel"  onsubmit="return validatelevelForm()">
Name : <br />
<input class="selectadj" name="level_name"  type="text" class="ed" /><br />
     
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

    

    
<!-- Add chapter Modal -->
  <div class="modal fade" style="text-align:left" id="addchapter" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
<form action="addchpexec.php" method="post" enctype="multipart/form-data" name="addchapter"  onsubmit="return validatechapterForm()">
Name : <br />
<input class="selectadj" name="chapter_name"  type="text" class="ed" /><br />
    
Level : <br />
   <select class="selectadj" name="level_id" id="level_chosen0"> 
    <option value="" >select</option> 
       <?php 
         $connection = mysqli_connect("localhost","root","","ats_db");
         $dd_res=mysqli_query($connection,"Select * from level");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
</select><br />
    
Duration : <br />
 <input class="selectadj" name="chapter_duration"  type="number"  max="1000000" min="1"  onkeypress="return isNumberKey(event)" />
     
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
      
    
    
 <div id="no-more-tables">         
             <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
				 <thead>
                 <tr>  
                   <!--<td width="40" > Unit ID </td>-->
                   <td width="100" > Level </td>
                   <td width="100" > Unit </td>
                   <td width="100" > Duration </td>
                   <td width="100" > Action </td>	   
                   </tr>
               </thead>
               <tbody>
				  <?php                        
						$result3 = mysqli_query($connection,"SELECT * FROM chapter,level where chapter.level_id = level.level_id ");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                            /*echo '<td data-title="Unit ID">'.$row3['chapter_id'].'</td>';*/
                            echo '<td data-title="Level">'.$row3['level_name'].'</td>';
                            echo '<td data-title="Unit">'.$row3['chapter_name'].'</td>';
                            echo '<td data-title="Duration">'.$row3['chapter_duration'].'</td>';
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editchapter.php?id=' . $row3["chapter_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=deletechapter.php?id=' . $row3["chapter_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';    
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addchapter">Add Unit</button>
<p>&nbsp;</p>
</div>    

<!-- -->    
<div class="buttons"> 
                    <?php
                    echo '</br>';
				    $result6 = mysqli_query($connection,"
                    SELECT cons_loan_limit, COUNT(*) AS magnitude 
                    FROM teacher 
                    GROUP BY cons_loan_limit 
                    ORDER BY magnitude DESC
                    LIMIT 1");
				    $row6 = mysqli_fetch_array($result6);
                    $mostclimit = $row6[0];  
				    $result7 = mysqli_query($connection,"
                    SELECT noncons_loan_limit, COUNT(*) AS magnitude 
                    FROM teacher 
                    GROUP BY noncons_loan_limit 
                    ORDER BY magnitude DESC
                    LIMIT 1");
				    $row7 = mysqli_fetch_array($result7);
                    $mostnlimit =$row7[0];  
                    echo '<div style="display: inline-block; text-align: left">';
                    echo '<form action="limits_setter.php" method="post">';
                    echo 'Consumable Tools limit : ';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '&nbsp;';
                    echo '<input name="cons_loan" class="form-control" value='.$mostclimit.' type="number" max="1000000" min="1"  onkeypress="return isNumberKey(event)"  min="0"/>';
                    echo '<br/>';
                    echo '  Non-consumable Tools limit :';
                    echo '&nbsp;';
                    echo '<input name="noncons_loan" class="form-control" value='.$mostnlimit.' type="number" max="1000000" min="1"  onkeypress="return isNumberKey(event)"   min="0"/>';
                    echo '</div>';   
                    echo '<br/>';
                    echo '<p>&nbsp;</p>';
                    echo '<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#limitsSet">Set</button>';
                    echo '<p>&nbsp;</p>';
                    echo '</form>';
            ?>
</div> 
    

    
<!-- Limits setters notification Modal -->
  <div class="modal fade" style="text-align:left" id="limitsSet" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          The loan limits are set successfully.  
        </div>
        <div class="modal-footer">
            <br/>
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



</body>
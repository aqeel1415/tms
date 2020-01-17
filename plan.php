<?php
	require_once('auth.php');

$connection = mysqli_connect("localhost","root","","ats_db");

$result7 = mysqli_query($connection,"SELECT * FROM plan,plan_content,level,chapter where plan.plan_id = plan_content.plan_id and plan_content.chapter_id = chapter.chapter_id and plan_content.level_id = level.level_id ");  

$data = array(); 

    while($row= mysqli_fetch_assoc($result7)){
     $data[] = array(
         "plan_id"=>$row["plan_name"], 
         "level_id"=>$row["level_name"], 
         "chapter_id"=>$row["chapter_name"], 
         "start_date"=>$row["chapter_start_date"], 
         "end_date"=>$row["chapter_end_date"]
     ); 
    }
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["timeline"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {

    var container = document.getElementById('plans_chart');
    var chart = new google.visualization.Timeline(container);
    var dataTable = new google.visualization.DataTable();
    var plan = <?php echo json_encode($data, JSON_PRETTY_PRINT) ?>;
    dataTable.addColumn({ type: 'string', id: 'Plan' });
    dataTable.addColumn({ type: 'string', id: 'Chapter' });
    dataTable.addColumn({ type: 'date', id: 'Chapter Start' });
    dataTable.addColumn({ type: 'date', id: 'Chapter End' });
      
    for (i = 0; i < plan.length ; i++) {
    dataTable.addRows([
      [ plan[i].plan_id , plan[i].chapter_id, new Date(plan[i].start_date) , new Date(plan[i].end_date) ]
    ]);
    }
      
      
    chart.draw(dataTable);
  }
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
    



<div id="plans_chart" style="height: 200px;"></div>

    

    
    
<div id="no-more-tables">         
             <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
				 <thead>
                 <tr>  
                   <td width="100" > Plan </td>
                   <td width="100" > Level</td>
                   <td width="100" > Plan Start </td>
                   <td width="100" > Plan End </td>
                   <td width="100" > Duration </td>
                   <td width="100" > Action </td>	   
                   </tr>
               </thead>
               <tbody>
				  <?php                        
						$result3 = mysqli_query($connection,"SELECT * FROM plan,level where plan.level_id = level.level_id  ");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                            echo '<td data-title="Plan">'.$row3['plan_name'].'</td>';
                            echo '<td data-title="Level">'.$row3['level_name'].'</td>';
                            echo '<td data-title="Plan start">'.$row3['plan_start_date'].'</td>';
                            echo '<td data-title="plan end">'.$row3['plan_end_date'].'</td>';
                            echo '<td data-title="Duration">'.$row3['plan_duration'].'</td>';
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editplan.php?id=' . $row3["plan_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=deleteplan.php?id=' . $row3["plan_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';    
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addplan">Add Plan</button>
<p>&nbsp;</p> 
    
    
<div id="no-more-tables">         
             <table class="col-md-12 table-bordered table-striped table-condensed cf" cellspacing="0">
				 <thead>
                 <tr>  
                   <td width="100" > Plan </td>
                   <td width="100" > Level </td>
                   <td width="100" > Chapter </td>
                   <td width="100" > Chapter Start </td>
                   <td width="100" > Chapter End </td>
                  <!-- <td width="100" > Duration </td>-->
                   <td width="100" > Action </td>	   
                   </tr>
               </thead>
               <tbody>
				  <?php                        
						$result3 = mysqli_query($connection,"SELECT * FROM plan_content,plan,chapter,level where plan.plan_id = plan_content.plan_id and chapter.chapter_id = plan_content.chapter_id and level.level_id = plan_content.level_id ");
						while($row3 = mysqli_fetch_array($result3))
							{
							echo '<tr>';
                            echo '<td data-title="Plan">'.$row3['plan_name'].'</td>';
                            echo '<td data-title="Level">'.$row3['level_name'].'</td>';
                            echo '<td data-title="Chapter">'.$row3['chapter_name'].'</td>';
                            echo '<td data-title="Chapter start">'.$row3['chapter_start_date'].'</td>';
                            echo '<td data-title="Chapter end">'.$row3['chapter_end_date'].'</td>';                            /*echo '<td data-title="Duration">'.$row3['chapter_duration'].'</td>';*/
                            echo '<td data-title="Action">'; 
				            echo'<a rel="facebox" href=editchplan.php?id=' . $row3["plan_cont_id"] . ' class="btn btn-primary btn-sm" ><i class="fa fa-pencil fa-lg" aria-hidden="true" ></i></a>';
				            echo '   ';
                            echo '<a rel="facebox" href=delchpplan.php?id=' . $row3["plan_cont_id"] .' class="btn btn-primary btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true" ></i></a>';    
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
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addchplan">Add Chapter</button>
<p>&nbsp;</p>
    
    
 
    
<!-- Add unit Modal -->
  <div class="modal fade" style="text-align:left" id="addchapter" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">

<form action="addchpexec.php" method="post" enctype="multipart/form-data" name="addchapter" onsubmit="return validatechptForm()">
Unit : <br />
<input class="selectadj" name="chapter_name"  type="text" class="ed" /><br />
Level : <br />
   <select class="selectadj" name="level_id" class="selectpicker" data-live-search="true"> 
    <option value="" >select</option> 
       <?php 
         $dd_res=mysqli_query($connection,"Select * from level");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
  
</select><br />
Duration : <br />
<input class="selectadj" name="chapter_duration"  type="number" onkeypress="return isNumberKey(event)"  min="1"/><br />    
    
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

<!-- Add plan Modal -->
  <div class="modal fade" style="text-align:left" id="addplan" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">

<form action="addplanex.php" method="post">
Plan name : <br />
<input class="selectadj" name="plan_name"  type="text"  /><br />

Level : <br />
<select class="selectadj" name="level_id" > 
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
    
Plan Start : <br />
<input class="selectadj" name="start_date"  value="<?php echo date("Y-m-d");?>" type="date"  /><br />
    
Plan End : <br />
<input class="selectadj" name="end_date"  type="date" /><br />

                 
                  
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
 <!-- Add chapter plan Modal -->
  <div class="modal fade" style="text-align:left" id="addchplan" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">

<form action="addchplanex.php" method="post">

Plan : <br />
<select class="selectadj" name="chplan_name" > 
    <option value="" >select</option> 
       <?php 
         $connection = mysqli_connect("localhost","root","","ats_db");
         $dd_res=mysqli_query($connection,"Select * from plan");
         while($r=mysqli_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] </option>";
         }
        ?>
</select><br />  

Level : <br />
   <select class="selectadj" name="student_level" id="level_chosen7"> 
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
   <select class="selectadj" name="chapter_id" id="chapters_has7"> 
    <option value="" >select</option> 
   </select> <br/>
    
    
    
Chapter Start : <br />
<input class="selectadj" name="ch_start_date"  type="date" class="ed" /><br />
 <!--   
Chapter End : <br />
<input class="selectadj" name="ch_end_date"  type="date" class="ed" /><br />
                      -->
                  
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

</body>



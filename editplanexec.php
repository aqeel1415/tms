<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>
<?php

if (isset($_POST['Save'])){
session_start();
  $connection = mysqli_connect("localhost","root","","ats_db");
   error_reporting(E_ALL ^ E_DEPRECATED);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }


    $plan_id = $_POST['planid'];
    $plan_name =$_POST['plan_name'];
/*    $student_level =$_POST['student_level'];*/
    $start_date =$_POST['plan_start'];
    $end_date =$_POST['plan_end'];
    $NoChptsAssigned = true;

    
/*    $start_date = date("Y-m-d", strtotime($start_date0));
    $end_date = date("Y-m-d", strtotime($end_date0));*/

    $datediff = strtotime($end_date) - strtotime($start_date);

    $duration = floor($datediff / (60 * 60 * 24));


            $result8 = mysqli_query($connection,"SELECT chapter_start_date,chapter_end_date FROM plan_content where  (chapter_start_date < '$start_date' OR chapter_end_date > '$end_date' ) and plan_id = '$plan_id'  ");
  
                $row8 = mysqli_num_rows($result8);
    
                echo '<div class="errorDiol">';
                if ($row8 > 0){ 
                 $NoChptsAssigned = false; 
                 echo '<br/>There are some chapters already assigned before or after the current dates, delete them or change their specified dates in order to set the new dates <br/>'; 
                }

    
                if($NoChptsAssigned){     
                mysqli_query($connection,"UPDATE plan SET plan_name='$plan_name',plan_start_date='$start_date',plan_end_date='$end_date' , plan_duration ='$duration' WHERE plan_id ='$plan_id'");
                echo '<script> location.replace("plan.php"); </script>';
                mysqli_close($connection);      
                }

                echo '</div>'; 
                echo '<form action="plan.php">';
                echo '<div class="buttons">';  
                echo '<p>&nbsp;</p>';
                echo '<input class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
                echo '<p>&nbsp;</p>';
                echo '</div>';
                echo '</form>';
    


 
 }


    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("plan.php"); </script>';
    exit();
    }
?> 
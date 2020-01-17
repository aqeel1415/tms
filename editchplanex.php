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


    $plancont_id = $_POST['chplanid'];
		
    $plan_name =$_POST['plan_name'];
    $start_date =$_POST['chapter_start'];
    //$end_date =$_POST['chapter_end'];    
    $chapter_id =$_POST['plan_chapter'];
    $level_id =$_POST['plan_level'];
    $NoConflict = true;
    $start = true;
    $end  = true; 
    
    $result6 = mysqli_query($connection,"SELECT chapter_duration FROM chapter where chapter_id = '$chapter_id' ");
    $chapterDur = mysqli_fetch_row($result6);
    
    $end_date = date('Y-m-d', strtotime($start_date. ' + '.$chapterDur[0].' days'));
    
    
/*    $datediff = strtotime($end_date) - strtotime($start_date);
    $duration = floor($datediff / (60 * 60 * 24)); */
    
    
/*
$start_date = date("Y-m-d", strtotime($start_date0));
$end_date = date("Y-m-d", strtotime($end_date0));
*/

    
       $result9 = mysqli_query($connection,"SELECT plan_id FROM plan_content where plan_cont_id = '$plancont_id'   ");
            while($row9 = mysqli_fetch_row($result9))
            { 
            $plan_id = $row9[0];
            }
    
           // to check conflicts of chapters
                $result8 = mysqli_query($connection,"SELECT chapter_start_date,chapter_end_date FROM plan_content where  ((chapter_start_date <= '$start_date' and chapter_end_date >= '$start_date') OR (chapter_start_date <= '$end_date' and chapter_end_date >= '$end_date') ) and plan_id = '$plan_id' and plan_cont_id != '$plancont_id'  ");
                $row8 = mysqli_num_rows($result8);
    
                echo '<div class="errorDiol">';
                if ($row8 > 0){ 
                 $NoConflict = false; 
                 echo '<br/>The chapter has a conflict with other chapter, choose another start or end date<br/>'; 
                }
                
				$result3 = mysqli_query($connection,"SELECT * FROM plan,level where plan.level_id = level.level_id and plan.plan_id = '$plan_id' ");
				while($row3 = mysqli_fetch_array($result3))
				{
                 if ( $start_date < $row3['plan_start_date']  ){
                 $start = false;
                  echo '<br/>The selected plan starts on '.$row3['plan_start_date'].', you cannot start a chapter before that date<br/>';   
                 }                 
                 if ( $end_date > $row3['plan_end_date'] ){
                  $end = false;   
                  echo '<br/>The selected plan ends on '.$row3['plan_end_date'].', you cannot end a chapter after that date<br/>';   
                 }                  
                }
                    
                if ( $end_date < $start_date ){
                  $end = false;
                  $start = false;
                  echo '<br/>Start and end dates are reversed<br/>';   
                 }
    
                if ($NoConflict && $start && $end ){
                 mysqli_query($connection,"UPDATE plan_content SET chapter_start_date='$start_date',chapter_end_date='$end_date' , chapter_duration = '$duration' WHERE plan_cont_id ='$plancont_id'");


                echo '<script> location.replace("plan.php"); </script>';
                mysqli_close($connection);                   
                }
                

                echo '</div>'; 
                echo '<form action="plan.php">';
                echo '<div class="buttons">';  
                echo '<p>&nbsp;</p>';
                echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
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
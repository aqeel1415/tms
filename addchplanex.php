<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

		
    $plan_id =$_POST['chplan_name'];
    $level_id =$_POST['student_level'];
    $chapter_id =$_POST['chapter_id'];
    $result6 = mysqli_query($connection,"SELECT chapter_duration FROM chapter where chapter_id = '$chapter_id' ");
    $chapterDur = mysqli_fetch_row($result6);


    $start_date =$_POST['ch_start_date'];

    $end_date = date('Y-m-d', strtotime($_POST['ch_start_date']. ' + '.$chapterDur[0].' days'));
    

    $start = true;
    $end = true;
    $level = true;
    $chapter = true;
    $NoConflict = true;

/*    $datediff = strtotime($end_date) - strtotime($start_date);
    $duration = floor($datediff / (60 * 60 * 24));  */


                // to check if chapter already exists
                $result7 = mysqli_query($connection,"SELECT * FROM plan_content where plan_id = '$plan_id' and level_id='$level_id' and chapter_id ='$chapter_id' ");
                $row7 = mysqli_num_rows($result7);

                // to check conflicts of chapters
                $result8 = mysqli_query($connection,"SELECT chapter_start_date,chapter_end_date FROM plan_content where  ((chapter_start_date <= '$start_date' and chapter_end_date >= '$start_date') OR (chapter_start_date <= '$end_date' and chapter_end_date >= '$end_date') ) and plan_id = '$plan_id'   ");
                $row8 = mysqli_num_rows($result8);

			    echo '<div class="errorDiol">';                  
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
                    
                    
                 if ( $end_date < $start_date ){
                  $end = false;
                  $start = false;
                  echo '<br/>Start and end dates are reversed<br/>';   
                 }
                   
                    
                if ( $level_id  != $row3['level_id'] ){
                  $level = false;   
                  echo '<br/>The selected plan is of level '.$row3['level_name'].', you cannot assign a chapter with different level<br/>';   
                 }     
                    
               
                if ($row7 > 0){ 
                 $chapter = false; 
                  echo '<br/>The chapter is already added to this plan<br/>'; 
                }
                                  
                if ($row8 > 0){ 
                 $NoConflict = false; 
                 echo '<br/>The chapter has a conflict with other chapter, choose another start or end date<br/>'; 
                }
                    
                    
                 if ($start && $end && $level && $chapter && $NoConflict) {
                 mysqli_query($connection,"INSERT INTO plan_content( plan_id, level_id, chapter_id , chapter_start_date , chapter_end_date  )
                 VALUES ( '$plan_id' , '$level_id' , '$chapter_id', '$start_date' , '$end_date' )" );
                 echo '<script> location.replace("plan.php"); </script>';
			     exit();     
                 }   
                     
				} 

                echo '</div>'; 
                echo '<form action="plan.php">';
                echo '<div class="buttons">';  
                echo '<p>&nbsp;</p>';
                echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
                echo '<p>&nbsp;</p>';
                echo '</div>';
                echo '</form>';

			
			



?>

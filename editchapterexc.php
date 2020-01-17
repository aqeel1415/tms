<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php

 /*if (isset($_POST['Save'])){*/
    session_start();
   $connection = mysqli_connect("localhost","root","","ats_db");
   error_reporting(E_ALL ^ E_DEPRECATED);
    if (!$connection)
      {
      die('Could not connect: ' . mysql_error());
      }

    
    $chapterID = $_POST['chapter_id'];
    $chaptername = $_POST['chapter_name'];
    $level_id = $_POST['level_id'];
    $chapter_dur = $_POST['chapter_duration'];

    $chpNotInplns = true;
     
    echo '<div class="errorDiol">';
     // to check if chapter already added in some plans so that cannot change the level of it
    $result7 = mysqli_query($connection,"SELECT * FROM plan_content where chapter_id='$chapterID' ");
    $row7 = mysqli_num_rows($result7);   
     
        if ($row7 > 0){
        $chpNotInplns = false;
         echo '<br/>The chapter is assigned in some plans, you need to delete it from the plans in order to change its details<br/>';
        }
  
    if ($chpNotInplns){
    mysqli_query($connection,"UPDATE chapter SET chapter_name='$chaptername'  , level_id='$level_id'  , chapter_duration='$chapter_dur' WHERE chapter_id='$chapterID' ");
    echo '<script> location.replace("settings.php"); </script>';
    mysqli_close($connection);
    }
    

        echo '</div>'; 
        echo '<form action="settings.php">';
        echo '<div class="buttons">';  
        echo '<p>&nbsp;</p>';
        echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
        echo '<p>&nbsp;</p>';
        echo '</div>';
        echo '</form>';




    if (isset($_POST['Cancel']))
    {
    include 'plans_updator.php';
    echo '<script> location.replace("settings.php"); </script>';
    exit();
    }

?> 
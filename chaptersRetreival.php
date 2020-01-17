
<?php

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);
    
    $levelid = $_POST['level'];

    $dd_res=mysqli_query($connection,"Select * from chapter where level_id='$levelid'  ");
         while($r=mysqli_fetch_row($dd_res))
         { 
        echo "<option value='$r[0]'> $r[1] </option>";
         }
?>
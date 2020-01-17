
<?php
$connection = mysqli_connect("localhost","root","","ats_db");

    
    $unitid = $_POST['location'];

    $dd_res=mysqli_query($connection,"Select * from location where unit_id='$unitid'  ");
         while($r=mysqli_fetch_row($dd_res))
         { 
        echo "<option value='$r[0]'> $r[1] </option>";
         }
   



?>
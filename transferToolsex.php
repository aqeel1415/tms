<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>

<?php 
if (isset($_POST['Save'])){
    
    
    $connection = mysqli_connect("localhost","root","","ats_db");
    error_reporting(E_ALL ^ E_DEPRECATED);
    
    $tool_id =$_POST['tool_id'];
    $unit_id =$_POST['tool_unit'];
    $tool_locid =$_POST['tool_location'];
    $unit_id2 =$_POST['tool_unit2'];
    $tool_locid2 =$_POST['tool_location2'];
    $tool_qty =$_POST['tool_quantity'];


        //check if the tool is existed in the the first location
            $result5 = mysqli_query($connection,"SELECT * FROM locationtools where unit_id='$unit_id' and location_id='$tool_locid' and tool_id='$tool_id' ");
            $row4 = mysqli_num_rows($result5);
        if ($row4 > 0){
            $row5 = mysqli_fetch_assoc($result5);
            $curQty = $row5['qty'];
            $newQty = $curQty - $tool_qty;

        if ($newQty >= 0){
                //deduct from the first location
                mysqli_query($connection,"UPDATE locationtools SET qty='$newQty' where unit_id='$unit_id' and location_id='$tool_locid' and tool_id='$tool_id' ");
            
                //check if the tool is existed in the the choosen location
                $result6 = mysqli_query($connection,"SELECT * FROM locationtools where unit_id='$unit_id2' and location_id='$tool_locid2' and tool_id='$tool_id' ");   
                $row6 = mysqli_num_rows($result6);
                if ($row6 > 0){
                    $row7 = mysqli_fetch_assoc($result6);
                    $curdQty = $row7['qty'];
                    $newdQty = $curdQty + $tool_qty; 
                    // increase quantity in the second location 
                    mysqli_query($connection,"UPDATE locationtools SET qty='$newdQty' where unit_id='$unit_id2' and location_id='$tool_locid2' and tool_id='$tool_id' ");

                }
                
                else {
                 mysqli_query($connection,"INSERT INTO locationtools ( unit_id  , location_id , tool_id , qty)
                 VALUES ( '$unit_id2' , '$tool_locid2' , '$tool_id' , '$tool_qty')");


            }
          }
        if ($newQty == 0){
            mysqli_query($connection,"DELETE FROM locationtools WHERE unit_id='$unit_id' and location_id='$tool_locid' and tool_id='$tool_id'");

        }
                include 'quantity_recalculator.php';
                include 'check_sufficiency.php';
                echo '<script> location.replace("tools.php"); </script>'; 
                exit();   
      }
        else {
            
            
            echo '<form action="tools.php">';
            echo '<div class="errorDiol">';  
            echo '<p>&nbsp;</p>';
            echo 'There are no enough tools to move  <br/>';  
            echo '<p>&nbsp;</p>';
            echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
            echo '<p>&nbsp;</p>';
            echo '</div>';
            echo '</form>';
        }


}



    if (isset($_POST['Cancel']))
    {
    echo '<script> location.replace("tools.php"); </script>';
    exit();
    }		
?> 

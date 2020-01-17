                            
<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);


    $result1 = mysqli_query($connection,"SELECT tool_id from tool");
    while($row1 = mysqli_fetch_assoc($result1))
    {   
            $tool_id = $row1['tool_id'];
            //calculating the quantity from all locations
            $result3 = mysqli_query($connection,"SELECT SUM(qty) FROM locationtools WHERE tool_id ='$tool_id' ");
            $row3 = mysqli_fetch_array($result3);
            $updatedQty = $row3['SUM(qty)'];
            mysqli_query($connection,"UPDATE tool SET tool_quantity='$updatedQty'  WHERE tool_id='$tool_id' ");
    }
?>
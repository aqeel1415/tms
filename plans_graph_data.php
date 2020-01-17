<?php
$connection = mysqli_connect("localhost","root","","ats_db");

$result7 = mysqli_query($connection,"SELECT * FROM plan_content ");  

$data = array(); 

    while($row= mysqli_fetch_assoc($result7)){
     $data[] = array(
         "plan_id"=>$row["plan_id"], 
         "chapter_id"=>$row["chapter_id"], 
         "start_date"=>$row["chapter_start_date"], 
         "end_date"=>$row["chapter_end_date"]
     ); 
        
     $post_data = json_encode(array('data' => $data), JSON_FORCE_OBJECT);   
     //$post_data = json_encode(array('max' => 46, 'data' => $data));
    }
    echo $post_data;



?>
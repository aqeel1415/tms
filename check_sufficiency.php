
<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

    //$students_num =$_POST['students_num'];

    $countArr = array();
    // to cacluate how many students in each chapter + save it in an array
                                               
    $result3 = mysqli_query($connection,"SELECT count(chapter_id) as counts,chapter_id FROM student GROUP BY chapter_id");
    while($row3 = mysqli_fetch_assoc($result3))
    {
        $countArr[] = $row3;
    }
   // echo "done <br/>"; 
    //print_r($countArr); // show all array data


   $update = mysqli_query($connection,"UPDATE totalqtyneed SET total_quantity ='0' ");
   $result4 = mysqli_query($connection,"SELECT * FROM chaptertools");
    while($row4 = mysqli_fetch_assoc($result4))
    {
        foreach ($countArr as $item){

        if ($row4['chapter_id'] == $item['chapter_id']){
        $numStuPerChp = $item['counts'];
        $needQtyPerStu = $row4['req_qty'];
      //  echo $item['chapter_id'].' is '.$item['counts'].'<br/>'; 
        $chp = $row4['chapter_id'];
        $asgntool_id = $row4['tool_id'];
       
       $neededTools = $numStuPerChp*$needQtyPerStu;
            
       
            
       $update = mysqli_query($connection,"UPDATE totalqtyneed SET total_quantity ='$neededTools'
        where tool_id='$asgntool_id' and chapter_id='$chp' "); 
            
       $result5 = mysqli_query($connection,"SELECT * FROM tool where tool_id = '$asgntool_id' ");
        while($row5 = mysqli_fetch_assoc($result5))  
        {   
        $curQty = $row5['tool_quantity'];
        $result6 =  mysqli_query($connection,"SELECT tool_id,Sum(total_quantity) AS tot_qty FROM totalqtyneed  where tool_id = '$asgntool_id' GROUP BY tool_id");
        $row6 = mysqli_fetch_assoc($result6);
        $tneededTools = $row6['tot_qty'];

            
            if ($tneededTools > $curQty){
            $toolmessing = $tneededTools - $curQty;

            $result7 = mysqli_query($connection,"SELECT * FROM toolsneeded where tool_id='$asgntool_id' ");
            $row7 = mysqli_num_rows($result7);
                
            // needed before ,so increase the needed quantity
            if ($row7 > 0){ 
                        $row7 = mysqli_fetch_assoc($result7);
/*                        $preNeedQnty = $row7['needed_quantity'];
                        $newQnty = $toolmessing + $preNeedQnty;*/   
                         mysqli_query($connection,"UPDATE toolsneeded SET needed_quantity='$toolmessing' where tool_id='$asgntool_id' ");  
                     
                }
                    //first time needed quantity
             else { 
                $update = mysqli_query($connection,"INSERT INTO toolsneeded ( tool_id , needed_quantity )
                VALUES ( '$asgntool_id' , '$toolmessing')");  
                }
                
               }
            // there are enough tools so deleted the previous required ones 
            else {  
            $update = mysqli_query($connection,"DELETE FROM toolsneeded WHERE tool_id='$asgntool_id'");    
            }
        
        }

         } 
        }
        
      }
    

?>



         




    
			
    
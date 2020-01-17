
<?php

        if (isset($_POST['yes']))
	     {	 

            $connection = mysqli_connect("localhost","root","","ats_db");
            error_reporting(E_ALL ^ E_DEPRECATED);
                if (!$connection){die('Could not connect: ' . mysql_error());}
                
               $inv_id= $_POST['inv_id'];
               /* $result = mysqli_query($connection,"SELECT * FROM toolloan where toolloan_id = '$inv_id' ");
                $row = mysqli_fetch_assoc($result);*/
                $tool_id = $_POST['tool_id'];
                $quantity = $_POST['qty_loan'];
                $teacher_id = $_POST['teacher_id'];
                $unit_id = $_POST['unit_id'];
                $location_id = $_POST['location_id'];

                //make it the return item 'Checked' and register the return date
                date_default_timezone_set("Asia/Riyadh");
                $currentDate = date('Y-m-d H:i:sa');
				mysqli_query($connection,"UPDATE toolloan SET status='Returned', time_return = '$currentDate' where toolloan_id = '$inv_id' ");
            
                 //increase the origin tool quantity  
                $result = mysqli_query($connection,"SELECT tool_name,tool_type FROM tool where tool_id = '$tool_id' ");
                $row = mysqli_fetch_assoc($result);
                $tool_name = $row['tool_name'];
                $tool_type = $row['tool_type']; //to increase the teacher loan according to tool type
            
            
                // just update the quantity of the tool if already exists in the location
                $result6 = mysqli_query($connection,"SELECT qty FROM locationtools where tool_id = '$tool_id' and unit_id='$unit_id' and location_id='$location_id'");   
                $row6 = mysqli_num_rows($result6);
                if ($row6 > 0){
                $row1 = mysqli_fetch_assoc($result6);          
                $curQty = $row1['qty'];
                $newQty = ($curQty + $quantity);    
                mysqli_query($connection,"UPDATE locationtools SET qty='$newQty' where tool_id = '$tool_id' and unit_id='$unit_id' and location_id='$location_id' ");   
                }
            
            
                //if the tool does not exist in the location
                else { 
                 mysqli_query($connection,"INSERT INTO locationtools ( unit_id  , location_id , tool_id , qty)
                 VALUES ( '$unit_id' , '$location_id' , '$tool_id' , '$quantity')");
                }


                //get teacher's email to send the received items 
                $result4 = mysqli_query($connection,"SELECT * FROM teacher where teacher_id='$teacher_id' ");						
                $row4 = mysqli_fetch_array($result4);
                $teacher_name = $row4['teacher_name'];
                $email = $row4['teacher_email'];
                $curcLoan = $row4['cons_loan'];
                $curnLoan = $row4['noncons_loan'];
            
            
            
                //increase the teacher loan related loan
                if ($tool_type == 'Consumable'){
                $newcLoan = $curcLoan - $quantity;
                 if($newcLoan >= 0){
                 mysqli_query($connection,"UPDATE teacher SET cons_loan='$newcLoan'  where teacher_id='$teacher_id' ");   
                  }
                 }
                if ($tool_type == 'NonConsumable'){
                $newnLoan = $curnLoan - $quantity; 
                 if($newnLoan >= 0){
                 mysqli_query($connection,"UPDATE teacher SET noncons_loan='$newnLoan'  where teacher_id='$teacher_id' "); 
                 }
                }

                $subject = "Received items notification";
                $message ="
                <html>
                <head>
                   <title>HTML email</title>
                </head>
                <body>
                  <p>Mr. $teacher_name , this is a notification that the listed items are received </p>
                  <table>
                    <tr>
                     <th>Tool name</th>
                     <th>Quantity</th>
                    </tr>
                    <tr>                     
                      <td>$tool_name</td>
                      <td>$quantity</td>
                    </tr>
                  </table>
                  <p>
                  ____________________________________<br><br>
                  Tools Inventory Officer<br>
                  Saudi Petroleum Services Polytechnic
                  </p>
                </body>
                </html>";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <poster@ats.com>' . "\r\n";
                $headers .= 'Cc: '.$email.''. "\r\n";
                
                include 'quantity_recalculator.php';
                include 'check_sufficiency.php';
                mail($email,$subject,$message,$headers);
                echo '<script> location.replace("index.php"); </script>';  
            }



    if (isset($_POST['no']))
	       {
			
			echo '<script> location.replace("index.php"); </script>';
			exit();
		
			}

?>
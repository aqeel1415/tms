<?php  

     $connection = mysqli_connect("localhost","root","","ats_db");
     error_reporting(E_ALL ^ E_DEPRECATED);


//reminders for todday's only
$currentDay = date('Y-m-d');

            $result = mysqli_query($connection,"SELECT toolloan_id,teacher_email,tool_name,tool_type,teacher_name,qty_loan,status,time_loan FROM toolloan LEFT JOIN tool ON  tool.tool_id = toolloan.tool_id LEFT JOIN teacher ON teacher.teacher_id = toolloan.teacher_id where tool.tool_type ='NonConsumable' and toolloan.status='Unreturned' and
            toolloan.time_loan > '$currentDay' ORDER BY toolloan.toolloan_id;");

            while($row = mysqli_fetch_assoc($result))
            {
                $email = $row['teacher_email'];
                $teacher_name = $row['teacher_name'];
                $tool_name = $row['tool_name'];
                $quantity = $row['qty_loan'];
                
                $subject = "Returning tools reminder";
                $message ="
                <html>
                <head>
                   <title>HTML email</title>
                </head>
                <body>
                  <p>Mr. $teacher_name , this is a notification to remind you to return the tools you loaned today </p>
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
                
                mail($email,$subject,$message,$headers);
                
            }
    echo '<script> location.replace("index.php"); </script>';


?>



         




    
			
    
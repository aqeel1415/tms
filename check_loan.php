<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>


<?php 
                $connection = mysqli_connect("localhost","root","","ats_db");
                error_reporting(E_ALL ^ E_DEPRECATED);
                if (!$connection){die('Could not connect: ' . mysql_error());}
                

				$result3 = mysqli_query($connection,"SELECT * FROM teacher");
                $NoConsRech = true;
                $NoNonConsRech = true;
                echo '<form action="index.php">';
                echo '<div class="senderNoti">'; 
				while($info = mysqli_fetch_array($result3))
				{
                $cloan = $info['cons_loan'];
                $nloan = $info['noncons_loan'];
                $cl_limit = $info['cons_loan_limit'];	
                $nl_limit = $info['noncons_loan_limit'];
                $email = $info['teacher_email'];
                $name = $info['teacher_name'];
               
                    
                $orderDifference0 = $cl_limit - $cloan;    
                if ($orderDifference0 <=  10){
                $NoConsRech = false;
                $subject = "Warning!!, You've almost reached the consumable tools order limit";
                $message ="
                <html>
                <head>
                   <title>HTML email</title>
                </head>
                <body>
                  <p>Mr. $name , this is a warning that you almost reached the consumable tools order limit , please return the previous taken tools as soon as possible , for more information contact the tools inventory officer </p>
                  <table>
                    <tr>
                     <th>Your consumable order</th>
                     <th>Consumable allowed limit</th>
                    </tr>
                    <tr>                     
                      <td>$cloan</td>
                      <td>$cl_limit</td>
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
                $headers .= 'Cc: '.$email.'' . "\r\n";

                mail($email,$subject,$message,$headers);
                echo 'Email about reaching the consumable tools order is sent to '.$name.'<br/>';
                }

                $orderDifference1 = $nl_limit - $nloan;    
                if ($orderDifference1 <=  10){
                $NoNonConsRech = false;
                $subject = "Warning!!, You've almost reached the non-consumable tools order limit";
                $message ="
                <html>
                <head>
                   <title>HTML email</title>
                </head>
                <body>
                  <p>Mr. $name , this is a warning that you almost reached the non-consumable tools order limit , please return the previous taken tools as soon as possible , for more information contact the tools inventory officer </p>
                  <table>
                    <tr>
                     <th>Your non-consumable order</th>
                     <th>Non-consumable allowed limit</th>
                    </tr>
                    <tr>                     
                      <td>$nloan</td>
                      <td>$nl_limit</td>
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
                $headers .= 'Cc: '.$email.'' . "\r\n";

                mail($email,$subject,$message,$headers);
                echo 'Email about reaching the is non-consumable tools order sent to '.$name.'<br/>';
                }
                   
                }

            if(($NoConsRech && $NoConsRech) === true){
                 echo "No one does reach any order limit <br/>";   
                }

            else{
                if ($NoConsRech === true){
                 echo "No one does reach any consumable order limit <br/>";    
                }
                if($NoNonConsRech === true){
                 echo "No one does reach any non-consumable order limit <br/>";    
                } 
            }
                
 
                echo '<p>&nbsp;</p>';
                echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
                echo '<p>&nbsp;</p>';
                echo '</div>';
                echo '</form>';

			  ?>                          



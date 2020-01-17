<?php 
                $connection = mysqli_connect("localhost","root","","ats_db");
                error_reporting(E_ALL ^ E_DEPRECATED);
                if (!$connection){die('Could not connect: ' . mysql_error());}
                

				$result3 = mysqli_query($connection,"SELECT * FROM toolloan where toolloan_id='12' ");


				while($info = mysqli_fetch_array($result3))
				{
                $currentDate = date('Y-m-d H:i:sa');  
                echo $currentDate; 
                $date = $info['time_return'];
                } 
                if($date < $currentDate){
                 mysqli_query($connection,"UPDATE toolloan SET time_return='$currentDate'  WHERE toolloan_id='12' ");
                }

			  ?>                          



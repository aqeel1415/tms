<?php
				  if (isset($_GET['id']))
	{
			$connection = mysqli_connect("localhost","root","","ats_db");
			if (!$connection)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("argie_tamera", $connection);
			$messages_id = $_GET['id'];
                                                                 $result3 = mysqli_query($connection,"SELECT * FROM reservation where reservation_id ='$messages_id'");
								
								
								while($row3 = mysqli_fetch_array($result3))
								  {
$res=$row3['confirmation'];
                                                                   }
			$update1=mysqli_query($connection,"UPDATE reservation SET status ='out' WHERE reservation_id ='$messages_id'");
                        $update2=mysqli_query($connection,"UPDATE roominventory SET status ='out' WHERE confirmation = '$res'");
header("location: index.php#1");
			
			exit();
			
			mysqli_close($connection);
			}
			?>
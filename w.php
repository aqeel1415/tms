<?php
ignore_user_abort(true);//if caller closes the connection (if initiating with cURL from another PHP, this allows you to end the calling PHP script without ending this one)
set_time_limit(0);

$hLock=fopen(__FILE__.".lock", "w+");
if(!flock($hLock, LOCK_EX | LOCK_NB))
    die("Already running. Exiting...");
                
while(true)
{

                
$connection = mysqli_connect("localhost","root","","ats_db");
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

    usleep(2000000);//0.002 seconds
}

flock($hLock, LOCK_UN);
fclose($hLock);
unlink(__FILE__.".lock");
?>
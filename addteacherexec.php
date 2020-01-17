<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

    $teacher_name  =$_POST['teacher_name'];        
    $teacher_phone =$_POST['teacher_phone'];
    $teacher_email =$_POST['teacher_email'];

				    $result6 = mysqli_query($connection,"
                    SELECT cons_loan_limit, COUNT(*) AS magnitude 
                    FROM teacher 
                    GROUP BY cons_loan_limit 
                    ORDER BY magnitude DESC
                    LIMIT 1");
				    $row6 = mysqli_fetch_array($result6);
                    $teacher_cloan_limit = $row6[0];  
				    $result7 = mysqli_query($connection,"
                    SELECT noncons_loan_limit, COUNT(*) AS magnitude 
                    FROM teacher 
                    GROUP BY noncons_loan_limit 
                    ORDER BY magnitude DESC
                    LIMIT 1");
				    $row7 = mysqli_fetch_array($result7);
                    $teacher_nloan_limit =$row7[0];

    $teacher_cloan ='0';
    $teacher_nloan ='0';

  
        
    mysqli_query($connection,"INSERT INTO teacher (teacher_name , teacher_phone , teacher_email ,  cons_loan ,	cons_loan_limit ,	noncons_loan ,	noncons_loan_limit )
    VALUES ( '$teacher_name' , '$teacher_phone' , '$teacher_email'  , '$teacher_cloan' , '$teacher_cloan_limit' , '$teacher_nloan' , '$teacher_nloan_limit')" );


    echo '<script> location.replace("teacher.php"); </script>';
    exit();

?>

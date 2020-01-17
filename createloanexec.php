
<link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/main.css"/>



<?php

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);



    $unit_id =$_POST['tool_unit'];
    $teacher_id =$_POST['teacher_id'];
    $student_id =$_POST['student_id'];
    date_default_timezone_set("Asia/Riyadh");
    $currentDate = date('Y-m-d H:i:sa');   //current time of the loan
    $tool_qty =$_POST['tool_quantity'];
    $tool_id = $_POST['tool_id'];
    $status = "Unreturned";
    $tool_locid =$_POST['tool_location'];




    //get the quantity from the location
    $result = mysqli_query($connection,"SELECT qty,tool_type FROM locationtools,tool where locationtools.unit_id ='$unit_id' and	locationtools.location_id='$tool_locid' and locationtools.tool_id=tool.tool_id and tool.tool_id = '$tool_id' ");

    $row1 = mysqli_num_rows($result);


if ($row1 > 0){
    $row = mysqli_fetch_assoc($result);
    $curQty = $row['qty'];
    $tool_type = $row['tool_type'];

    $result1 = mysqli_query($connection,"SELECT * FROM teacher where teacher_id = '$teacher_id' ");
    $row1 = mysqli_fetch_assoc($result1);
    $curcLoan = $row1['cons_loan'];
    $curnLoan = $row1['noncons_loan'];
    $cloanLimit = $row1['cons_loan_limit'];
    $nloanLimit = $row1['noncons_loan_limit'];

    

    //deacresing tool quantity formula
    $newQty = ($curQty - $tool_qty) ;

    //increasing the teacher loan formula
    $newcloan = ($curcLoan + $tool_qty);
    $newnloan = ($curnLoan + $tool_qty);

    $qtyPassed = false;
    $cLoanPassed = false;
    $nLoanPassed = false;
    $connectionsType = "Consumable";
    $nconsType = "NonConsumable";


    //this if-stm to garantee tools quantity will not be zero 
    if ($newQty >= 0){
    $qtyPassed = true;
    }
    else {
        echo '<div class="buttons">';
        echo "<br/>No enough quantity in the selected location<br/>" ;
        echo '</div>';  
    }
    
    //this is to delete the tool from its location if it has 0 quantity
    if ($newQty == 0){
       mysqli_query($connection,"DELETE FROM locationtools WHERE unit_id='$unit_id' and location_id='$tool_locid' and tool_id='$tool_id'");

    }
   
    //consumable or nonconsumable
    if (strcmp($connectionsType , $tool_type) == 0){
        if ($newcloan <= $cloanLimit ){
        $cLoanPassed = true;
        }
       else {
            echo '<div class="errorDiol">';
            echo "<br/>This teacher cannot make a loan as he reached the allowed consuamble tools limit<br/>";
            echo '</div>';  
      }   
    }

 


    if (strcmp($nconsType , $tool_type) == 0){
        if ($newNloan <= $nloanLimit){
        $nLoanPassed = true;
        }
        else {
            echo '<div class="errorDiol">';
            echo "<br/>This teacher cannot make a loan as he reached the allowed nonconsuamble tools limit<br/>";
            echo '</div>';   
        } 
    } 	 



    if(($qtyPassed and ( $cLoanPassed or $nLoanPassed)) === true){
        
        //without student
        if($student_id == null){
        mysqli_query($connection,"INSERT INTO toolloan ( teacher_id , unit_id,location_id, time_loan , tool_id , qty_loan , status )
        VALUES ('$teacher_id' , '$unit_id' , '$tool_locid' , '$currentDate' , '$tool_id' , '$tool_qty' ,'$status')");     
        }
        //with student
        else {
        mysqli_query($connection,"INSERT INTO toolloan ( teacher_id , student_id ,unit_id,location_id, time_loan , tool_id , qty_loan , status )
        VALUES ('$teacher_id' , '$student_id' , '$unit_id' , '$tool_locid' , '$currentDate' , '$tool_id' , '$tool_qty' ,'$status')");     
      
         }  

        
    //update tool quantity of the location   
    mysqli_query($connection,"UPDATE locationtools SET qty ='$newQty'  WHERE  unit_id ='$unit_id' and location_id='$tool_locid' and tool_id ='$tool_id'"); 
        
    //update teacher loan  
    if ($cLoanPassed === true){
    mysqli_query($connection,"UPDATE teacher SET cons_loan ='$newcloan'  WHERE teacher_id = '$teacher_id' ");
    include 'quantity_recalculator.php';
    include 'check_sufficiency.php';
    echo '<script> location.replace("index.php"); </script>';
    exit(); 
    } 

   
    if ($nLoanPassed === true){
    mysqli_query($connection,"UPDATE teacher SET noncons_loan ='$newnloan'  WHERE teacher_id = '$teacher_id' ");
    include 'quantity_recalculator.php';
    include 'check_sufficiency.php';
    echo '<script> location.replace("index.php"); </script>';
    exit();  
    }
     

 }
}

    else{
        echo '<div class="errorDiol">';
        echo "<br/>The tool does not exist in the selected location <br/>" ;
        echo '</div>';    
    }
    echo '<form action="index.php">';
    echo '<div class="buttons">';  
    echo '<p>&nbsp;</p>';
    echo '<input  class="btn btn-default" data-toggle="modal" type="submit" value="Return" />';
    echo '<p>&nbsp;</p>';
    echo '</div>';
    echo '</form>';
    

    //include 'return_tool_reminder_pro.php';
?>

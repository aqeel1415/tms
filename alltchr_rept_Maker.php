<?php 

$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);


        $connectiontent = $_POST['tchr_rpt_cont'];
        $loans = false;
        $toolloans = false;
        $units = false;
        $tools = false;


    
       foreach ($connectiontent as $value) {
            if(strcmp($value, 'loans') == 0){
             $loans = true;
            }
            if(strcmp($value, 'toolloans') == 0){
             $toolloans = true;
            }
            if(strcmp($value, 'units') == 0){
             $units = true;
            }
            if(strcmp($value, 'tools') == 0){
             $tools = true;
            }
           
        }


            require('fpdf.php');
            require('tchr_rep_form.php');
            $pdf = new tchr_rep_form();

             
        $result0 = mysqli_query($connection,"SELECT * FROM teacher ");
        while($row0 = mysqli_fetch_array($result0))
             {   
            $pdf->AddPage();
            $pdf->SetFont('Helvetica','',10);     
            $teacher_id = $row0['teacher_id'];    
            $result3 = mysqli_query($connection,"SELECT * FROM teacher where teacher_id = '$teacher_id' ");			
            $pdf->Ln();
              $pdf->Cell(50,5,"Name");
              $pdf->Cell(10,5,"ID");
              $pdf->Cell(40,5,"Phone");
              $pdf->Cell(50,5,"Email");
              $pdf->Ln();
            
              $row3 = mysqli_fetch_array($result3);
             	 	  	 	 
              $pdf->Cell(50,5,$row0['teacher_name']);
              $pdf->Cell(10,5,$row0['teacher_id']);
              $pdf->Cell(40,5,$row0['teacher_phone']);
              $pdf->Cell(50,5,$row0['teacher_email']);
              $pdf->Ln();
            

    if ($loans === true){
        $result4 = mysqli_query($connection,"SELECT * FROM teacher where teacher_id = '$teacher_id' ");
        $pdf->Cell(40,10,'Order information');
            $pdf->Ln();
              $pdf->Cell(40,5,"Consumable Order",1);
              $pdf->Cell(40,5,"Consumable Order Limit",1);
              $pdf->Cell(50,5,"Nonconsumable Order",1);
              $pdf->Cell(50,5,"Nonconsumable Order Limit",1);
              $pdf->Ln();
        
              $row4 = mysqli_fetch_array($result4);
              	 	  	 	 
              $pdf->Cell(40,5,$row4['cons_loan'],1);            
              $pdf->Cell(40,5,$row4['cons_loan_limit'],1);
              $pdf->Cell(50,5,$row4['noncons_loan'],1);            
              $pdf->Cell(50,5,$row4['noncons_loan_limit'],1);
              $pdf->Ln();
             
    }


    if ($toolloans === true){
            $result5 = mysqli_query($connection,"SELECT toolloan_id,tool_name,tool_type,teacher_name,student_name,unit_name,location_name,time_loan,time_return,qty_loan,qty_loan,status FROM toolloan LEFT JOIN tool ON  tool.tool_id = toolloan.tool_id LEFT JOIN teacher ON teacher.teacher_id = toolloan.teacher_id LEFT JOIN unit ON toolloan.unit_id = unit.unit_id LEFT JOIN location ON toolloan.location_id = location.location_id LEFT JOIN student ON student.student_id = toolloan.student_id WHERE toolloan.teacher_id = '$teacher_id' ORDER BY toolloan.toolloan_id; ");
              $pdf->Cell(40,10,'Tools Orders details');
              $pdf->Ln();
              $pdf->Cell(10,5,"ID",1);
              $pdf->Cell(50,5,"Tool name",1);
              $pdf->Cell(10,5,"Qty",1);
              $pdf->Cell(25,5,"Student Took",1);
              $pdf->Cell(40,5,"Time Ordered",1);
              $pdf->Cell(40,5,"Time Returned",1);
              $pdf->Cell(20,5,"Status",1); 
              $pdf->Ln();
        
              $row5 = mysqli_fetch_array($result5);
              $pdf->Cell(10,5,$row5['toolloan_id'],1);
              $pdf->Cell(50,5,$row5['tool_name'],1);
              $pdf->Cell(10,5,$row5['qty_loan'],1);
              $pdf->Cell(25,5,$row5['student_name'],1);
              $pdf->Cell(40,5,$row5['time_loan'],1);            
              $pdf->Cell(40,5,$row5['time_return'],1);
              $pdf->Cell(20,5,$row5['status'],1);            
              $pdf->Ln();
            
    }


    if ($units === true){
            $result6 = mysqli_query($connection,"SELECT unit_name,location_name FROM location,unit where location.unit_id=unit.unit_id and location.teacher_id = '$teacher_id' ");
            $pdf->Cell(40,10,'Units assgined');
              $pdf->Ln();
              $pdf->Cell(40,5,"Unit",1);
              $pdf->Cell(40,5,"Location",1); 
              $pdf->Ln();
        
              $row6 = mysqli_fetch_array($result6); 
        
              $pdf->Cell(40,5,$row6['unit_name'],1);
              $pdf->Cell(40,5,$row6['location_name'],1);           
              $pdf->Ln();
            
    }

    if ($tools === true){
            $result6 = mysqli_query($connection,"SELECT tool_name,unit_name,location_name,qty FROM tool,locationtools,unit,location where tool.tool_id = locationtools.tool_id and unit.unit_id = locationtools.unit_id and location.location_id =locationtools.location_id and location.teacher_id = '$teacher_id' ");
            $pdf->Cell(40,10,'Tools assgined');
              $pdf->Ln();
              $pdf->Cell(50,5,"Tool name",1);
              $pdf->Cell(40,5,"Tool unit",1); 
              $pdf->Cell(40,5,"Tool location",1);
              $pdf->Cell(40,5,"Quantity",1); 
              $pdf->Ln();
        
              $row6 = mysqli_fetch_array($result6);
              	 	  	 	 
              $pdf->Cell(50,5,$row6['tool_name'],1);
              $pdf->Cell(40,5,$row6['unit_name'],1); 
              $pdf->Cell(40,5,$row6['location_name'],1);
              $pdf->Cell(40,5,$row6['qty'],1); 
              $pdf->Ln();
    }
  }
            $pdf->Output(); 





?>
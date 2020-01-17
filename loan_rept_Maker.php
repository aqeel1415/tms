<?php 
$connection = mysqli_connect("localhost","root","","ats_db");
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_GET['id']))
	{
	    $toolloan_id = $_GET['id'];
            require('fpdf.php');
            require('loan_rep_form.php');
            $pdf = new loan_rep_form();
            $pdf->AddPage();
            $pdf->SetFont('Helvetica','',10);
    
            $result5 = mysqli_query($connection,"SELECT toolloan_id,tool_name,teacher_name,student_name,time_loan,qty_loan FROM toolloan LEFT JOIN tool ON  tool.tool_id = toolloan.tool_id LEFT JOIN teacher ON teacher.teacher_id = toolloan.teacher_id LEFT JOIN student ON student.student_id = toolloan.student_id WHERE toolloan.toolloan_id = '$toolloan_id' ORDER BY toolloan.toolloan_id;  ");
              $pdf->Cell(40,10,'Tools Orders details');
              $pdf->Ln();
              $pdf->Cell(20,5,"ID",1);
              $pdf->Cell(60,5,"Tool name",1);
              $pdf->Cell(20,5,"Quantity",1);
              $pdf->Cell(40,5,"Student received",1);
              $pdf->Cell(40,5,"Time took",1);
              $pdf->Ln();
              $row5 = mysqli_fetch_array($result5);
              $pdf->Cell(20,5,$row5['toolloan_id'],1);
              $pdf->Cell(60,5,$row5['tool_name'],1);
              $pdf->Cell(20,5,$row5['qty_loan'],1);
              $pdf->Cell(40,5,$row5['student_name'],1);
              $pdf->Cell(40,5,$row5['time_loan'],1);                     
              $pdf->Ln();
              $pdf->SetY(-90);
              $pdf->Cell(0,10,"Student Signature",0,0,'L');
              $pdf->Cell(0,10,"Teacher Signature",0,0,'R');
              $pdf->SetY(-80);  
              $pdf->Cell(0,10,"______________",0,0,'L');
              $pdf->Cell(0,10,"______________",0,0,'R');
              $pdf->SetY(-70);  
              $pdf->Cell(0,10,$row5['student_name'],0,0,'L');
              $pdf->Cell(0,10,$row5['teacher_name'],0,0,'R');
              
              $pdf->Output(); 
    }
?>
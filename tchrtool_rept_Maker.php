<?php 

   $connection = mysqli_connect("localhost","root","","ats_db");
   error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_GET['id']))
	{
			$teacher_id = $_GET['id'];


            require('fpdf.php');
            require('tchr_rep_form.php');
            $pdf = new tchr_rep_form();
            $pdf->AddPage();
            $pdf->SetFont('Helvetica','',10);
            $result6 = mysqli_query($connection,"SELECT tool_name,unit_name,location_name,qty FROM tool,locationtools,unit,location where tool.tool_id = locationtools.tool_id and unit.unit_id = locationtools.unit_id and location.location_id =locationtools.location_id and location.teacher_id = '$teacher_id' ");
            $pdf->Cell(40,10,'Tools assgined');
              $pdf->Ln();
              $pdf->Cell(60,5,"Tool name",1);
              $pdf->Cell(40,5,"Tool unit",1); 
              $pdf->Cell(30,5,"Tool location",1);
              $pdf->Cell(30,5,"Previous Quantity",1);
              $pdf->Cell(30,5,"Current Quantity",1);
              $pdf->Ln();
    
              $row6 = mysqli_fetch_array($result6);  	 	 
              $pdf->Cell(60,5,$row6['tool_name'],1);
              $pdf->Cell(40,5,$row6['unit_name'],1); 
              $pdf->Cell(30,5,$row6['location_name'],1);
              $pdf->Cell(30,5,$row6['qty'],1); 
              $pdf->Cell(30,5,"",1);
              $pdf->Ln();
            
              $pdf->Output(); 
    }
?>
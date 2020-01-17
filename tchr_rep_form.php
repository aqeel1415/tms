<?php     

    class tchr_rep_form extends FPDF
    {
    // Page header
    function Header()
    {
        // Logo
         $this->Image('logo.png',5,5,50);
        // Arial bold 15
        $this->SetFont('Helvetica','',12);
        // Move to the right
        
        // Title
        $this->Cell(80);
        $this->Cell(30,0,'Saudi Petroleum Services Polytechnic ',0,0,'C');
        $this->Ln(1);
        $this->Cell(80);
        $this->Cell(30,10,'Teacher Report ',0,0,'C');
        $this->Cell(80);
        $this->Line(10, 20, 200, 20);
        
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Helvetica 8
        $this->SetFont('Helvetica','',8);
        $currentDate = date('Y-m-d H:i:sa');
        $this->Cell(20,10,$currentDate,0,0,'L'); 
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
    }

?>
<?php     
    class loan_rep_form extends FPDF
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
        $this->Cell(30,10,'Request Tools Paper ',0,0,'C');
        $this->Cell(80);
        $this->Line(10, 20, 200, 20);
        
        // Line break
        $this->Ln(20);
    }

    }

?>
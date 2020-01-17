<?php 


    $connection = mysqli_connect("localhost","root","","ats_db");
    error_reporting(E_ALL ^ E_DEPRECATED);



    $connectiontent = $_POST['t_rpt_cont'];
    $locations = false;
    $chapters = false;
    $loan = false;
    $sufficiency = false;

    
   foreach ($connectiontent as $value) {
        if(strcmp($value, 'locations') == 0){
         $locations = true;
        }
        if(strcmp($value, 'chapters') == 0){
         $chapters = true;
        }
        if(strcmp($value, 'loan') == 0){
         $loan = true;
        }
        if(strcmp($value, 'sufficiency') == 0){
         $sufficiency = true;
        }
    }
            require('fpdf.php');
            require('tool_rep_form.php');
            $pdf = new tool_rep_form();
            $pdf->AddPage();
            $pdf->SetFont('Helvetica','',10);
                 
            $tool_id = $_POST['tool_id'];
            $result2 = mysqli_query($connection,"SELECT * FROM tool where tool_id ='$tool_id' ");			
            $row2 = mysqli_fetch_array($result2);
            $pdf->Cell(50,5,"Name",1);
            $pdf->Cell(30,5,"Code ID",1);
            $pdf->Cell(20,5,"Color",1);
            $pdf->Cell(30,5,"Type",1);
            $pdf->Cell(30,5,"Quantity",1);
            $pdf->Ln();
            $pdf->Cell(50,5,$row2['tool_name'],1);
            $pdf->Cell(30,5,$row2['code_id'],1);
            $pdf->Cell(20,5,$row2['tool_color'],1);
            $pdf->Cell(30,5,$row2['tool_type'],1);
            $pdf->Cell(30,5,$row2['tool_quantity'],1);
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(120,5,"Remarks",1);
            $pdf->Ln();
            $pdf->Cell(120,5,$row2['tool_remark'],1);
            $pdf->Ln();

            if ($locations === true){
            $result3 = mysqli_query($connection,"SELECT * FROM location,locationtools,unit where locationtools.unit_id =location.unit_id and unit.unit_id =location.unit_id and tool_id = '$tool_id' ");			

              $pdf->Cell(40,10,'Locations the tool does exist:');
              $pdf->Ln();
              $pdf->Cell(50,5,"Unit",1);
              $pdf->Cell(50,5,"Location",1);
              $pdf->Cell(40,5,"Quantity",1);
              $pdf->Ln();
                
              $row3 = mysqli_fetch_assoc($result3);
              	 	  	 	 
              $pdf->Cell(50,5,$row3['unit_name'],1);
              $pdf->Cell(50,5,$row3['location_name'],1);
              $pdf->Cell(40,5,$row3['qty'],1);
              $pdf->Ln();
            
            }


            if ($chapters === true){
            $result4 = mysqli_query($connection,"SELECT level_name,chapter_name,req_qty FROM chaptertools,level,chapter where level.level_id= chaptertools.level_id and chapter.chapter_id = chaptertools.chapter_id and chaptertools.tool_id = '$tool_id' ");			

            $pdf->Cell(40,10,'List of the assigned chapters :');
            $pdf->Ln();
              $pdf->Cell(20,5,"Level",1);
              $pdf->Cell(40,5,"Chapter",1);
              $pdf->Cell(50,5,"Quantity per student",1);
              $pdf->Ln();
                
              $row4 = mysqli_fetch_array($result4);
              $pdf->Cell(20,5,$row4['level_name'],1);
              $pdf->Cell(40,5,$row4['chapter_name'],1);
              $pdf->Cell(50,5,$row4['req_qty'],1);
              $pdf->Ln();
            }

            if ($sufficiency === true){
            $result8 = mysqli_query($connection,"SELECT tool_name,needed_quantity FROM toolsneeded,tool where toolsneeded.tool_id =tool.tool_id and toolsneeded.tool_id = '$tool_id' ");			

            $pdf->Cell(40,10,'The needed quantity, if any :');
            $pdf->Ln();
              $pdf->Cell(60,5,"Tool name",1);
              $pdf->Cell(30,5,"Quantity needed",1);
              $pdf->Ln();
                
              $row8 = mysqli_fetch_assoc($result8);
              	 	  	 	 
              $pdf->Cell(60,5,$row8['tool_name'],1);
              $pdf->Cell(30,5,$row8['needed_quantity'],1);

              $pdf->Ln();
            
            }


            $pdf->Output();
            

?>
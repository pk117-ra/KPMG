<?php
  include('tcpdf/tcpdf.php');  
  $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
  $pdf->SetCreator(PDF_CREATOR);  
  $pdf->setPrintHeader(false);  
  $pdf->setPrintFooter(false);  
  $pdf->SetAutoPageBreak(TRUE, 10);  
  $pdf->SetFont('helvetica', '', 11);
  $pdf->AddPage();  
  $pdf->SetMargins(5, 10, 5, true);
  $pdf->SetXY(0, 10);
  $pdf->SetFont('helvetica', 'B', 15);
  $pdf->SetTextColor(50, 50, 50);
  $piDate= "235234";
  $pdf->SetFont('helvetica', 'B', 10);
  $pdf->cell(0, 0, 'PROFORMA INVOICE', 0, 0, 'C' );
  $pdf->Cell(0, 0,'Date: '.date("d.m.Y", strtotime($piDate)), 0, 1, 'R');
  $pdf->Ln(2);
  $pdf->SetFont('helvetica', 'B', 13);
  $pdf->Cell(0, 0, "sabari", 0, 0, 'C');
  $pdf->SetTextColor(50, 50, 50);
  $pdf->SetFont('helvetica', '', 8);
  $pdf->Cell(0, 0,'PI No:', 0, 1, 'R');
  $pdf->Ln(2);
  $pdf->Cell(0, 0, '', 0, 1, 'R');
  $pdf->Ln(1);
  $pdf->Cell(0, 0, '', 0, 1, 'R');
  $pdf->Ln(2);
  $pdf->Ln(10);
  $add='<table style="border: 1px solid black; border-collapse: collapse; width: 100%; margin-bottom:0px">
          <tr>
          </tr>
        </table>';
  $pdf->writeHTML($add);
  $pdf->Ln(1);
  $pdf->Ln(3);
  $pdf->SetFont('helvetica', 'B', '10');
  $pdf->SetTextColor(0,0, 0);
  $pdf->SetFont('helvetica', '', '10');
  $pdf->Cell(0,0,'For K.P.Manish Global Ingredients Pvt. Ltd', 0, 0,'R');
  $pdf->SetFont('helvetica', '', '10');
  $pdf->SetTextColor(50);
  $pdf->Ln(5);
  $cont = '<h4 style="text-align: center;">(Looking forward for your business)</h4> 
  <h4 style="text-align: center;">(This is Digitally Generated Document. Does not require Signature)</h4>';
  $pdf->writeHtml($cont);
  ob_end_clean();
  $pId=1;
  if(file_exists(__DIR__ . '/outward/PI-'.$pId.'.pdf')) {
    unlink(__DIR__ . '/outward/PI-'.$pId.'.pdf');
    $trusted = 'yes';
  } else {
        $trusted = 'no';
  } 
  $pdf->Output(__DIR__ . '/outward/PI-'.$pId.'.pdf', 'F');
?>
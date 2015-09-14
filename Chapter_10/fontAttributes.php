<?php
	require("fpdf/fpdf.php");
	
	$pdf = new FPDF();
	$pdf->addPage();

	$pdf->setFont("Arial", '', 12);
	$pdf->cell(0, 5, "Regular normal Arial Text here, size 12", 0, 1, 'L');
	$pdf->ln();

	$pdf->setFont("Arial", 'IBU', 20);
	$pdf->cell(0, 15, "This is Bold, Underlined, Italicised Text size 20", 0, 0, 'L');
	$pdf->ln();

	$pdf->setFont("Times", 'IU', 15);
	$pdf->cell(0, 5, "This is Underlined Italicised 15pt Times", 0, 0, 'L');
	
	$pdf->output();
 
?>
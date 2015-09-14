<?php
	require('fpdf/fpdf.php');
	
	$pdf = new FPDF('P', 'in', 'Letter');
	$pdf->addPage();

	$pdf->setFont('Arial', 'B', 24);
	$pdf->cell(0, 0, "Top Left!", 0, 1, 'L');
	$pdf->cell(6, 0.5, "Top Right!", 1, 0, 'R');
	$pdf->ln(4.5);
	$pdf->cell(0, 0, "This is the middle!", 0, 0, 'C');
	$pdf->ln(5.3);
	$pdf->cell(0, 0, "Bottom Left!", 0, 0, 'L');
	$pdf->cell(0, 0, "Bottom Right!", 0, 0, 'R');
	
	$pdf->output();
?>
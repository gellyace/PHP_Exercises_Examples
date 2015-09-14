<?php
	require("fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->addPage();

	$pdf->setFont("Times", 'U', 15);
	$pdf->setTextColor(128);
	$pdf->cell(0, 5, "Times font, Underlined and shade of Grey Text", 0, 0, 'L');
	$pdf->ln();
	$pdf->setTextColor(255, 0, 0);
	$pdf->cell(0, 5, "Times font, Underlined and Red Text", 0, 0, 'L');

	$pdf->output();
?>
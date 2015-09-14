<?php
	require("fpdf/fpdf.php");
	$pdf = new FPDF();

	// First page
	$pdf->addPage();
	$pdf->setFont("Times", '', 14);
	$pdf->write(5, "For a link to the next page - Click ");
	$pdf->setFont('', 'U');
	$pdf->setTextColor(0, 0, 255);
	$linkToPage2 = $pdf->addLink();
	$pdf->write(5, "here ", $linkToPage2);
	$pdf->setFont('');

	// Second page
	$pdf->addPage();
	$pdf->setLink($linkToPage2);
	$pdf->image("php-tiny.jpg", 10, 10, 30, 0, '', "http://www.php.net");
	$pdf->ln(20);
	$pdf->setTextColor(1);
	$pdf->cell(0, 5, "Click the following link, or click on the image ", 0, 1, 'L');
	$pdf->setFont('', 'U');
	$pdf->setTextColor(0,0,255);
	$pdf->write(5, "www.oreilly.com", "http://www.oreilly.com");
	
	$pdf->output();
?>
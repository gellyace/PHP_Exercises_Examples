<?php
	require('fpdf/fpdf.php');
	
	class MyPDF extends FPDF{
		function header(){
			global $title;	
			$this->setFont("Times", '', 12);
			$this->setDrawColor(0, 0, 180);
			$this->setFillColor(230, 0, 230);
			$this->setTextColor(0, 0, 255);
			$this->setLineWidth(1);

			$width = $this->getStringWidth($title) + 150;
			$this->cell($width, 9, $title, 1, 1, 'C', 1);
			$this->ln(10);
		}
	
		function footer(){
			//Position at 1.5 cm from bottom
			$this->setY(-15);
			$this->setFont("Arial", 'I', 8);
			$this->cell(0, 10, 
				"This is the page footer -> Page {$this->pageNo()}/{nb}", 0, 0, 'C');
		}
	}

	$title = "FPDF Library Page Header";
	$pdf = new MyPDF('P', 'mm', 'Letter');
	$pdf->aliasNbPages();
	
	$pdf->addPage();
	$pdf->setFont("Times", '', 24);
	$pdf->cell(0, 0, "some text at the top of the page", 0, 0, 'L');
	$pdf->ln(225);
	$pdf->cell(0, 0, "More text toward the bottom", 0, 0, 'C');
	
	$pdf->addPage();
	$pdf->setFont("Arial", 'B', 15);
	$pdf->cell(0, 0, "Top of page 2 after header", 0, 1, 'C');
	
	$pdf->output();
?>
<?php
require '../fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('logo_pb.png',10,5,40);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,30, 'Reporte De Domicilios',0,0,'C');
			$this->Ln(30);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}

?>
<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT producto.cod_producto, producto.nom_prod, domicilio_has_producto.cantidad,  
 domicilio.*FROM producto
 JOIN domicilio_has_producto
 ON (domicilio_has_producto.producto_Cod_producto = producto.cod_producto)
 JOIN domicilio
 ON(domicilio.Cod_dom=domicilio_has_producto.domicilio_Cod_dom)
 ";


	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'No.Dom',1,0,'C',1);
	$pdf->Cell(35,6,'Producto',1,0,'C',1);
	$pdf->Cell(20,6,'cantidad',1,0,'C',1);	
	$pdf->Cell(23,6,'Fecha',1,0,'C',1);
	$pdf->Cell(25,6,'Direccion',1,0,'C',1);
	$pdf->Cell(13,6,'Total',1,0,'C',1);
	$pdf->Cell(25,6,'Estado',1,0,'C',1);
	$pdf->Cell(29,6,'Obvservacion',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['Cod_dom']),1,0,'C');
		$pdf->Cell(35,6,$row['nom_prod'],1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['cantidad']),1,0,'C');		
		$pdf->Cell(23,6,utf8_decode($row['Fecha_Hora']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['Direc_Dom']),1,0,'C');
		$pdf->Cell(13,6,utf8_decode($row['Valor_Total']),1,0,'C');		
		$pdf->Cell(25,6,utf8_decode($row['estado_domicilio_Estado_dom']),1,0,'C');
		$pdf->Cell(29,6,utf8_decode($row['Observacion_dom']),1,1,'C');
	}
	$pdf->Output();
?>
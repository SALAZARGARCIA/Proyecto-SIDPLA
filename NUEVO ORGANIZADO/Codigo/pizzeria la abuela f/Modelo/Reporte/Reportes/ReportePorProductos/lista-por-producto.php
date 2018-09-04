
<?php 
 
require 'connections/connect.php';
include 'plantilla.php';?>
   

<?php
if (isset($_POST['form_sent']) && $_POST['form_sent'] == "true") {?>

<?php }?>
<?php
    
    
    $NPRODUCTO = $_POST['nombreproducto'];
   /* echo('<h3>'.$START_DATE.'</h3>');*/
    

  
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    


  $strsql = " SELECT producto.cod_producto, producto.nom_prod, producto.tamanio_tamanio, domicilio_has_producto.cantidad,  
 domicilio.*FROM producto
 JOIN domicilio_has_producto
 ON (domicilio_has_producto.producto_Cod_producto = producto.cod_producto)
 JOIN domicilio
 ON(domicilio.cod_dom=domicilio_has_producto.domicilio_cod_dom) WHERE Nom_Prod= '$NPRODUCTO'";


  $rs = mysqli_query($mysqli,$strsql);
  $row = mysqli_fetch_assoc($rs);
  $total_rows = mysqli_num_rows($rs);


  $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(15,6,'No.Dom',1,0,'C',1);
	$pdf->Cell(35,6,'Producto',1,0,'C',1);
	$pdf->Cell(15,6,'cantidad',1,0,'C',1);	
	$pdf->Cell(17,6,'Fecha',1,0,'C',1);
	$pdf->Cell(25,6,'Direccion',1,0,'C',1);
	$pdf->Cell(10,6,'Total',1,0,'C',1);
	$pdf->Cell(20,6,'Estado',1,0,'C',1);
	$pdf->Cell(29,6,'Obvservacion',1,0,'C',1);
  $pdf->Cell(25,6,'Tamanio',1,1,'C',1);
    
    $pdf->SetFont('Arial','',8);
    
  
        do {
    $pdf->Cell(15,6,utf8_decode($row['Cod_dom']),1,0,'C');
		$pdf->Cell(35,6,$row['nom_prod'],1,0,'C');
		$pdf->Cell(15,6,utf8_decode($row['cantidad']),1,0,'C');		
		$pdf->Cell(17,6,utf8_decode($row['Fecha_Hora']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['Direc_Dom']),1,0,'C');
		$pdf->Cell(10,6,utf8_decode($row['Valor_Total']),1,0,'C');		
		$pdf->Cell(20,6,utf8_decode($row['estado_domicilio_Estado_dom']),1,0,'C');
		$pdf->Cell(29,6,utf8_decode($row['Observacion_dom']),1,0,'C');
    $pdf->Cell(25,6,utf8_decode($row['tamanio_tamanio']),1,1,'C');
        } while ( $row = mysqli_fetch_assoc($rs) );
        mysqli_free_result($rs);
    $pdf->Output();

?>
    

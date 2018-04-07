
<?php 
 
require '../Modelo/conexion.php';
include '../Modelo/plantilla.php';?>
  <?php
if (isset($_POST['form_sent']) && $_POST['form_sent'] == "true") {?>

<?php }?>
<?php
    $SDATE = $_POST['start_date'];
    $SSDATE = explode('/', $SDATE);
    $START_DATE = $SSDATE[2]."-".$SSDATE[0]."-".$SSDATE[1];
   /* echo('<h3>'.$START_DATE.'</h3>');*/
    
    $EDATE = $_POST['end_date'];
    $EEDATE = explode('/', $EDATE);
    $END_DATE = $EEDATE[2]."-".$EEDATE[0]."-".$EEDATE[1];
    /*echo('<h3>'.$END_DATE.'</h3>');*/
  
   

$pdf = new PDF('L','pt');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$pdf->Ln(35);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 13, 'No.Dom',1);
$pdf->Cell(100, 13, 'Producto', 1);
$pdf->Cell(60, 13, 'cantidad', 1);
$pdf->Cell(80, 13, 'Fecha', 1);
$pdf->Cell(150, 13, 'Direccion', 1);
$pdf->Cell(60, 13, 'Total', 1);
$pdf->Cell(100, 13, 'Estado', 1);
$pdf->Cell(180, 13, 'Observacion', 1);
$pdf->Ln(13);
$pdf->SetFont('Arial', '', 10);
$pdf->tablewidths = array(50,100,60,80,150,60,100,180);

$resultado=mysqli_query($mysqli,"SELECT producto.cod_producto, producto.nom_prod, domicilio_has_producto.cantidad,  
 domicilio.*FROM producto
 JOIN domicilio_has_producto
 ON (domicilio_has_producto.producto_Cod_producto = producto.cod_producto)
 JOIN domicilio
 ON(domicilio.cod_dom=domicilio_has_producto.domicilio_cod_dom) WHERE Fecha_Hora BETWEEN '$START_DATE' AND '$END_DATE'");


if(mysqli_num_rows($resultado)>0)
{
$item = 0;


while($fila=mysqli_fetch_array($resultado)){
 
$item=$fila['Cod_dom'];
$b=$fila['nom_prod'];
$c=$fila['cantidad'];
$d=$fila['Fecha_Hora'];
$e=$fila['Direc_Dom'];
$g=$fila['Valor_Total'];
$h=$fila['estado_domicilio_Estado_dom'];
$j=$fila['Observacion_dom'];

$data[] = array(utf8_decode($item),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($g),utf8_decode($h),utf8_decode($j));

 
}

$pdf->morepagestable($data);

$pdf->Output();

}

 

?>
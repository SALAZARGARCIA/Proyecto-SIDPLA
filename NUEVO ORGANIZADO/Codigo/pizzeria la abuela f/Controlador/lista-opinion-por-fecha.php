<?php 
 
require '../Modelo/conexion.php';
include '../Modelo/plantilla opinion.php';?>

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
$pdf->Cell(60, 13, 'Codigo',1,0,'C',0);
$pdf->Cell(320, 13, 'Opinion', 1);
$pdf->Cell(150, 13, 'Numero De documento', 1);
$pdf->Cell(150, 13, 'Tiopo de documento', 1);
$pdf->Cell(90, 13, 'Fecha', 1);
$pdf->Ln(13);
$pdf->SetFont('Arial', '', 10);
$pdf->tablewidths = array(60,320,150,150,90);

$resultado=mysqli_query($mysqli,"SELECT * FROM opinion WHERE Fecha BETWEEN '$START_DATE' AND '$END_DATE' ");
if(mysqli_num_rows($resultado)>0)
{
$item = 0;


while($fila=mysqli_fetch_array($resultado)){
 
$item =$fila['Cod_Opinion'];
$b=$fila['Opinion'];
$c=$fila['persona_Num_Documento_per'];
$d=$fila['persona_tipo_doc'];
$e=$fila['Fecha'];

$data[] = array(utf8_decode($item),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e));

 
}

$pdf->morepagestable($data);

$pdf->Output();

}

 

?>
    

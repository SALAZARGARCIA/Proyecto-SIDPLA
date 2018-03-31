

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
  
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    


  $strsql = " SELECT  * FROM opinion WHERE Fecha BETWEEN '$START_DATE' AND '$END_DATE'";


  $rs = mysqli_query($mysqli,$strsql);
  $row = mysqli_fetch_assoc($rs);
  $total_rows = mysqli_num_rows($rs);


    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'No.Opinion',1,0,'C',1);
  $pdf->Cell(40,6,'Opinion',1,0,'C',1);
	$pdf->Cell(35,6,'No.Documento',1,0,'C',1);
	$pdf->Cell(50,6,'Tipo Documento',1,0,'C',1);	
	$pdf->Cell(23,6,'Fecha',1,1,'C',1);

    
    $pdf->SetFont('Arial','',10);
    
  
        do {
    $pdf->Cell(30,6,utf8_decode($row['Cod_Opinion']),1,0,'C');
		$pdf->Cell(40,6,$row['Opinion'],1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['persona_Num_Documento_per']),1,0,'C');		
		$pdf->Cell(50,6,utf8_decode($row['persona_tipo_doc']),1,0,'C');
		$pdf->Cell(23,6,utf8_decode($row['Fecha']),1,1,'C');

        } while ( $row = mysqli_fetch_assoc($rs) );
        mysqli_free_result($rs);
    $pdf->Output();

?>
    

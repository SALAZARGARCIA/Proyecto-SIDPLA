
<?php 
 
require 'connections/connect.php';
include 'plantilla.php';?>
   

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
    


  $strsql = "SELECT * FROM test WHERE course_date BETWEEN '$START_DATE' AND '$END_DATE'";


  $rs = mysqli_query($mysqli,$strsql);
  $row = mysqli_fetch_assoc($rs);
  $total_rows = mysqli_num_rows($rs);


    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,6,'id',1,0,'C',1);
    $pdf->Cell(35,6,'course',1,0,'C',1);
    $pdf->Cell(20,6,'course_date',1,1,'C',1);  
    /*$pdf->Cell(23,6,'Fecha',1,0,'C',1);
    $pdf->Cell(25,6,'Direccion',1,0,'C',1);
    $pdf->Cell(13,6,'Total',1,0,'C',1);
    $pdf->Cell(25,6,'Estado',1,0,'C',1);
    $pdf->Cell(29,6,'Obvservacion',1,1,'C',1);*/
    
    $pdf->SetFont('Arial','',10);
    
  
        do {

        $pdf->Cell(20,6,utf8_decode($row['id']),1,0,'C');
        $pdf->Cell(35,6,$row['course'],1,0,'C');
        $pdf->Cell(20,6,utf8_decode($row['course_date']),1,1,'C');     
       /* $pdf->Cell(23,6,utf8_decode($row['Fecha_Hora']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row['Direc_Dom']),1,0,'C');
        $pdf->Cell(13,6,utf8_decode($row['Valor_Total']),1,0,'C');      
        $pdf->Cell(25,6,utf8_decode($row['estado_domicilio_Estado_dom']),1,0,'C');
        $pdf->Cell(29,6,utf8_decode($row['Observacion_dom']),1,1,'C');*/
        } while ( $row = mysqli_fetch_assoc($rs) );
        mysqli_free_result($rs);
    $pdf->Output();

?>
    

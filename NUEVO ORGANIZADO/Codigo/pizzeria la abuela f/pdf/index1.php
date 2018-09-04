<?php 
	require_once('conexion/conexion.php');
  
 $SDATE = $_POST['start_date'];
    $SSDATE = explode('/', $SDATE);
    $START_DATE = $SSDATE[2]."-".$SSDATE[0]."-".$SSDATE[1];
   /* echo('<h3>'.$START_DATE.'</h3>');*/
    
    $EDATE = $_POST['end_date'];
    $EEDATE = explode('/', $EDATE);
    $END_DATE = $EEDATE[2]."-".$EEDATE[0]."-".$EEDATE[1];
    /*echo('<h3>'.$END_DATE.'</h3>');*/

	$usuario ="SELECT producto.cod_producto, producto.nom_prod, domicilio_has_producto.cantidad,  
 domicilio.*FROM producto
 JOIN domicilio_has_producto
 ON (domicilio_has_producto.producto_Cod_producto = producto.cod_producto)
 JOIN domicilio
 ON(domicilio.cod_dom=domicilio_has_producto.domicilio_cod_dom) WHERE Fecha_Hora BETWEEN '$START_DATE' AND '$END_DATE'";
  //"SELECT * FROM domicilio WHERE Fecha_Hora BETWEEN '$START_DATE' AND '$END_DATE'";	
	$usuarios=$mysqli->query($usuario);
	
if(isset($_POST['create_pdf'])){
	require_once('tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('L', 'mm', 'Carta', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($_POST['reporte_name']);
	
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();

	$content = '';
	
	$content .= '
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">Reporte de Domicilios</h1>
       	
      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>No.Dom</th>
            <th>Producto</th>
             <th>Cantidad</th>
            <th>Fecha</th>
             <th>Direccion</th>
            <th>Total</th>
             <th>Estado</th>
            <th>Observacion</th>
           
          </tr>
        </thead>
	';
	
	
	while ($user=$usuarios->fetch_assoc()) { 
	$content .= '
		<tr>
            <td>'.$user['Cod_dom'].'</td>
            <td>'.$user['Fecha_Hora'].'</td>
            <td>'.$user['Cod_dom'].'</td>
            <td>'.$user['Fecha_Hora'].'</td>
            <td>'.$user['Cod_dom'].'</td>
            <td>'.$user['Fecha_Hora'].'</td>
            <td>'.$user['Observacion_dom'].'</td>
            <td>'.$user['Observacion_dom'].'</td>
            
        </tr>
	';
	}
	
	$content .= '</table>';
	
	
	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');
}

?>
		 
          
        

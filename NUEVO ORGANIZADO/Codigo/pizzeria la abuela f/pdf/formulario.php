<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF </title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
        <div class="row padding">
        	<div class="col-md-12">
            	<?php $h1 = "Reporte de Domicilios ";  
            	 echo '<h1>'.$h1.'</h1>'
				?>
            </div>
        </div>
    	<div class="row">
     
              <div class="col-md-12">
              	<form method="post" action="index1.php">
                	<input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                  Fecha comienzo: <br/>
                  <input type="TEXT" id="start_date" name="start_date" placeholder="mm/dd/yyyy"> <br/>
                  Fecha final:<br/>
                  <input type="TEXT" id="end_date" name="end_date"  placeholder="mm/dd/yyyy"><br/>
                	<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
      	</div>
    </div>
</body>
</html>
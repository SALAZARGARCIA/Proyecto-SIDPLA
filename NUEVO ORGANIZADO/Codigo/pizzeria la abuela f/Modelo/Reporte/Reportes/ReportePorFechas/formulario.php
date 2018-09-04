<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="estilos.css">
	<title></title>
</head>
<body>
<form method="post" action="lista-por-fecha.php">
  <h1>Búsqueda por Fecha</h1>
    Fecha comienzo: <br/>
    <input type="TEXT" id="start_date" name="start_date" placeholder="mm/dd/yyyy"> <br/>
    Fecha final:<br/>
    <input type="TEXT" id="end_date" name="end_date"  placeholder="mm/dd/yyyy"><br/>
      
    <input type="hidden" id="form_sent" name="form_sent" value="true">
    <input type="submit" id="btn_submit" value="Enviar"><br/>    
</form>
</body>
</html>
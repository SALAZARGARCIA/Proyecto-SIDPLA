<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Listado Por Fecha</title>
    <meta name="Author" content=""/>
</head>
<body>

<form method="post" action="lista-por-fecha.php">
  <h1>Búsqueda por Fecha</h1>
    Fecha comienzo: <br/>
    <input type="TEXT" id="start_date" name="start_date" placeholder="mm/dd/yyyy"> 
    Fecha final:<br/>
    <input type="TEXT" id="end_date" name="end_date"  placeholder="mm/dd/yyyy"><br/>
    Fecha:<br/>
    
    <input type="hidden" id="form_sent" name="form_sent" value="true">
    <input type="submit" id="btn_submit" value="Enviar"><br/>
    
</form>


<hr>
</body>
</html>

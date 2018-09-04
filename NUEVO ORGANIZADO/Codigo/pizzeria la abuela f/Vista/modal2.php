<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/styles.css">
<style>

/* Div Modal (background) */
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

</style>
</head>
<body>

<?php  
if(isset($_GET['Nuevo'])){ ?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <a href="modal2.php">&times;</a>
    <form action="" class="formreg" method="POST" name="fregistro" onsubmit="return evaluar();">
                <p id="edit">ID <?php echo $_GET['ID'] ?></p>
                   <input type="number" name="Num_Documento_per" id="ndoc" class="inputt" required>
                <label class="labell" for="ndoc">Numero de Documento</label>

                   <input type="text" name="Nombres" id="Nomb" class="inputt" required>
                <label class="labell" for="Nomb">Nombres</label>
                  
                   <input type="text" name="Apellidos" id="Apell" class="inputt" required>
                <label class="labell" for="Apell">Apellidos</label>
                  
                   <input type="email" name="Correo_per" id="email" class="inputt" required>
                <label class="labell" for="email">Correo</label>
                  
                   <input type="number" name="Tel_per" id="tel" class="inputt" required>
                <label class="labell" for="tel">Telefono fijo</label>
                  
                   <input type="number" name="Cel_per" id="cel" class="inputt">
                <label class="labell" for="cel">Celular</label>
                  
                   <input type="text" name="Direc_per" id="direc" class="inputt" required>
                <label class="labell" for="direc">Direccion</label>
                
                <input type="submit" class="submit" name="registrar_per" value="Registrar">
            </form>
  </div>

</div>

<?php }

?>

<h2>Modal</h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn" class="boton_primario" name="ID1" onclick="location.href='modal2.php?Nuevo'">Abrir Modal</button>

<button id="myBtn" class="boton_primario" name="ID2">Abrir Modal 2</button>

<div class="contenedor-form-agregar">
              
          </div>

          <select name="oferta" class="selects" id="oferta" ">
            <option value="tamalito">Tamalito</option>
            <option value="buñuelito">Buñuelito</option>
            <option value="almojabanita">Almojabanita</option>
          </select>
          <script type="text/javascript">
            function stok(opcion){
              if(opcion =="almojabanita")
              {
                alert("Has seleccionado tamalito");
                //document.forms['form1']['nombre del input a desabilitar'].disabled=true;
              }
            }
          </script>


</body>
</html>
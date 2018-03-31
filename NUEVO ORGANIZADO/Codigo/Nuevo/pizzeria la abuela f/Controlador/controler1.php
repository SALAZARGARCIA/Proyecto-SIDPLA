<?php

include("../modelo/clases.php"); //Trae el archivo clases.php en cual se creara más adelante
include "../modelo/conection.php";

if (isset($_POST["registrarVenta"])) {

    session_start();
    $sessioncart = $_SESSION["cart"];
    error_reporting(0);
    $sessionidp = $_SESSION["idp"];
    $sessiontdp = $_SESSION["tdp"];

    if (null !== $sessioncart && null !== $sessionidp && null !== $sessiontdp) {


        include "../MODELO/conection.php";
        if (!empty($_POST)) {
            $vt = 0;
            foreach ($_SESSION["cart"] as $c) {
                $products = $con->query("select * from producto where Cod_producto=$c[product_id]");
                $r = $products->fetch_object();
                $vs = $c["q"] * $r->Valor_unitario;
                $vt += $vs;
            }
            try {
                $q1 = $con->query("insert into domicilio(Fecha_Hora,Direc_Dom,Valor_Total,Observacion_dom,estado_domicilio_Estado_dom,pizzeria_Nit_Pizzeria)
 values(NOW(),\"$_POST[Direc]\",$vt,\"$_POST[Obser]\",'EN ESPERA',801145012)");

                $cart_id = $con->insert_id;
                $idper = $_SESSION["idp"];
                $tdocper = $_SESSION["tdp"];
            } catch (EXEPTION $e) {

                echo $e . getMessage;
            }

            $q2 = $con->query("insert into persona_has_domicilio(persona_Num_Documento_per, persona_tipo_doc, domicilio_Cod_dom)
	values ('$idper','$tdocper',$cart_id)");

            foreach ($_SESSION["cart"] as $c) {
                $products = $con->query("select * from producto where Cod_producto=$c[product_id]");
                $r = $products->fetch_object();
                $vs = $c["q"] * $r->Valor_unitario;

                $q3 = $con->query("insert into domicilio_has_producto(domicilio_Cod_dom,producto_Cod_producto,Cantidad,Valor_subtotal)
 values($cart_id,$c[product_id],$c[q],$vs)");
            }


            unset($_SESSION["cart"]);
        }
        print "<script>alert('Venta procesada exitosamente');window.location='../Vista/productos.php';</script>";
    } else {
        print "<script>alert('Regístrate o inicia sesión.');window.location='../Vista/inicio_sesion.php';</script>";
    }
}


if (isset($_POST["registrar"])) { // Verifica si el botón oprimido es el de registro
    $doc = $_REQUEST['doc'];
    $tdoc = $_REQUEST['tdoc'];
    $nom1 = $_REQUEST['nom1'];
    $nom2 = $_REQUEST['nom2'];
    $ape1 = $_REQUEST['ape1'];
    $ape2 = $_REQUEST['ape2'];
    $usu = $_REQUEST['usu']; // Captura de valor de campos de formulario
    $pass = $_REQUEST['pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT); //Encriptación de la contraseña digitada
    $tel = $_REQUEST['tel'];
    $cel = $_REQUEST['cel'];
    $direc = $_REQUEST['direc'];
    $correo = $_REQUEST['correo'];

    $objeto = new clases; // Creación de un objeto de la clase clases del archivo clases.php
    $res = $objeto->verifica($usu); //Llamada mediante el objeto creado del método “verifica�? con el parámetro usuario
//el resultado del método se asigna a la variable $res

    if ($res->num_rows == 1) { //Verifica cuantos registro hay en el valor retornado $res (num_rows)
        header("location:../vista/registro2.php?dato1=no"); //si es = a 1, el usuario ya existe
    } else {
        $res = $objeto->registro($doc, $nom1, $nom2, $ape1, $ape2, $usu, $pass, $tel, $cel, $direc, $correo, $tdoc); //Si no es = 1 , llama al método “resgistro�? con 4 parámetros
        header("location:../vista/registro2.php?dato=no"); //Redirige a página registro sin errores
    }
    $objeto->CloseDB(); // Cierra conexión a base de datos
}//FIN Registro


if (isset($_POST["enviar"])) {
    $loginNombre = $_REQUEST["usu"];
    $loginPassword = $_REQUEST['pass'];
    $objeto = new clases;
    $res = $objeto->logueo($loginNombre); //Ejecuta método y devuelve consulta para saber si el usuario esta
    if ($res->num_rows == 0) {
        header("location:../vista/inicio_sesion.php?error=si"); //Redirige al index pasando la variable error
    }
//En otro caso En $reg se guarda el resultado de la consulta. Al segundo posición de SESION se le asigna el id
//del usuario
    else { //Redirige a página logueada
        $actor = $res->fetch_array(); // Obtiene una fila de resultados como un array asociativo, numérico, o ambos
        if (password_verify($loginPassword, $actor["Pass_login"])) {
            session_start();
            $_SESSION["session"] = $actor["Primer_Nombre_per"] . " " . $actor["Primer_Apellido_per"];
            $_SESSION["idp"] = $actor["Num_Documento_per"];
            $_SESSION["tdp"] = $actor["tipo_doc"];
            $_SESSION["rolp"] = $actor["rol_Rol"];
            if ($actor["rol_Rol"] == "CLIENTE") {
                header("location:../VISTA/index.php"); //Redirige a página de usuario
            } else if ($actor["rol_Rol"] == "ADMINISTRADOR") {
                header("location:../Vista/administrador/administrador.php"); //Redirige a página de administrador
            } else if ($actor["rol_Rol"] == "EMPLEADO") {
                header("location:../vista/empleado/empleado.php");
            }
        } else { // Si el password no es correcto
            header("location:../vista/inicio_sesion.php?error=si");
        }
    }
    $objeto->CloseDB();
}

//Cometarios
if (isset($_POST["comentar"])) { // Verifica si el botón oprimido es el de comentar
    session_start();

    $com = $_REQUEST['comentario'];
    $idper = $_SESSION["idp"];
    $tdocper = $_SESSION["tdp"];
    $q4 = $con->query("insert into opinion(Opinion,persona_Num_Documento_per,persona_tipo_doc, Fecha)
 values('$com','$idper','$tdocper',NOW())");

    print "<script>alert(\"Gracias por tu opinión\");window.location='../Vista/coment.php';</script>";
}

if (isset($_POST["cambio_est_dom"])) {

    $iddom = $_POST["domicilio_id"];
    $q5 = $con->query("update domicilio set estado_domicilio_Estado_dom= 'ENTREGADO' where Cod_dom= $iddom");
    print "<script>alert(\"Domicilio entregado exitosamente\");window.location='../Vista/empleado/empleado.php';</script>";
$q5 = $con->query("select * from domicilio_has_producto where domicilio_Cod_dom=$iddom");
foreach ($q5 as $c) {
	$qq = $con->query("select * from producto where Cod_producto=$c[producto_Cod_producto]");
	foreach ($qq as $row) {
		if($row['tipo_producto_tipo_prod']=='BEBIDA'){
		$q3 = $con->query("UPDATE PRODUCTO SET Cantidad_exist= Cantidad_exist-$c[Cantidad] WHERE Cod_producto=$c[producto_Cod_producto]");
	}
	
	}
}
}
?>
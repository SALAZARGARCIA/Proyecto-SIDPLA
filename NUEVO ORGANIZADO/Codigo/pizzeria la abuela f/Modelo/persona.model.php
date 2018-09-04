<?php

include_once "conexion.php";

class PersonaModel {

    protected $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = database::conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function VerificaRol($ruta){
        try {
            switch ($ruta) {
                case 'header.php':
                        if(isset($_SESSION['session']))
                        $stm = $this->pdo->prepare("SELECT rol_Rol FROM PERSONA WHERE Num_Documento_per = ?");

                    break;
                case 'empleado.php':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar_Persona(Persona $data) {

        try {
            $sql="SELECT * FROM PERSONA WHERE Num_Documento_per=? or Correo_per = ?";
            $resultado = $this->pdo->prepare($sql);
            $resultado->execute(array($data->__GET('Num_Documento_per'),$data->__GET('Correo_per')));
            if ($resultado->rowCount() > 0){
                 print "<script>alert('El usuario ya se encuentra registrado en el sistema');window.location='javascript:window.history.back();';</script>";   
            }else{ 
                
            $sql = "insert into PERSONA values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('Num_Documento_per'),
                                $data->__GET('Nombres'),
                                $data->__GET('Apellidos'),
                                $data->__GET('Pass_login'),
                                $data->__GET('Tel_per'),
                                $data->__GET('Cel_per'),
                                $data->__GET('Direc_per'),
                                $data->__GET('Correo_per'),
                                $data->__GET('tipo_doc'),
                                $data->__GET('rol_Rol'),1));

                if(isset($_POST['registro_normal'])){
                    print "<script>alert(\"Registro exitoso.\");window.location='../index.php';</script>";
                }
                print "<script>alert(\"Registro exitoso.\");window.location='javascript:window.history.back();';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Persona($rol) {
        try {
            $result = array();
            if($rol=='todos'){
                $stm = $this->pdo->prepare("select * from PERSONA");
                $stm->execute();
            }else{
                $stm = $this->pdo->prepare("select * from PERSONA where rol_Rol = ?");
                $stm->execute(array($rol));
            }

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $persona = new Persona();

                $persona->__SET('Num_Documento_per', $r->Num_Documento_per);
                $persona->__SET('Nombres', $r->Nombres);
                $persona->__SET('Apellidos', $r->Apellidos);
                $persona->__SET('Pass_login', $r->Pass_login);
                $persona->__SET('Tel_per', $r->Tel_per);
                $persona->__SET('Cel_per', $r->Cel_per);
                $persona->__SET('Direc_per', $r->Direc_per);
                $persona->__SET('Correo_per', $r->Correo_per);
                $persona->__SET('tipo_doc', $r->tipo_doc);
                $persona->__SET('rol_Rol', $r->rol_Rol);
                $persona->__SET('estado_per', $r->estado_per);

                $result[] = $persona;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Persona($Num_Documento_per) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM PERSONA WHERE Num_Documento_per=?");

            $stm->execute(array($Num_Documento_per));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $persona = new Persona();

            $persona->__SET('Num_Documento_per', $r->Num_Documento_per);
            $persona->__SET('Nombres', $r->Nombres);
            $persona->__SET('Apellidos', $r->Apellidos);
            $persona->__SET('Pass_login', $r->Pass_login);
            $persona->__SET('Tel_per', $r->Tel_per);
            $persona->__SET('Cel_per', $r->Cel_per);
            $persona->__SET('Direc_per', $r->Direc_per);
            $persona->__SET('Correo_per', $r->Correo_per);
            $persona->__SET('tipo_doc', $r->tipo_doc);
            $persona->__SET('rol_Rol', $r->rol_Rol);

            return $persona;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Persona(Persona $data) {
        try {
            $sql = "UPDATE PERSONA SET Nombres = ?, Apellidos = ?, Tel_per = ?, Cel_per = ?, Direc_per = ?, Correo_per = ?, rol_Rol = ? WHERE Num_Documento_per = ?";
            
            $this->pdo->prepare($sql)
                    ->execute(
                            array(
                                $data->__GET('Nombres'),
                                $data->__GET('Apellidos'),
                                $data->__GET('Tel_per'),
                                $data->__GET('Cel_per'),
                                $data->__GET('Direc_per'),
                                $data->__GET('Correo_per'),
                                $data->__GET('rol_Rol'),
                                $data->__GET('Num_Documento_per')
                            )
            );

            print "<script>alert(\"Datos actualizados exitosamente.\");window.location='javascript:window.history.back();';</script>";

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar_Persona($Num_Documento_per) {
        try {
            $stm = $this->pdo->prepare("delete from PERSONA where Num_Documento_per=?");

            $stm->execute(array($Num_Documento_per));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Login($correo,$pass){
        try{
            $sql="SELECT * FROM PERSONA WHERE Correo_per= ?";
            $resultado = $this->pdo->prepare($sql);
            $resultado->execute(array($correo));
            if ($resultado->rowCount() > 0){

                $persona = $resultado->fetch(PDO::FETCH_ASSOC);
                //Verificar estado del rol 
                if($this->Verificar_estado_rol($persona["rol_Rol"])){
                    /*Verificar si el usuario esta activo*/
                    if($persona['estado_per'] == 0){
                        header("location:../Vista/login.php?error_est=si");
                    }else{

                        if (password_verify($pass, $persona["Pass_login"])) {
                            session_start();
                            $_SESSION["session"] = array(
                                'Nombres' => $persona["Nombres"],
                                'Documento' => $persona["Num_Documento_per"], 
                                'Tipo_Doc' => $persona["tipo_doc"], 
                                'Rol' => $persona["rol_Rol"]
                            );
                            if ($persona["rol_Rol"] == "CLIENTE") {
                                header("location:../index.php"); 
                            } else if ($persona["rol_Rol"] == "ADMINISTRADOR") {
                                header("location:../Vista/administrador/administrador.php"); 
                            } else if ($persona["rol_Rol"] == "EMPLEADO") {
                                header("location:../Vista/empleado/empleado.php");
                            }
                        }else{ // Si el password no es correcto
                            header("location:../Vista/login.php?error_c=si");
                        }
                    }

                }else{ //Si el rol esta deshabilitado
                    header("location:../Vista/login.php?errorRol=si");
                }
            }else{
                header("location:../Vista/login.php?error=si");
            }
            
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function Recuperar_contra($contra,$idper,$tdoc){
        try{
          $contrase = password_hash($contra, PASSWORD_DEFAULT);
          $sql = "UPDATE PERSONA SET Pass_login=? where Num_Documento_per = ? and tipo_doc = ?";
          $this->pdo->prepare($sql)
                    ->execute(
                            array($contrase,$idper,$tdoc)
            );
          session_destroy();
          print "<script>alert(\"Contraseña actualizada correctamente.\");window.location='login.php';</script>";
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Finalizar_Compra($direc,$observ){
        
        try{
            session_start();
            $sesion = isset($_SESSION['session'])? :print("<script>alert('Debes iniciar sesion para poder comprar'); window.location='../Vista/login.php';</script>");
            $Valor_Total = 0;
            // Traer el valor total de la compra recorriendo el carrito
            try{

                foreach ($_SESSION["cart"] as $c) {
                    
                    $stm = $this->pdo->prepare("SELECT Valor_unitario from PRODUCTO where Cod_producto= ? ");
                    $stm->execute(array($c['product_id']));
                    foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $k) {
                        $Valor_Sub= $c["cant"] * $k->Valor_unitario;
                        $Valor_Total += $Valor_Sub;
                    }
                }

            }catch(exception $e){
                die('Error: ' . $e->getMessage());
            }

            // Se ingresa a la tabla domicilio 

            try {
                $stm = $this->pdo->prepare("INSERT INTO DOMICILIO(Fecha,Direc_Dom,Valor_Total,Observacion_dom,estado_domicilio_Estado_dom,pizzeria_Nit_Pizzeria)
                    values(NOW(),?,?,?,?,?)");
                $stm->execute(array(
                    $direc,
                    $Valor_Total,
                    $observ,
                    'EN ESPERA',
                    '801145012'
                ));

                $id_dom = $this->pdo->lastInsertId();
                $idper = $_SESSION["session"]['Documento'];
                $tdocper = $_SESSION["session"]['Tipo_Doc'];

                $query = $this->pdo->prepare("INSERT INTO PERSONA_HAS_DOMICILIO (persona_Num_Documento_per, persona_tipo_doc, domicilio_Cod_dom) values (?,?,?) ");
                $query->execute(array($idper,$tdocper,$id_dom));

                foreach ($_SESSION["cart"] as $c) {

                    $vs=0;
                    $products = $this->pdo->prepare("SELECT * FROM PRODUCTO WHERE Cod_producto=?");
                    $products->execute(array($c['product_id']));

                    foreach ($products->fetchAll(PDO::FETCH_OBJ) as $k) {
                        $vs = $c["cant"] * $k->Valor_unitario;
                    }
                
                    $q3 = $this->pdo->prepare("INSERT into DOMICILIO_HAS_PRODUCTO(domicilio_Cod_dom,producto_Cod_producto,Cantidad,Valor_subtotal)
                        values(?,?,?,?)");
                    $q3->execute(array($id_dom,$c['product_id'],$c['cant'],$vs));
                }

                unset($_SESSION["cart"]);
                print "<script>alert('Venta procesada exitosamente');window.location='../Vista/misdomicilios.php';</script>";

            }catch(exception $e){
                die('Error: ' . $e->getMessage());
            }

        }catch(exception $e){
            die('Error: ' . $e->getMessage());
        }
    }


    public function Comentar($Comentario,$Documento,$Tipo_doc){
        try {
            $stm = $this->pdo->prepare("INSERT INTO OPINION(Opinion,persona_Num_Documento_per,persona_tipo_doc,Fecha)
                    values(?,?,?,NOW())");
                $stm->execute(array(
                    $Comentario,
                    $Documento,
                    $Tipo_doc
                ));
                print "<script>alert('Gracias por tu opinión');window.location='../Vista/contactanos.php';</script>";

        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }//Fin funcion comentar

    public function Cambio_estado_dom($Cod_dom, $Estado){
        try {
            $res= $this->pdo->query("UPDATE DOMICILIO SET estado_domicilio_Estado_dom ='$Estado' WHERE Cod_dom = '$Cod_dom' ");
            if($res){
                print "<script>alert(\"Domicilio cambiado exitosamente.\");window.location='javascript:window.history.back();';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Roles(){
        try {
            $result = array();
            $stm = $this->pdo->prepare("select Rol from ROL WHERE estado_rol = 1");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $result[] = $r->Rol;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } 

    public function Obtener_tipo_doc(){
        try {
            $result = array();
            $stm = $this->pdo->prepare("select tipo_doc from TIPO_DOC WHERE estado_tipo_doc = 1");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $result[] = $r->tipo_doc;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_sucursales(){
        try {
            $result = array();
            $stm = $this->pdo->prepare("select * from PIZZERIA");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $result[] = array(
                    "Dir_Pizzeria" => $r->Dir_Pizzeria, 
                    "Tel_Pizzeria" => $r->Tel_Pizzeria, 
                    "Cel_Pizzeria" => $r->Cel_Pizzeria
                );
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Deshabilitar_Persona($Documento) {
        try {
            $stm = $this->pdo->prepare("UPDATE PERSONA SET estado_per = 0 WHERE Num_Documento_per = ?");
            $result = $stm->execute(array($Documento));
            if($result){
                print "<script>alert(\"Persona deshabilitada exitosamente.\");window.location='../Vista/administrador/personas.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Habilitar_Persona($Documento) {
        try {
            $stm = $this->pdo->prepare("UPDATE PERSONA SET estado_per = 1 WHERE Num_Documento_per = ?");
            $result = $stm->execute(array($Documento));
            if($result){
                print "<script>alert(\"Persona habilitada exitosamente.\");window.location='../Vista/administrador/personas.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Count($tabla, $fecha){
        try{
            if($fecha == NULL){ 
                $stm = $this->pdo->prepare("SELECT COUNT(*) as count FROM $tabla");
            }elseif($fecha == '1'){
                $stm = $this->pdo->prepare("SELECT COUNT(*) as count FROM $tabla WHERE Fecha BETWEEN concat(year(curdate()), '-', month(curdate()), '-', '01') AND concat(year(curdate()), '-', month(curdate()), '-', '31')");
            }
            $stm->execute(array());
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $result = $r->count;
            return $result;
        }catch(exception $e){
            die($e->getMessage());
        }
    }

    public function Verificar_estado_rol($rol){
        try {
            $stm = $this->pdo->prepare("SELECT estado_rol FROM ROL WHERE Rol = ?");
            $stm->execute(array($rol));

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $k) {
                if($k->estado_rol == 1){
                    return true;
                }else{
                    return false;
                }
            }  
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Ventas_mes(){
        try{
            $stm = $this->pdo->query("SELECT SUM(Valor_Total) as Suma FROM DOMICILIO WHERE Fecha BETWEEN concat(year(curdate()), '-', month(curdate()), '-', '01') AND concat(year(curdate()), '-', month(curdate()), '-', '31') AND estado_domicilio_Estado_dom = 'ENTREGADO'");
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $total = $r->Suma;
            if($total == NULL){
                $total = 0;
            }
            return $total;
        }catch(exception $e){
            die($e->getMessage());
        }
    } 


    public function Reporte($data){
        try{
            include('Plantilla.php');
          
            $SDATE = $data['Fecha_Inicio'];
            $SSDATE = explode('-', $SDATE);
            $START_DATE = $SSDATE[2]."-".$SSDATE[0]."-".$SSDATE[1];
           
            
            $EDATE = $data['Fecha_Fin'];
            $EEDATE = explode('-', $EDATE);
            $END_DATE = $EEDATE[2]."-".$EEDATE[0]."-".$EEDATE[1];
            

            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
    


            $strsql = "SELECT * FROM domicilio";
   
   
            $rs =$this->pdo->query($strsql);
            /*$row = mysqli_fetch_assoc($rs);
            $total_rows = mysqli_num_rows($rs);*/
            
              
              

              $pdf->SetFillColor(232,232,232);
              /*$pdf->SetFont('Arial','B',12);
              $pdf->Cell(20,6,'No.Dom',1,0,'C',1);
              $pdf->Cell(23,6,'Fecha',1,0,'C',1);
              $pdf->Cell(25,6,'Direccion',1,0,'C',1);
              $pdf->Cell(13,6,'Total',1,0,'C',1);      */       
              $pdf->Cell(29,6,'Obvservacion',1,1,'C',1);
              //$pdf->Cell(25,6,'Estado',1,1,'C',1);
              
              $pdf->SetFont('Arial','',10);
              
            
              while($row=$rs->fetch(PDO::FETCH_ASSOC))
              {
                  /*$pdf->Cell(20,6,utf8_decode($row['Cod_dom']),1,0,'C');
                  $pdf->Cell(35,6,$row['Fecha'],1,0,'C');
                  $pdf->Cell(20,6,utf8_decode($row['Direc_Dom']),1,0,'C');		
                  $pdf->Cell(23,6,utf8_decode($row['Valor_Total']),1,0,'C');*/
                  $pdf->GetStringWidth(utf8_decode($row['Observacion_dom']));
                  $pdf->Cell(13,6,utf8_decode($row['estado_domicilio_Estado_dom']),1,0,'C',0);		                 
              }

                  
                  $pdf->Output();
          

        }catch(exception $e){
            die($e->getMessage());
        }
    }


}

?>
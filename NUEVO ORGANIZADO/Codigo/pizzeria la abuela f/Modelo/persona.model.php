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
                 print "<script>alert('El usuario ya se encuentra registrado en el sistema');</script>";   
            }else{ 
                
            $sql = "insert into PERSONA values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
                                $data->__GET('rol_Rol')));
                
                print "<script>alert(\"Gracias por registrarse.\");window.location='../index.php';</script>";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Persona() {
        try {
            $result = array();

            $stm = $this->pdo->prepare("select * from PERSONA");
            $stm->execute();

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

            $stm->execute(array('1033815398'));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            include_once '../Controlador/persona.control.php';
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
            $sql = "UPDATE PERSONA SET Num_Documento_per=?, Nombres=?, Apellidos=?, Pass_login=?, Tel_per=?,Cel_per=?, Direc_per=?, Correo_per=?, tipo_doc=?, Rol_rol=? WHERE  Num_Documento_per= ?";
            

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
                                $data->__GET('rol_Rol'),
                                $data->__GET('Num_Documento_per2')
                            )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar_Datos($Nombres,$Apellidos,$Correo,$Telefono,$Celular,$Direccion,$Documento){
        try {
            
            $stm = $this->pdo->prepare('UPDATE PERSONA SET Nombres = ?, Apellidos = ?, Correo_per = ?, Tel_per = ?, Cel_per = ?, Direc_per = ? WHERE Num_Documento_per = ?');
    
            $stm->execute(array(
                $Nombres,
                $Apellidos,
                $Correo,
                $Telefono,
                $Celular,
                $Direccion,
                $Documento
            ));

            print "<script>alert(\"Datos actualizados correctamente.\");window.location='../index.php';</script>";            

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
                        header("location:../index.php"); 
                    } else if ($persona["rol_Rol"] == "EMPLEADO") {
                        header("location:../Vista/empleado/empleado.php");
                    }
                } else { // Si el password no es correcto
                    header("location:../Vista/login.php?error_c=si");
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
    }


}

?>
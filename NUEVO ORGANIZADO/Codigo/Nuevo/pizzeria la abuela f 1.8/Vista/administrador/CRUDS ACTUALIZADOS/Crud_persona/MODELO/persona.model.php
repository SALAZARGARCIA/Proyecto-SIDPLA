<?php
include_once "../MODELO/database.php";
class PersonaModel{
	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo= database::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar_Persona(Persona $data){

		try {
			$sql = "CALL Insertar_Persona(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('Num_Documento_per'),
				$data->__GET('Primer_Nombre_per'),
				$data->__GET('Segundo_Nombre_per'),
				$data->__GET('Primer_Apellido_per'),
				$data->__GET('Segundo_Apellido_per'),
				$data->__GET('Usuario_login'),
				$data->__GET('Pass_login'),
				$data->__GET('Tel_per'),
				$data->__GET('Cel_per'),
				$data->__GET('Direc_per'),
				$data->__GET('Correo_per'),
				$data->__GET('tipo_doc'),
				$data->__GET('rol_Rol')
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_Persona(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_Persona");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$persona = new Persona();

				$persona->__SET('Num_Documento_per', $r->Num_Documento_per);
				$persona->__SET('Primer_Nombre_per', $r->Primer_Nombre_per);
				$persona->__SET('Segundo_Nombre_per', $r->Segundo_Nombre_per);
				$persona->__SET('Primer_Apellido_per', $r->Primer_Apellido_per);
				$persona->__SET('Segundo_Apellido_per', $r->Segundo_Apellido_per);
				$persona->__SET('Usuario_login', $r->Usuario_login);
				$persona->__SET('Pass_login', $r->Pass_login);
				$persona->__SET('Tel_per', $r->Tel_per);
				$persona->__SET('Cel_per', $r->Cel_per);
				$persona->__SET('Direc_per', $r->Direc_per);
				$persona->__SET('Correo_per', $r->Correo_per);
				$persona->__SET('tipo_doc', $r->tipo_doc);
				$persona->__SET('rol_Rol', $r->rol_Rol);

				$result[]	= $persona;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_Persona($Num_Documento_per){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_Persona(?)");

			$stm->execute(array($Num_Documento_per));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$persona = new Persona();

				$persona->__SET('Num_Documento_per', $r->Num_Documento_per);
				$persona->__SET('Primer_Nombre_per', $r->Primer_Nombre_per);
				$persona->__SET('Segundo_Nombre_per', $r->Segundo_Nombre_per);
				$persona->__SET('Primer_Apellido_per', $r->Primer_Apellido_per);
				$persona->__SET('Segundo_Apellido_per', $r->Segundo_Apellido_per);
				$persona->__SET('Usuario_login', $r->Usuario_login);
				$persona->__SET('Pass_login', $r->Pass_login);
				$persona->__SET('Tel_per', $r->Tel_per);
				$persona->__SET('Cel_per', $r->Cel_per);
				$persona->__SET('Direc_per', $r->Direc_per);
				$persona->__SET('Correo_per', $r->Correo_per);
				$persona->__SET('tipo_doc', $r->tipo_doc);
				$persona->__SET('rol_Rol', $r->rol_Rol);

			return $persona;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_Persona(Persona $data){
		try{
			$sql = "CALL Actualizar_Persona(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('Num_Documento_per'),
				$data->__GET('Primer_Nombre_per'),
				$data->__GET('Segundo_Nombre_per'),
				$data->__GET('Primer_Apellido_per'),
				$data->__GET('Segundo_Apellido_per'),
				$data->__GET('Usuario_login'),
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
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_Persona($Num_Documento_per){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_Persona(?)");

			$stm->execute(array($Num_Documento_per));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
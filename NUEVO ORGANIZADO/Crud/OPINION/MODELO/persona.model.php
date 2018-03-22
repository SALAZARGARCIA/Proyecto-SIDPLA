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

	public function Registrar_opinion(Persona $data){

		try {
			$sql = "CALL Insertar_opinion(?, ?, ?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('Cod_Opinion'),
				$data->__GET('Opinion'),
				$data->__GET('persona_Num_Documento_per'),
				$data->__GET('persona_tipo_doc')
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_opinion(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_opinion");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$persona = new Persona();

				$persona->__SET('Cod_Opinion', $r->Cod_Opinion);
				$persona->__SET('Opinion', $r->Opinion);
				$persona->__SET('persona_Num_Documento_per', $r->persona_Num_Documento_per);
				$persona->__SET('persona_tipo_doc', $r->persona_tipo_doc);

				$result[]	= $persona;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_opinion($Cod_Opinion){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_opinion(?)");

			$stm->execute(array($Cod_Opinion));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$persona = new Persona();

				$persona->__SET('Cod_Opinion', $r->Cod_Opinion);
				$persona->__SET('Opinion', $r->Opinion);
				$persona->__SET('persona_Num_Documento_per', $r->persona_Num_Documento_per);
				$persona->__SET('persona_tipo_doc', $r->persona_tipo_doc);

			return $persona;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_opinion(Persona $data){
		try{
			$sql = "CALL Actualizar_opinion(?, ?, ?, ?,?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('Cod_Opinion'),
				$data->__GET('Opinion'),
				$data->__GET('persona_Num_Documento_per'),
				$data->__GET('persona_tipo_doc'),
				$data->__GET('Cod_Opinion2')
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_opinion($Cod_Opinion){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_opinion(?)");

			$stm->execute(array($Cod_Opinion));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
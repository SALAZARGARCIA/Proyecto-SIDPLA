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
			$sql = "CALL Insertar_Persona(?, ?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('persona_Num_Documento_per'),
				$data->__GET('persona_tipo_doc_tipo_doc'),
				$data->__GET('domicilio_Cod_dom'),
				
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_P(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_P");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$persona = new Persona();

				$persona->__SET('persona_Num_Documento_per', $r->persona_Num_Documento_per);
				$persona->__SET('persona_tipo_doc_tipo_doc', $r->persona_tipo_doc_tipo_doc);
				$persona->__SET('domicilio_Cod_dom',         $r->domicilio_Cod_dom);
				

				$result[]	= $persona;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_Persona($persona_Num_Documento_per){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_Persona(?)");

			$stm->execute(array($persona_Num_Documento_per));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$persona = new Persona();

				$persona->__SET('persona_Num_Documento_per', $r->persona_Num_Documento_per);
				$persona->__SET('persona_tipo_doc_tipo_doc', $r->persona_tipo_doc_tipo_doc);
				$persona->__SET('domicilio_Cod_dom', $r->domicilio_Cod_dom);
				

			return $persona;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_Persona(Persona $data){
		try{
			$sql = "CALL Actualizar_Persona(?, ?, ?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('persona_Num_Documento_per'),
				$data->__GET('persona_tipo_doc_tipo_doc'),
				$data->__GET('domicilio_Cod_dom'),
				
				$data->__GET('persona_Num_Documento_per2')
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_Persona($persona_Num_Documento_per){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_Persona(?)");

			$stm->execute(array($persona_Num_Documento_per));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
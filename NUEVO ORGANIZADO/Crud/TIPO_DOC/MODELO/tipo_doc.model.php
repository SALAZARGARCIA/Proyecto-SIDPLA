<?php
include_once "../MODELO/database.php";
class TipoDocModel{
	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo= database::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar_tipo_doc(TipoDoc $data){

		try {
			$sql = "CALL Insertar_tipo_doc(?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('tipo_doc'),
				$data->__GET('estado_tipo_doc'),
				
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_tipo_doc(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_tipo_doc");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$tipo_doc = new TipoDoc();

				$tipo_doc->__SET('tipo_doc', $r->tipo_doc);
				$tipo_doc->__SET('estado_tipo_doc', $r->estado_tipo_doc);
				

				$result[]	= $tipo_doc;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_tipo_doc($tipo_doc){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_tipo_doc(?)");

			$stm->execute(array($tipo_doc));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$tipo_doc = new TipoDoc();

				$tipo_doc->__SET('tipo_doc', $r->tipo_doc);
				$tipo_doc->__SET('estado_tipo_doc', $r->estado_tipo_doc);


			return $tipo_doc;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_tipo_doc(TipoDoc $data){
		try{
			$sql = "CALL Actualizar_tipo_doc(?, ?, ?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('tipo_doc'),
				$data->__GET('estado_tipo_doc'),
				$data->__GET('tipo_doc2')
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_tipo_doc($tipo_doc){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_tipo_doc(?)");

			$stm->execute(array($tipo_doc));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
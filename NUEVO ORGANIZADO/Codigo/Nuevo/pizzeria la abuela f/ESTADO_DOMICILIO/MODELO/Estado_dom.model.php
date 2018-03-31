<?php
include_once "../MODELO/database.php";
class EstadoDomModel{
	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo= database::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar_estado_domicilio(EstadoDom $data){

		try {
			$sql = "CALL Insertar_estado_domicilio(?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('Estado_dom'),
				$data->__GET('estado_e_dom'),
				
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_estado_domicilio(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_estado_domicilio");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$Estado_dom = new EstadoDom();

				$Estado_dom->__SET('Estado_dom', $r->Estado_dom);
				$Estado_dom->__SET('estado_e_dom', $r->estado_e_dom);
				

				$result[]	= $Estado_dom;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_estado_domicilio($Estado_dom){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_estado_domicilio(?)");

			$stm->execute(array($Estado_dom));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$Estado_dom = new EstadoDom();

				$Estado_dom->__SET('Estado_dom', $r->Estado_dom);
				$Estado_dom->__SET('estado_e_dom', $r->estado_e_dom);


			return $Estado_dom;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_estado_domicilio(EstadoDom $data){
		try{
			$sql = "CALL Actualizar_estado_domicilio(?, ?, ?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('Estado_dom'),
				$data->__GET('estado_e_dom'),
				$data->__GET('Estado_dom2')
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_estado_domicilio($Estado_dom){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_estado_domicilio(?)");

			$stm->execute(array($Estado_dom));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
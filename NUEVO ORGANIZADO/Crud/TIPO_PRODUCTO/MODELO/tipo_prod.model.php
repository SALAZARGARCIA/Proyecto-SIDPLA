<?php
include_once "../MODELO/database.php";
class TipoProductoModel{
	private $pdo;

	public function __CONSTRUCT(){
		try {
			$this->pdo= database::conectar();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar_tipo_producto(TipoProducto $data){

		try {
			$sql = "CALL Insertar_tipo_producto(?, ?)";

		$this->pdo->prepare($sql)
			 ->execute(
			 array(
				$data->__GET('tipo_prod'),
				$data->__GET('estado_tipo_prod')
				
			    )
		);
		}catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Listar_tipo_producto(){
		try{
			$result =array();

			$stm = $this->pdo->prepare("CALL Listar_tipo_producto");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) 
			{
				$persona = new TipoProducto();

				$persona->__SET('tipo_prod', $r->tipo_prod);
				$persona->__SET('estado_tipo_prod', $r->estado_tipo_prod);
				

				$result[]	= $persona;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}


	public function Obtener_tipo_producto($tipo_prod){
		try{
			$stm =$this->pdo->prepare("CALL Obtener_tipo_producto(?)");

			$stm->execute(array($tipo_prod));
			$r = $stm->fetch(PDO::FETCH_OBJ);

				$persona = new TipoProducto();

				$persona->__SET('tipo_prod', $r->tipo_prod);
				$persona->__SET('estado_tipo_prod', $r->estado_tipo_prod);


			return $persona;
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Actualizar_tipo_producto(TipoProducto $data){
		try{
			$sql = "CALL Actualizar_tipo_producto(?, ?)";

			$this->pdo->prepare($sql)
				 ->execute(
				array(
				$data->__GET('tipo_prod'),
				$data->__GET('estado_tipo_prod'),
				
				)
			);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}


	public function Eliminar_tipo_producto($tipo_prod){
		try{
			$stm = $this->pdo->prepare("CALL Eliminar_tipo_producto(?)");

			$stm->execute(array($tipo_prod));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
}

?>
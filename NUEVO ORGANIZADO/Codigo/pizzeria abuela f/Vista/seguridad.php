<?php  

class Seguridad{
	
	private $db;

	function __CONSTRUCT(){

		$this->db = new PDO('mysql:host=localhost;dbname=sidpla;charset=utf8', 'root', '');
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}

	public function Validar_Sesion($ruta){
		try {

			if(!isset($_SESSION['session'])){
				header('location:'. $ruta .'Nproductos.php');
			}
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Validar_Empleado(){

		$this->Validar_Sesion('../');

		try {
			$documento = $_SESSION['session']['Documento'];

			$stm = $this->db->query("SELECT * FROM PERSONA WHERE (rol_Rol = 'ADMINISTRADOR' OR rol_Rol = 'EMPLEADO') AND Num_Documento_per = '$documento'");

			if($stm->rowCount() == 0){
				header('location:../Nproductos.php');
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}

	public function Validar_Administrador(){

		$this->Validar_Sesion('../');
		
		try {
			$documento = $_SESSION['session']['Documento'];

			$stm = $this->db->query("SELECT * FROM PERSONA WHERE Num_Documento_per = '$documento' and rol_Rol = 'ADMINISTRADOR'");

			if($stm->rowCount() == 0){
				header('location:../Nproductos.php');
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}
}


?>
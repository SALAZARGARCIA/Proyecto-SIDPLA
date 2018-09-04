<?php  

include 'persona.model.php';

class EmpleadoModel extends PersonaModel
{
	
	function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
	}

	public function Cambio_estado_dom($Cod_dom, $Estado){
		try {
			$res= $this->pdo->query("UPDATE DOMICILIO SET estado_domicilio_Estado_dom ='$Estado' WHERE Cod_dom = '$Cod_dom' ");
			if($res){
				print("<script>alert('Domicilio entregado exitosamente'); window.location='../Vista/empleado/empleado.php'</script>");
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}


?>
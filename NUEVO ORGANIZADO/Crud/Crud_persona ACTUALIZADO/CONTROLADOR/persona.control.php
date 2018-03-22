<?php
class Persona{
	private $Num_Documento_per;
	private $Primer_Nombre_per;
	private $Segundo_Nombre_per;
	private $Primer_Apellido_per;
	private $Segundo_Apellido_per;
	private $Usuario_login;
	private $Pass_login;
	private $Tel_per;
	private $Cel_per;
	private $Direc_per;
	private $Correo_per;
	private $tipo_doc;
	private $rol_Rol;
	private $Num_Documento_per2;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
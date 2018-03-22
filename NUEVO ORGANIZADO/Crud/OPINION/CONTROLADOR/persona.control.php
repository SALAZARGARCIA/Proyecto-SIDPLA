<?php
class Persona{
	private $Cod_Opinion;
	private $Opinion;
	private $persona_Num_Documento_per;
	private $persona_tipo_doc;
	private $Cod_Opinion2;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
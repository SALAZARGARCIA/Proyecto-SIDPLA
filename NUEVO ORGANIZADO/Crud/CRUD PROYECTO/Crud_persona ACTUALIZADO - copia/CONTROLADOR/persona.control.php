<?php
class Persona{
	private $persona_Num_Documento_per;
	private $persona_tipo_doc_tipo_doc;
	private $domicilio_Cod_dom;
	

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
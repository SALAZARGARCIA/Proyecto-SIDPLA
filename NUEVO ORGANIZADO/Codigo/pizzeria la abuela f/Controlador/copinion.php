<?php

class Opinion	
{
	private $Cod_Opinion;	
	private $Opinion;
	private $persona_Num_Documento_per;
	private $persona_tipo_doc;
	private $Fecha;

	

	public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
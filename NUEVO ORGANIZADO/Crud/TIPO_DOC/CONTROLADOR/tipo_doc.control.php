<?php
class TipoDoc{
	private $tipo_doc;
	private $estado_tipo_doc;
	private $tipo_doc2;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
<?php
class TipoProducto{
	private $tipo_prod;
	private $estado_tipo_prod;
	

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
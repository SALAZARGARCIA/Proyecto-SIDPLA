<?php
class TipoProducto{
	private $tipo_prod;
	private $estado_tipo_prod;
	private $tipo_prod2;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
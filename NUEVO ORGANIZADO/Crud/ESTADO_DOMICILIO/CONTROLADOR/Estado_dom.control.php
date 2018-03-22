<?php
class EstadoDom{
	private $Estado_dom;
	private $estado_e_dom;
	private $Estado_dom2;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
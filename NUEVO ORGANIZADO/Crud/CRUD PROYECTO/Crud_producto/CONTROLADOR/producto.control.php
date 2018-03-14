<?php
class Producto{
	private $Cod_producto;
	private $Cod_producto2;
	private $Nom_prod;
	private $Desc_prod;
	private $Foto_prod;
	private $Stok_min;
	private $Stok_max;
	private $Cantidad_exist;
	private $tipo_producto_tipo_prod;
	private $tamaño_tamaño;
	private $Valor_unitario;

	public function __GET($k){ return $this->$k;}
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>
<?php
require_once'Database.php';
class Pedido_Producto {
	public $id;
	public $pedido_id;
  public $producto_id;
  public $cantidad;

	public function __construct($id,$pedido_id,$producto_id,$cantidad) {
			$this->id = $id;
			$this->pedido_id = $pedido_id;
			$this->producto_id = $producto_id;
	    $this->cantidad = $cantidad;
  }

	public function save(){
		$db = new Database();
		$sql = "INSERT INTO pedido_producto(id,pedido_id,producto_id,cantidad) VALUES(0,$this->pedido_id,$this->producto_id,$this->cantidad)";
		$db->query($sql);
		return true;
	}
}

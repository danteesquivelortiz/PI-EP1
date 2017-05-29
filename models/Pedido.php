<?php
require_once'Database.php';
class Pedido {
	public $id;
  public $fecha;
  public $cliente_id;

	public function __construct($id,$fecha,$cliente_id) {
			$this->id = $id;
			$this->fecha = $fecha;
			$this->cliente_id = $cliente_id;
  }

	public function save(){
		$db = new Database();
		$sql = "INSERT INTO pedido(id,fecha,cliente_id) VALUES(0,now(),$this->cliente_id)";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		return $lastId;
	}
}

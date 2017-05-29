<?php
require_once 'Database.php';
class Cliente{
  public $id;
  public $name;
  public $direccion;
  public $telefono;

  public function __construct($id,$name,$direccion,$telefono){
    $this->id = $id;
    $this->name = $name;
    $this->direccion = $direccion;
    $this->telefono = $telefono;
  }

  public function save(){
    $db = new Database();
    echo $this->name;
    $sql = "INSERT INTO cliente(nombre,direccion,telefono) VALUES('".$this->name."','".$this->direccion."','".$this->telefono."')";
    $db->query($sql);
    $db->close();
    return true;
  }

  static function get(){
		$db = new Database();
		$sql = "SELECT * FROM cliente";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}
}

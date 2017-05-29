<?php
require_once'Database.php';
class Product {
	public $id;
	public $name;
	public $price;
	public $category;
	public $description;

	public function __construct($id,$name, $price, $category, $description) {
			$this->id = $id;
			$this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;
  }


	//mysqli->insert_id
	// return rows
	public function save(){
		$db = new Database();
		$sql = "INSERT INTO producto(id,nombre,precio,categoria_id,descripcion) VALUES(0,'".$this->name."',$this->price,$this->category,'".$this->description."')";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return true;
	}

	public function delete(){
		$db = new Database();
		echo $this->id;
		$sql = "DELETE FROM producto WHERE id= $this->id";
		$db->query($sql);
		$db->close();
		return true;
	}

	public function update(){
		$db = new Database();
		$sql = "UPDATE producto SET precio=$this->price, descripcion='$this->description' WHERE id=$this->id";
		$db->query($sql);
		$db->close();
		return true;
	}

	static function get(){
		$db = new Database();
		$sql = "SELECT * FROM producto";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}

	static function getPasta(){
		$db = new Database();
		$sql = "SELECT * FROM producto WHERE categoria_id=2";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}

	static function getBebida(){
		$db = new Database();
		$sql = "SELECT * FROM producto WHERE categoria_id=4";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}

	static function getEnsaladas(){
		$db = new Database();
		$sql = "SELECT * FROM producto WHERE categoria_id=3";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}

	static function getPizzas(){
		$db = new Database();
		$sql = "SELECT * FROM producto WHERE categoria_id=1";
		if($rows = $db->query($sql)){
			return $rows;
		}
		return false;
	}
}

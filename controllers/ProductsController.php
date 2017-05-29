<?php

if( isset($_POST['funcion']) ) {
	//echo 'Hola AJAX '.$_POST['funcion'];
	if($_POST['funcion']=="insertarProductos"){
			require_once("../models/Product.php");
			require_once("../models/Cleaner.php");
			$productos = json_decode($_POST['productos']);
			foreach ($productos as $item) {
				$nombre = Cleaner::cleanInput($item->_nombre);
				$categoria = (int)Cleaner::cleanInput($item->_categoria);
				$producto= new Product(0,$item->_nombre,$item->_precio,$item->_categoria,$item->_descripcion);
				$producto->save();
			//$list = $producto->get();
			//var_dump($list);
			}
		}else {
			if($_POST['funcion']=="eliminarProducto"){
				require_once("../models/Product.php");
				require_once("../models/Cleaner.php");
				$producto =json_decode($_POST['productos']);
				$product = new Product($producto,"",0,0,"");
				$product->delete();

			}else{
				require_once("../models/Product.php");
				require_once("../models/Cleaner.php");
				$producto = json_decode($_POST['productos']);
				foreach($producto as $item){
					$ind= $item->_id;
					$actualizar = new Product($ind,$item->_nombre,$item->_precio,$item->_categoria,$item->_descripcion);
					$actualizar->update();
				}
			}
	}
} else {
	include_once("../models/Product.php");
	$productos = Product::get();
	$pizzas = Product::getPizzas();
	$ensal = Product::getEnsaladas();
	$beb = Product::getBebida();
	$past = Product::getPasta();
}

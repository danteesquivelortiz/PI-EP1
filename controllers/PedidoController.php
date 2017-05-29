<?php
  if(isset($_POST['funcion'])){
    if($_POST['funcion']=="registrarPedido"){
      require_once("../models/Pedido.php");
      require_once("../models/Pedido_Producto.php");
      $id = json_decode($_POST['indice']);
      $pedido = new Pedido(0,"",$id);
      $id = $pedido->save();
      $pedidos = json_decode($_POST['producto']);
      foreach ($pedidos as $item) {
        $pedido = new Pedido_Producto(0,$id,$item->_producto_id,$item->_cantidad);
        $pedido->save();
      }
    }
  } else{
    require_once("../models/Pedido.php");
  }

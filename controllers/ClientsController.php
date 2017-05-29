<?php
  if(isset($_POST['funcion'])){
    if($_POST['funcion']=="verificarUsuario"){
      require_once("../models/Cliente.php");
      $nom = $_POST['nombre'];
      $dir = $_POST['dir'];
      $cliente = new Cliente(0,$nom,$dir,"");
      $cliente = Cliente ::get();
      $ind = 0;
      foreach ($cliente as $cli) {
        if($cli['nombre']==$nom && $cli['direccion']==$dir){
          $ind = $cli['id'];
        }
      }
      header('Content-Type: application/json');
      $datos = array(
        'id' => $ind
      );
      echo json_encode($datos, JSON_FORCE_OBJECT);
    }else{
      if($_POST['funcion']=="insertarCliente"){
        require_once("../models/Cliente.php");
        $client = json_decode($_POST['clientes']);
        foreach ($client as $valor) {
          $cliente = new Cliente($valor->_id,$valor->_nombre,$valor->_direccion,$valor->_telefono);
          $cliente->save();
        }
      }
    }
  } else{
    require_once("../models/Cliente.php");
  }

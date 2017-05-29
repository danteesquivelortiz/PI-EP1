class Pedido_Producto{
  constructor(id,pedido_id,producto_id,cantidad){
    this._id= id;
    this._pedido_id = pedido_id;
    this._producto_id = producto_id;
    this._cantidad = cantidad;
  }

  get id(){
    return this._id;
  }
  set id(id){
    this._id = id;
  }

  get producto_id(){
    return this._producto_id;
  }
  set producto_id(producto_id){
    this._producto_id = producto_id;
  }

  get cantidad(){
    return this._cantidad;
  }
  set cantidad(cantidad){
    this._cantidad = cantidad;
  }

  get pedido_id(){
    return this._pedido_id;
  }
  set pedido_id(pedido_id){
    this._pedido_id = pedido_id;
  }

}

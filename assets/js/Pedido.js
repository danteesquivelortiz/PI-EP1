class Pedido{
  constructor(id,fecha,cliente_id){
    this._id= id;
    this._fecha = fecha;
    this._cliente_id = cliente_id;
  }

  get id(){
    return this._id;
  }
  set id(id){
    this._id = id;
  }

  get fecha(){
    return this._fecha;
  }
  set fecha(fecha){
    this._fecha = fecha;
  }

  get cliente_id(){
    return this._cliente_id;
  }
  set cliente_id(cliente_id){
    this._cliente_id = cliente_id;
  }

}

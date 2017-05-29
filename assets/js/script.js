class  Producto{
  constructor(id,nombre,precio,categoria,descripcion){
    this._id=id;
    this._nombre=nombre;
    this._precio = precio;
    this._categoria = categoria;
    this._descripcion = descripcion;
  }

  get id(){
    return this._id;
  }

  set id(id){
    this._id=id;
  }

  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }
  get precio(){
    return this._precio;
  }
  set precio(precio){
    this._precio=precio;
  }
  get categoria(){
    return this._categoria;
  }
  set categoria(categoria){
    this._categoria=categoria;
  }

  get descripcion(){
    return this._descripcion;
  }
  set descripcion(descripcion){
    this._descripcion=descripcion;
  }
}

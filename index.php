<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Iniciar</a>
          </div>
        </div>
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="./public/video.mp4" autoplay loop="">
      </video>
    </div>
		<div class="video-container vertical-center">
			<div class="front absolute card col-xs-12">
				<h2 class="white-text">Iniciar sesión</h2>
				<h5 class="white-text">Introduzca los datos que se solicitan</h5>
				<input type="text" class="form-control" id="nombre" value="" placeholder="Nombre de usuario:"><br>
				<input type="text" class="form-control" id="direccion" value="" placeholder="Ingrese dirección"><br>
				<button type="button" id="sesion" class="form-control btn-info">Login</button> <br>
        <button type="button" class=" btn btn-info form-control" data-toggle="modal" data-target="#registro">Registrarme</button>
			</div>
		</div>
    <div id="registro" class="modal fade col-sm-8"  role="dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4>Bienvenido al registro</h4></center>
        </div>
        <div class="modal-body">
          <p>
            Ingrese los datos correspondientes en el siguiente formulario y verifique los mismos.
          </p>
          <div class="form-group">
            <label>Nombre:</label>
            <input class="form-control" id="nombre2" type="text" placeholder="Ingrese nombre">
          </div>
          <div class="form-group">
            <label>Dirección:</label>
            <input class="form-control" id="direccion2" type="text" placeholder="Ingrese dirección">
          </div>
          <div class="form-group">
            <label>Telefono</label>
            <input class="form-control" id="telefono" type="number" maxlength="10">
          </div>
          <button type="button" id="registrar" class="btn btn-success">Registrar</button>
          <button type="button" class="btn btn-danger btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
        </div>
      </div>
    </div>
		<script src="./assets/js/Client.js" charset="utf-8"></script>
		<script type="text/javascript">
			let btn = document.querySelector("#sesion");
			btn.addEventListener('click',function(){
				let nom = document.querySelector("#nombre");
				let direccion = document.querySelector("#direccion");
				if(nom.value=="" || direccion.value==""){
          alert("Ingrese todos los datos");
        }else{
          $.ajax({
  					method: "POST",
  					url: "controllers/ClientsController.php",
  					data: { nombre: nom.value, dir: direccion.value, funcion: "verificarUsuario" }
  				})
          .done(function(respuesta){
            if(respuesta.id>0){
              location.href="views/menu.php?id="+respuesta.id;
            }else{
              alert("Datos incorrectos");
            }
          });
        }
			});
      let registro = document.querySelector("#registrar");
      registro.addEventListener('click',function(){
        let nombre = document.getElementById('nombre2')
        let dir = document.getElementById('direccion2')
        let tel = document.getElementById('telefono')
        if(nombre.value=="" || dir.value=="" || tel.value==""){
          alert("LLene todos los campos");
        }else{
          let cliente = new Client(0,nombre.value,dir.value,tel.value);
          let lista = new Array();
          lista.push(cliente);
          let datos = JSON.stringify(lista);
          $.ajax({
            method: "POST",
            url: "controllers/ClientsController.php",
            data: { clientes: datos, funcion: "insertarCliente" }
          })
          .done(function() {
              alert("Cliente añadido exitosamente");
              $('#registro').modal('hide');
           });
        }
      });
		</script>
  </body>
</html>

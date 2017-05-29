<?php
	include_once("../controllers/ProductsController.php");
?>
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
    <link rel="stylesheet" href="./../assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Inicio</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="AgregarProducto.php">Agregar Producto</a></li>
							<li class="active"><a href="AdministrarProductos.php">Administrar Productos</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="./../public/video.mp4" autoplay loop="">
      </video>
    </div>
    <div class="video-container vertical-center">
			<div class="front absolute card col-xs-12">
				<select class="form-control" name="" id="producto">
					<?php
					?>
					<script type="text/javascript">
						var lista_id = [];
						var lista_prec = [];
						var lista_descrip = [];
						var lista_cat = [];
						var lista_nom = [];
					</script>
					<?php
					foreach($productos as $producto){
					?>
						<option value="<?php echo $producto['id']?> "><?php echo $producto['nombre']?></option>
						<script type="text/javascript">
							lista_id.push(<?php echo $producto['id'] ?>);
							lista_prec.push(<?php echo $producto['precio'] ?>);
							lista_cat.push(<?php echo $producto['categoria_id'] ?>);
							lista_descrip.push("<?php echo $producto['descripcion']?>");
							lista_nom.push("<?php echo $producto['nombre']?>");
						</script>
					<?php
						}
					?>
        </select> <br>
        <button type="button" class="form-control btn-info" id="detalles">Ver detalles</button>
        <br>
        <button type="button" class="form-control btn-danger" id="eliminar">Eliminar</button>
				<br>
				<input type="number" id="precio" class="form-control" style="visibility:hidden;">
				<br>
				<textarea class="form-control" id="descripcion" style="visibility:hidden;"></textarea>
				<br>
				<button type="button" id="modificar" class="form-control btn-info" style="visibility:hidden;">Modificar</button>
        <script src="./../assets/js/script.js" charset="utf-8"></script>
        <script type="text/javascript">
				let opcion = document.querySelector("#producto");
				opcion.addEventListener('click',function(){
					let in_precio = document.getElementById('precio');
					let in_descrip = document.getElementById('descripcion');
					let mod = document.getElementById('modificar');
					in_precio.style.visibility="hidden";
					in_descrip.style.visibility="hidden";
					mod.style.visibility = "hidden";
				});
        let mostrar = document.querySelector("#detalles");
				var ind=0;
        mostrar.addEventListener('click',function(){
					var valor = document.querySelector("#producto").value;
					let in_precio = document.getElementById('precio');
					in_precio.style.visibility='visible';
					let in_descrip = document.getElementById('descripcion');
					in_descrip.style.visibility='visible';
					let mod = document.getElementById('modificar');
					mod.style.visibility="visible";
					for (var i = 0; i < lista_id.length; i++) {
						if(lista_id[i]==valor){
							in_precio.value = lista_prec[i];
							in_descrip.value = lista_descrip[i];
							ind=i;
						}
					}
        });
				let modificar = document.querySelector("#modificar");
				modificar.addEventListener('click',function(){
					var valor = document.querySelector("#producto").value;
					let precio = document.querySelector("#precio");
					let descripcion = document.querySelector("#descripcion");
					let producto = new Producto(valor,lista_nom[ind],precio.value,lista_cat[ind],descripcion.value);
					let lista = new Array();
					lista.push(producto);
					let producto_mod = JSON.stringify(lista);
					$.ajax({
					  method: "POST",
					  url: "../controllers/ProductsController.php",
					  data: { productos: producto_mod, funcion: "modificarProducto" }
					})
					.done(function() {
					   alert("Producto Modificado");
					 });
				});
        let eliminar = document.querySelector("#eliminar");
        eliminar.addEventListener('click',function(){
					let valor = document.querySelector("#producto");
					let producto = JSON.stringify(valor.value);
					$.ajax({
					  method: "POST",
					  url: "../controllers/ProductsController.php",
					  data: { productos: producto, funcion: "eliminarProducto" }
					})
					.done(function() {
					   alert("Producto Eliminado");
						 <?php
						 		$productos = Product::get();
						  ?>
					 });
        });
        </script>
			</div>
		</div>
  </body>
</html>

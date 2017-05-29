<!DOCTYPE html>
<?php
	include_once("../controllers/ProductsController.php");
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menú</title>
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
		<script type="text/javascript">
			var lista_pedidos = new Array();
			var lista_nombres = [];
			var lista_precios = [];
			var lista_ind = [];
		</script>
		<?php
		foreach($productos as $producto){
		?>
			<script type="text/javascript">
				lista_nombres.push("<?php echo $producto['nombre'] ?>");
				lista_precios.push(<?php echo $producto['precio'] ?>);
				lista_ind.push(<?php echo $producto['id'] ?>);
			</script>
		<?php
			}
		?>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="">Menú</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<button type="button" class="btn btn-default btn-sm" onclick="carrito();">
          				<span class="glyphicon glyphicon-shopping-cart"></span> Carrito
        				</button>
							</li>
							<li><a href="../index.php">Cerrar Sesión</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<div class="video-container">
			<video class="video" src="./../public/video.mp4" autoplay loop="">
			</video>
		</div>
    <div class="container">
			<center><h1 class="white-text">Seleccione una imagen para desplegar el catálogo</h1></center>
      <img height=200 widht=200 class="col-sm-3" onclick="abrir()" src="../public/Pizza.png">
      <img src="../public/ensalada.png" onclick="abrir_ensal();"  height=200 width=200 class="col-sm-3">
      <img src="../public/bebida.png" onclick="abrir_beb();" height=200 width=200 class="col-sm-3">
      <img src="../public/pasta.png" onclick="abrir_past();" height=200 width=200 class="col-sm-3">
    </div>
    <div id="pizza" class="collapse">
      <br>
      <div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-heading">Catálogo de Pizzas</div>
						<div class="panel-body" style="background-color:black">
              <p class="white-text">
                Seleccione una pizza del catálogo y la cantidad a solicitar de dicho producto.
              </p>
              <select class="form-control" id="cat_pizza">
                <script type="text/javascript">
                  var lista_id = [];
                  var lista_prec = [];
                  var lista_descrip = [];
                </script>
                <?php
      					foreach($pizzas as $producto){
      					?>
      						<option value="<?php echo $producto['id']?> "><?php echo $producto['nombre']?></option>
                  <script type="text/javascript">
      							lista_id.push(<?php echo $producto['id'] ?>);
      							lista_prec.push(<?php echo $producto['precio'] ?>);
      							lista_descrip.push("<?php echo $producto['descripcion']?>");
      						</script>
      					<?php
      						}
      					?>
              </select> <br>
              <div class="col-sm-5"></div>
              <input class="btn btn-info" type="button" id="ordenar_pizza" value="Pedido"><br><br>
              <div class="col-sm-3">
                <label class="white-text">Precio:</label>
              </div>
              <div class="col-sm-6">
                <input type="number" class="form-control" id="precio_pizza" style="visibility:hidden;" disabled>
              </div>
              <div class="col-sm-4"></div><br><br>
              <label class="white-text">Descripción:</label>
              <textarea rows="1" cols="70" id="descr_pizza" style="visibility:hidden;" disabled></textarea>
              <br><br>
              <input type="number" style="visibility:hidden;" class="form-control" id="cant_pizza"  min="1" max="15" placeholder="Ingrese cantidad a pedir"><br><br>
              <div class="col-sm-5"></div>
              <input type="button" style="visibility:hidden;" class="btn btn-success" id="pedir_pizza" value="Realizar Pedido">
						</div>
					</div>
				</div>
    </div>

		<div id="ensalada" class="collapse">
			<br>
			<div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-heading">Catálogo de Ensaladas</div>
						<div class="panel-body" style="background-color:black">
							<p class="white-text">
								Seleccione una ensalada del catálogo y la cantidad a solicitar de dicho producto.
							</p>
							<select class="form-control" id="cat_ensalada">
								<script type="text/javascript">
									var lista_id_ensal = [];
									var lista_prec_ensal = [];
									var lista_descrip_ensal = [];
								</script>
								<?php
								foreach($ensal as $producto){
								?>
									<option value="<?php echo $producto['id']?> "><?php echo $producto['nombre']?></option>
									<script type="text/javascript">
										lista_id_ensal.push(<?php echo $producto['id'] ?>);
										lista_prec_ensal.push(<?php echo $producto['precio'] ?>);
										lista_descrip_ensal.push("<?php echo $producto['descripcion']?>");
									</script>
								<?php
									}
								?>
							</select> <br>
							<div class="col-sm-5"></div>
							<input class="btn btn-info" type="button" id="ordenar_ensalada" value="Pedido"><br><br>
							<div class="col-sm-3">
								<label class="white-text">Precio:</label>
							</div>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="precio_ensalada" style="visibility:hidden;" disabled>
							</div>
							<div class="col-sm-4"></div><br><br>
							<label class="white-text">Descripción:</label>
							<textarea rows="1" cols="70" id="descr_ensalada" style="visibility:hidden;" disabled></textarea>
							<br><br>
							<input type="number" class="form-control" id="cant_ensalada" min="1" max="15" style="visibility:hidden;" placeholder="Ingrese cantidad a pedir"><br><br>
							<div class="col-sm-5"></div>
							<input type="button" class="btn btn-success" id="pedir_ensalada" style="visibility:hidden;" value="Realizar Pedido">
						</div>
					</div>
				</div>
		</div>

		<div id="bebida" class="collapse">
			<br>
			<div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-heading">Catálogo de Bebidas</div>
						<div class="panel-body" style="background-color:black">
							<p class="white-text">
								Seleccione una bebida del catálogo y la cantidad a solicitar de dicho producto.
							</p>
							<select class="form-control" id="cat_bebida">
								<script type="text/javascript">
									var lista_id_beb = [];
									var lista_prec_beb = [];
									var lista_descrip_beb = [];
								</script>
								<?php
								foreach($beb as $producto){
								?>
									<option value="<?php echo $producto['id']?> "><?php echo $producto['nombre']?></option>
									<script type="text/javascript">
										lista_id_beb.push(<?php echo $producto['id'] ?>);
										lista_prec_beb.push(<?php echo $producto['precio'] ?>);
										lista_descrip_beb.push("<?php echo $producto['descripcion']?>");
									</script>
								<?php
									}
								?>
							</select> <br>
							<div class="col-sm-5"></div>
							<input class="btn btn-info" type="button" id="ordenar_bebida" value="Pedido"><br><br>
							<div class="col-sm-3">
								<label class="white-text">Precio:</label>
							</div>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="precio_bebida" style="visibility:hidden;" disabled>
							</div>
							<div class="col-sm-4"></div><br><br>
							<label class="white-text">Descripción:</label>
							<textarea rows="1" cols="70" id="descr_bebida" style="visibility:hidden;" disabled></textarea>
							<br><br>
							<input type="number" class="form-control" id="cant_bebida" min="1" max="15" style="visibility:hidden;" placeholder="Ingrese cantidad a pedir"><br><br>
							<div class="col-sm-5"></div>
							<input type="button" class="btn btn-success" id="pedir_bebida" style="visibility:hidden;" value="Realizar Pedido">
						</div>
					</div>
				</div>
		</div>

		<div id="pasta" class="collapse">
			<br>
			<div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-heading">Catálogo de Pastas</div>
						<div class="panel-body" style="background-color:black">
							<p class="white-text">
								Seleccione una pasta del catálogo y la cantidad a solicitar de dicho producto.
							</p>
							<select class="form-control" id="cat_pasta">
								<script type="text/javascript">
									var lista_id_past = [];
									var lista_prec_past = [];
									var lista_descrip_past = [];
								</script>
								<?php
								foreach($past as $producto){
								?>
									<option value="<?php echo $producto['id']?> "><?php echo $producto['nombre']?></option>
									<script type="text/javascript">
										lista_id_past.push(<?php echo $producto['id'] ?>);
										lista_prec_past.push(<?php echo $producto['precio'] ?>);
										lista_descrip_past.push("<?php echo $producto['descripcion']?>");
									</script>
								<?php
									}
								?>
							</select> <br>
							<div class="col-sm-5"></div>
							<input class="btn btn-info" type="button" id="ordenar_pasta" value="Pedido"><br><br>
							<div class="col-sm-3">
								<label class="white-text">Precio:</label>
							</div>
							<div class="col-sm-6">
								<input type="number" class="form-control" id="precio_pasta" style="visibility:hidden;" disabled>
							</div>
							<div class="col-sm-4"></div><br><br>
							<label class="white-text">Descripción:</label>
							<textarea rows="1" cols="70" id="descr_pasta" style="visibility:hidden;" disabled></textarea>
							<input type="number" class="form-control" id="cant_pasta" style="visibility:hidden;" min="1" max="15" placeholder="Ingrese cantidad a pedir"><br><br>
							<div class="col-sm-5"></div>
							<input type="button" class="btn btn-success" id="pedir_pasta" style="visibility:hidden;" value="Realizar Pedido">
						</div>
					</div>
				</div>
		</div>

		<div id="carrito" class="collapse">
			<br>
			<div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-heading">Listado</div>
						<div class="panel-body" style="background-color:black">
							<table id="tabla" class="table table-bordered ">
							</table><br>
							<label><h2>Total a pagar:</h2></label>
							<input type="number" id="total" class="" disabled>
							<br>
							<div class="col-sm-5">
							</div>
							<div class="col-sm-3">
								<input type="button" id="registrar" class="btn btn-info" onclick="window.open('pdf_exportar.php?tot=<?php $var?>','','width=700,height=400,noresize')" value="Registrar Pedido">
							</div>
						</div>
					</div>
				</div>
		</div>
		<script src="./../assets/js/Pedido_Producto.js" charset="utf-8"></script>
    <script type="text/javascript">
      function abrir(){
        if( $('#pizza').is(":visible") ){
            $('#pizza').collapse('hide');
          }else{
            $('#pizza').collapse('show');
            $('#ensalada').collapse('hide');
						$('#bebida').collapse('hide');
						$('#pasta').collapse('hide');
						$('#carrito').collapse('hide');
            let mostrar = document.querySelector("#ordenar_pizza");
            mostrar.addEventListener('click',function(){
							var can = document.getElementById('cant_pizza');
							can.style.visibility='visible';
    					var valor = document.querySelector("#cat_pizza").value;
    					let in_precio = document.getElementById('precio_pizza');
    					in_precio.style.visibility='visible';
    					let in_descrip = document.getElementById('descr_pizza');
    					in_descrip.style.visibility='visible';
    					let mod = document.getElementById('pedir_pizza');
    					mod.style.visibility="visible";
    					for (var i = 0; i < lista_id.length; i++) {
    						if(lista_id[i]==valor){
    							in_precio.value = lista_prec[i];
    							in_descrip.value = lista_descrip[i];
    						}
    					}
            });
        }
      }

			function abrir_ensal(){
        if( $('#ensalada').is(":visible") ){
            $('#ensalada').collapse('hide');
          }else{
            $('#pizza').collapse('hide');
            $('#ensalada').collapse('show');
						$('#bebida').collapse('hide');
						$('#pasta').collapse('hide');
						$('#carrito').collapse('hide');
            let mostrar = document.querySelector("#ordenar_ensalada");
            mostrar.addEventListener('click',function(){
							var can = document.getElementById('cant_ensalada');
							can.style.visibility='visible';
    					var valor = document.querySelector("#cat_ensalada").value;
    					let in_precio = document.getElementById('precio_ensalada');
    					in_precio.style.visibility='visible';
    					let in_descrip = document.getElementById('descr_ensalada');
    					in_descrip.style.visibility='visible';
    					let mod = document.getElementById('pedir_ensalada');
    					mod.style.visibility="visible";
    					for (var i = 0; i < lista_id_ensal.length; i++) {
    						if(lista_id_ensal[i]==valor){
    							in_precio.value = lista_prec_ensal[i];
    							in_descrip.value = lista_descrip_ensal[i];
    						}
    					}
            });
        }
      }

			function abrir_beb(){
				if( $('#bebida').is(":visible") ){
						$('#bebida').collapse('hide');
					}else{
						$('#pizza').collapse('hide');
						$('#ensalada').collapse('hide');
						$('#bebida').collapse('show');
						$('#pasta').collapse('hide');
						$('#carrito').collapse('hide');
						let mostrar = document.querySelector("#ordenar_bebida");
						mostrar.addEventListener('click',function(){
							var can = document.getElementById('cant_bebida');
							can.style.visibility='visible';
							var valor = document.querySelector("#cat_bebida").value;
							let in_precio = document.getElementById('precio_bebida');
							in_precio.style.visibility='visible';
							let in_descrip = document.getElementById('descr_bebida');
							in_descrip.style.visibility='visible';
							let mod = document.getElementById('pedir_bebida');
							mod.style.visibility="visible";
							for (var i = 0; i < lista_id_beb.length; i++) {
								if(lista_id_beb[i]==valor){
									in_precio.value = lista_prec_beb[i];
									in_descrip.value = lista_descrip_beb[i];
								}
							}
						});
				}
			}

			function abrir_past(){
				if( $('#pasta').is(":visible") ){
						$('#pasta').collapse('hide');
					}else{
						$('#pizza').collapse('hide');
						$('#ensalada').collapse('hide');
						$('#bebida').collapse('hide');
						$('#pasta').collapse('show');
						$('#carrito').collapse('hide');
						let mostrar = document.querySelector("#ordenar_pasta");
						mostrar.addEventListener('click',function(){
							var can = document.getElementById('cant_pasta');
							can.style.visibility='visible';
							var valor = document.querySelector("#cat_pasta").value;
							let in_precio = document.getElementById('precio_pasta');
							in_precio.style.visibility='visible';
							let in_descrip = document.getElementById('descr_pasta');
							in_descrip.style.visibility='visible';
							let mod = document.getElementById('pedir_pasta');
							mod.style.visibility="visible";
							for (var i = 0; i < lista_id_past.length; i++) {
								if(lista_id_past[i]==valor){
									in_precio.value = lista_prec_past[i];
									in_descrip.value = lista_descrip_past[i];
								}
							}
						});
				}
			}

			function carrito(){
						$('#tabla').empty();
						$('#pizza').collapse('hide');
						$('#ensalada').collapse('hide');
						$('#bebida').collapse('hide');
						$('#pasta').collapse('hide');
						$('#carrito').collapse('show');
						var d = '<thead>'+'<tr>'+
						'<th>Nombre</th>'+
						'<th>Cantidad</th>'+
						'<th>Total</th>'+
						'</tr>'+'</thead>'+'<tbody>';
						var objecto;
						let nom;
						let precio;
						let total=0;
						for (var item in lista_pedidos) {
							objecto = lista_pedidos[item];
							for (var i = 0; i < lista_ind.length; i++) {
								if(lista_ind[i]== objecto['producto_id']){
									nom = lista_nombres[i];
									precio = lista_precios[i] * objecto['cantidad'];
									total+=precio;
								}
							}
							d+= '<tr>'+
						 '<td>'+nom+'</td>'+
						 '<td>'+objecto['cantidad']+'</td>'+
						 '<td>'+precio+'</td>'+
						 '</tr>';
						 }
						 d+='</tbody>';
						 let tot = document.getElementById('total');
						 tot.value=total;
						 var tota=total;
						 alert(tota);
						 $("#tabla").append(d);
						 <?php
						 $var="<script> document.write(tota) </script>";
						 ?>
			}

			let mod = document.querySelector("#pedir_pizza");
			mod.addEventListener('click',function () {
				let ind = document.querySelector("#cat_pizza").value;
				let cant = document.querySelector("#cant_pizza").value;
				if(cant==""){
					alert("Falta ingresar cantidad");
				}else{
					if(ind==""){
						alert("No existe producto");
					}else{
						let pedido = new Pedido_Producto(0,0,ind,cant);
						lista_pedidos.push(pedido);
						alert("Producto añadido a la lista");
					}
				}
			});

			let ens = document.querySelector("#pedir_ensalada");
			ens.addEventListener('click',function () {
				let ind = document.querySelector("#cat_ensalada").value;
				let cant = document.querySelector("#cant_ensalada").value;
				if(cant==""){
					alert("Falta ingresar cantidad");
				}else{
					if(ind==""){
						alert("No existe producto");
					}else{
						let pedido = new Pedido_Producto(0,0,ind,cant);
						lista_pedidos.push(pedido);
						alert("Producto añadido a la lista");
					}
				}
			});

			let beb = document.querySelector("#pedir_bebida");
			beb.addEventListener('click',function () {
				let ind = document.querySelector("#cat_bebida").value;
				let cant = document.querySelector("#cant_bebida").value;
				if(cant==""){
					alert("Falta ingresar cantidad");
				}else{
					if(ind==""){
						alert("No existe producto");
					}else{
						let pedido = new Pedido_Producto(0,0,ind,cant);
						lista_pedidos.push(pedido);
						alert("Producto añadido a la lista");
					}
				}
			});

			let past = document.querySelector("#pedir_pasta");
			past.addEventListener('click',function () {
				let ind = document.querySelector("#cat_pasta").value;
				let cant = document.querySelector("#cant_pasta").value;
				if(cant==""){
					alert("Falta ingresar cantidad");
				}else{
					if(ind==""){
						alert("No existe producto");
					}else{
						let pedido = new Pedido_Producto(0,0,ind,cant);
						lista_pedidos.push(pedido);
						alert("Producto añadido a la lista");
					}
				}
			});

			let reg = document.querySelector("#registrar");
			reg.addEventListener('click',function() {
					if(lista_pedidos.length==0){
						alert("No hay pedidos aun");
					}else{
						let ped = JSON.stringify(lista_pedidos);
						console.log(ped);
						$.ajax({
						  method: "POST",
						  url: "../controllers/PedidoController.php",
						  data: { producto: ped, indice: id, funcion: "registrarPedido" }
						})
						.done(function() {
							alert("Pedido realizado exactamente");
							lista_pedidos = [];
						 });
					}
			});

    </script>
    <script type="text/javascript">
    function getParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
      results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    </script>
    <script type="text/javascript">
    var id = getParameterByName('id');
    </script>
  </body>
</html>

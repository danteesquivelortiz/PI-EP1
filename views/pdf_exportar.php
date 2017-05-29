<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script type="text/javascript">
			var lista_pedidos = new Array();
			var lista_nombres = [];
			var lista_precios = [];
			var lista_ind = [];
		</script>
    <div id="carrito" class="collapse">
			<br>
			<div class="col-sm-3"></div>
				<div class="panel-group col-sm-6">
					<div class="panel panel-info">
						<div class="panel-body">
              <h1>Factura del pedido</h1><br>
							<table id="tabla" class="table table-bordered ">
							</table><br>
							<label><h2>Total a pagar: <?php
              $tota=($_GET['tot']);
              echo $tota;?></h2></label>
							<br>
							<div class="col-sm-5">
							</div>
						</div>
					</div>
				</div>
		</div>
  </body>
</html>
<script type="text/javascript">
  function carrito(){
      $('#tabla').empty();
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
       $("#tabla").append(d);
  }
</script>

<?php
include_once("../controllers/ProductsController.php");
require_once '../assets/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf=new Dompdf();
$dompdf->loadHtml(ob_get_clean());
$dompdf->render();
$pdf=$dompdf->output();
$filename='cuenta.pdf';
$dompdf->render();

$dompdf->stream($filename,array('Attachment'=>0));
?>

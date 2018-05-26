<?Php
session_start();
    if(isset($_SESSION['admin'])){
    $nombre=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Distribuidora Baesa</title>
		<meta name="description" content="Blueprint: Responsive Full Width Tabs" />
		<meta name="keywords" content="responsive tabs, full width tabs, template, blueprint" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" href="../css/font-awesome.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrapValidator.css"/>
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<link rel="stylesheet" href="../css/bootstrap-table.min.css">
		<link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" />
		<style>
			.typeahead{
				font-size: 19px;
			}
		</style>
	</head>
	<body class="cbp-spmenu-push">
				<div class="">
					<ul id="gn-menu" class="gn-menu-main">
						<li class="gn-trigger">
							<div align="center"><a href="#" id="showLeftPush" onclick="return false;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a></div>
						</li>
						<li>
							<div class="btn-group">
							<a href="#" class="menombre dropdown-toggle" data-toggle="dropdown"><span><?php echo $nombre; ?></span></a>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="../php/salirsesion.php" class="" id="opciones">Salir</a></li>
							  </ul>
							</div>
						</li>
					</ul>
					<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
						<h3>Menu</h3>
						<a href="notapedido.php">Menu Principal</a>
						<a href="listapedidos.php">Lista de Pedidos</a>
						<a href="productos.php">Productos</a>
						<a href="cliente.php">Clientes</a>
						<a href="cobranzaclient.php">Cobranza</a>
					</nav>
				</div>
		<div class="container">
		<div align="center"><span align="center" class="titulo1">PEDIDO DE ARCHER</span></div>
					<section id="section-2">
						<div id="fechaid1" align="center"></div>
						<div class="row">
							<div class="col-md-9">
								<form id="datoscliar">
									<label for="names-one" class="visible-xs centro">Nombre</label>
									<div class="input-group" style="width: 100%;">
										<span class="input-group-addon hidden-xs"><label for="names-one">NOMBRE</label></span>
										<input type="text" class="form-control typeahead" id="names-one" name="names-one">
									</div>
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="codcli1">COD CLI</label></span>
										<input type="text" class="form-control inputsinestilo" id="codcli1" name="codcli1" readonly>
									</div>
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="dir1">DIRECCION</label></span>
										<input type="text" class="form-control inputsinestilo" id="dir1" name="dir1" readonly>
									</div>
									<div class="input-group cien oculto2">
										<span class="input-group-addon hidden-xs"><label for="vendedor1">VENDEDOR</label></span>
										<input type="text" class="form-control inputsinestilo" id="vendedor1" name="vendedor1" readonly>
									</div>
							</div>
							<div class="col-md-3">
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="celular1">CELULAR</label></span>
										<input type="text" class="form-control inputsinestilo" id="celular1" name="celular1">
									</div>
									<div class="checkbox" align="right">
									  <label>
									    <input type="checkbox" id="inputprueba" name="inputprueba">
									    F
									  </label>
									</div>
									<div class="input-group cien n1">
										<label for="nombrenit1" class="visible-xs centro">Nombre nit</label>
										<span class="input-group-addon hidden-xs"><label for="nombrenit1">NOMBRE NIT</label></span>
										<input type="text" class="form-control" id="nombrenit1" name="nombrenit1">
									</div>
									<div class="input-group cien n1">
										<label for="nit1" class="visible-xs centro">Numero Nit</label>
										<span class="input-group-addon hidden-xs"><label for="nit1">NIT</label></span>
										<input type="text" class="form-control" id="nit1" name="nit1">
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<h3 align="center">PEDIDOS</h3>
							<select name="tipos" id="tipos" class="form-control">
								<option value="0">Seleccionar Tipo</option>
							</select>
							<h3 align="center">PRODUCTOS</h3>
							<div class="input-group">
								<select name="tipProd" id="tipProd" class="form-control">
									<option value="0">Seleccionar Tipo</option>
								</select>
								<span class="input-group-btn">
						          <a href="#" class="btn btn-default" id="addprod">Agregar</a>
						        </span>	
							</div>
							<table id="table1"
					               data-toggle="table"
					               data-toolbar="#toolbar">
					            <thead>
					            <tr>
					                <th data-field="id">Producto</th>
					                <th data-field="name">Cantidad</th>
					                <th data-field="price">Precio</th>
					                <th data-field="total">Total</th>
					            </tr>
					            </thead>
					        </table>
					        <div id="totala" name="totala" class="pull-right" style="font-size:30px;">
							</div>
								<div align="center">
									<textarea class="form-control" name="obsa" id="obsa" cols="50" rows="2" placeholder="Observaciones" form="datoscliar"></textarea>
								</div>	
						</div><br>
						<div class="row">
							<div class="centro">
								<a href="#" class="btn btn-primary" id="enviarar">Enviar Pedido</a>
								<a href="archer.php" class="btn btn-success">Nuevo Pedido</a>
							</div>
						</div><br><br>
						<div align="center">
							<i class="fa fa-spin fa-spinner fa-3x oculto"></i>
							<h3 id="mensaje3ar"></h3>
						</div>						
					</section>
		</div>
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/cbpFWTabs.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/pedido.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
			showLeftPush.onclick = function(e) {
				e.preventDefault();
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
			$(".n1").hide();
			$("input[name=inputprueba]").change(function(){
				$(".n1").toggle();
			});

			$.getJSON("../php/operacionget.php", { ope: "archerTipo" })
			  .done(function(respuesta) {
			  	for (var i = 0; i<respuesta.length; i++) {
			  		$("#tipos").append('<option value="'+respuesta[i]+'">'+respuesta[i].toUpperCase()+'</option>');
			  	}
			});

			$("#tipos").change(function(){
		        var valor=$(this).val();
		        //console.log(valor);
		        $('#tipProd').html('');
			    $.getJSON("../php/operacionget.php", { ope: "archerTipo2",valor:valor })
				  .done(function(respuesta) {
				  	for (var i = 0; i<respuesta.length; i++) {
				  		$("#tipProd").append('<option value="'+respuesta[i]+'">'+respuesta[i].toUpperCase()+'</option>');
				  	}
				});
			});
			var $table = $('#table1');
			var to=0;
			var par=0;
			$('#addprod').on('click',function(e){
				e.preventDefault();
				var producto=$('#tipProd').val();
				$.getJSON("../php/operacionget.php", { ope: "archerTipo4",valor:producto })
				  .done(function(respuesta) {
				  	//console.log(respuesta);
				  	swal({
				      title: ''+producto,
				      text: 'Unidades '+respuesta[0]+' Precio '+respuesta[1]+' Bs.',
				      input: 'tel',
				      showCancelButton: true,
				      inputValidator: function (value) {
				        return new Promise(function (resolve, reject) {
				          if (parseInt(value)<=parseInt(respuesta[0])) {
				            resolve()
				          } else {
				            reject('El monto no puede ser mayor que el saldo!')
				          }
				        })
				      }
				    }).then(function (result) {
				      swal({
				        type: 'success'
				      });
				      par=parseInt(result)*parseInt(respuesta[1]);
				      $table.bootstrapTable('insertRow', {
				          index: 0,
				          row: {
				              id: producto,
				              name: result,
				              price: respuesta[1],
				              total: par
				          }
				      });
				      to=to+parseInt(par);
				      $('#totala').html(""+to);
				    });
				});
			});

		</script>
	<?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>
	</body>
</html>

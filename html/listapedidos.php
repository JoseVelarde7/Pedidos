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
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<link rel="stylesheet" href="../css/bootstrap-table.min.css">
		<link rel="stylesheet" href="../css/sweetalert2.min.css">
	</head>
	<style>
		#modaltabla2{
		}
	</style>
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
						<a href="notapedido.php">Nota de Pedido</a>
						<a href="listapedidos.php">Lista de Pedidos</a>
						<a href="productos.php">Productos</a>
						<a href="cliente.php">Clientes</a>
					</nav>
				</div>
		<div class="container-fluid">
			<div><br>
				<a href="#" id="listar-pedido" class="btn btn-success">Mostrar/Actualizar</a>
			</div>
			<table id="table-pedido" data-search="true" data-smart-display="true" data-row-style="rowStyle" data-show-toggle="true" data-pagination="true" data-mobile-responsive="true">
			</table>
			<div id="estado">
				
			</div>

			<div class="modal fade" id="modaltabla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span></button>
	                        <h4 class="modal-title" id="nompd" align="center"></h4>
	                    </div>
	                    <div class="modal-body">
	                    	<span>Fecha: <div id="fechapd"></div></span>
	                    	<span>NIT: <div id="nomnitpd"></div><div id="numnitpd"></div></span>
	                        <table id="mostrarmen" data-smart-display="true" data-mobile-responsive="true">
							</table>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="modal fade" id="modaltabla2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	            <div class="modal-dialog" style="">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span></button>
	                        <div id="ides"></div><h4 class="modal-title" id="nompd1" align="center"></h4>
	                    </div>
	                    <div class="modal-body">
	                    	<span>Fecha: <div id="fechapd1"></div></span>
	                    	<span>NIT: <div id="nomnitpd1"></div><div id="numnitpd1"></div></span>
	                        <table id="mostrarmen1" data-smart-display="true" data-mobile-responsive="true">
							</table><br>
							<label>
								<input type="checkbox" id="inputprueba" name="inputprueba" form="lis-pro">
								Adicionar Productos
							</label>
							<div class="ocultar">
								<div class="table-responsive">
									<form id="lis-pro">
										<table  class="table table-inverse">
										  <thead>
										    <tr>
										      <th width="5%">#</th>
										      <th width="40%">Nombre</th>
										      <th width="15%">Cantidad</th>
										      <th width="20%">Precio</th>
										      <th width="20%">Total</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										       <th>1</th>
											   <td>	
											   		<div class="form-group">
											   		<select name="name1" id="name1" class="form-control carga carga1">
											   			<option value="">Seleccionar Producto</option>
											   		</select>
											   		</div>
											   </td>
											   <td>
											   		<div class="form-group">
											   		<input type="text" class="form-control" id="cantidad1" name="cantidad1" placeholder="Cantidad" onkeyup="sumar(cantidad1,precio1,total1)">
											   		</div>
											   </td>
											   <td>
											   		<div class="form-group">
											   			<input type="text" class="form-control" id="precio1" name="precio1" placeholder="Precio" onkeyup="sumar(cantidad1,precio1,total1)">	
											   		</div>
											   </td>
											   <td><div id="total1">0</div></td>
											   <td class="oculto2">
											   	  <div id="ca-al1"></div>	
											   </td>	
										    </tr>
										    <tr id="fila1">
										      <th>2</th>
										      <td>	
										      		<div class="form-group">
										      		<select name="name2" id="name2" class="form-control carga1">
										      			<option value="">Seleccionar Producto</option>
											   		</select>
											   		</div>
										      </td>
										      <td>
										      	<div class="form-group">
										      	<input type="text" class="form-control" id="cantidad2" name="cantidad2" placeholder="Cantidad" onkeyup="sumar(cantidad2,precio2,total2)">
										      	</div>
										      </td>
										      <td>
										      	<div class="form-group">
										      	<input type="text" class="form-control" id="precio2" name="precio2" placeholder="Precio"        
										          onkeyup="sumar(cantidad2,precio2,total2)">
										         </div>
										        </td>
										      <td><div id="total2">0</div></td>
										      <td class="oculto2">
										      	  <div id="ca-al2"></div>	
										      </td>
										    </tr>
										    <tr id="fila2">
										      <th>3</th>
										      <td>
										      		<div class="form-group">
										      		<select name="name3" id="name3" class="form-control carga1">
										      			<option value="">Seleccionar Producto</option>
											   		</select>
											   		</div>
										      </td>
										      <td><div class="form-group"><input type="text" class="form-control" id="cantidad3" name="cantidad3" placeholder="Cantidad" onkeyup="sumar(cantidad3,precio3,total3)"></div></td>
										      <td><div class="form-group"><input type="text" class="form-control" id="precio3" name="precio3" placeholder="Precio" onkeyup="sumar(cantidad3,precio3,total3)"></div></td>
										      <td><div id="total3">0</div></td>
										      <td class="oculto2">
										      	  <div id="ca-al3"></div>	
										      </td>
										    </tr>
										  </tbody>
										</table>
										<div id="total" class="pull-right">
										</div>
									</form>
								</div>
								<div class="pull-right">
									<a href="#" class="btn btn-success" id="mas">+</a>
									<a href="#" class="btn btn-danger" id="menos">-</a>
								</div><br>
								<a href="#" class="btn btn-primary" id="change-agregar">Adicionar</a>
							</div>

	                    </div>
	                    <div class="modal-footer">
	                    	<div align="center" id="resmodifica" style="font-size:25px;">
	                    		
	                    	</div>
	                    	<a href="#" class="btn btn-primary"  data-dismiss="modal" id="change">Salir</a>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../js/table-mobile.js"></script>
		<script src="../js/pedido.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
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
			$(".ocultar").hide();
			$("input[name=inputprueba]").change(function(){
				$(".ocultar").toggle();
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

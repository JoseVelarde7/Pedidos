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
						<a href="listapedidos2.php">Lista de Pedidos</a>
						<a href="productos2.php">Productos</a>
						<a href="cliente2.php">Clientes</a>
						<!--<a href="#">Dandelion bunya</a>
						<a href="#">Rutabaga</a>-->
					</nav>
				</div>
		<div class="containerm">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-lab"><span>Lista de Productos</span></a></li>
						<li><a href="#section-2" class="icon-cup"><span>Registrar Producto</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Modificar / Eliminar</span></a></li>
						<li><a href="#section-4" class="icon-food"><span>Importar Productos</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						<div align="right"><br>
							<a href="#" id="listar-prod" class="btn btn-danger">Mostrar Productos</a>
						</div>
						<table id="table2" data-search="true" data-smart-display="true" data-show-toggle="true" data-pagination="true">
						</table>
					</section>
					<section id="section-2">
						<br>	
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<form id="formulario2">
								<div class="form-group">
								    <label for="codigo">CODIGO</label>
								    <input type="text" class="form-control" id="codigop" name="codigop">
								</div>
								<div class="form-group">
								    <label for="nombre">NOMBRE</label>
								    <input type="text" class="form-control" id="nombrep" name="nombrep">
								</div>
								<div class="form-group">
								    <label for="direccion">UNIDAD</label>
								    <input type="text" class="form-control" id="unidadp" name="unidadp">
								</div>
								<div class="form-group">
								    <label for="celular">ALMACEN</label>
								    <input type="text" class="form-control" id="almacenp" name="almacenp">
								</div>
								<div class="form-group">
								    <label for="nombrenit">PRECIO</label>
								    <input type="text" class="form-control" id="preciop" name="preciop">
								</div>
								<div class="form-group">
								    <label for="nombrenit">TIPO</label>
								    <select class="form-control" id="tipo" name="tipo">
								    	<option value="1">MANTECAS Y OTROS</option>
								    	<option value="0">ARCHER</option>
								    </select>
								</div>
								<div class="form-group">
								    <label for="nit">OBSERVACION</label>
								    <input type="text" class="form-control" id="obsp" name="obsp">
								</div>
								<div class="formss-group" align="center">
								    <a href="#" class="btn btn-primary" id="reg-prod">Registrar</a>
								    <input id="resetear" class="btn btn-danger" type="reset" value="nuevo">
								</div><br>
								<div align="center">
									<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
									<h3 id="mensaje2"></h3>
								</div>
							</form>
						</div>
					</section>
					<section id="section-3">
						<br>
						<label for="buscod" class="visible-xs centro">Nombre</label>
						<div class="input-group col-md-8 col-md-offset-2">
							<span class="input-group-addon hidden-xs"><label for="buscod">NOMBRE</label></span>
							<!--<input type="text" class="form-control carga22 carga12 typeahead" id="prod-carga" name="prod-carga">-->
							<select class="form-control carga22 carga12" name="prod-carga" id="prod-carga">
								<option value="">SELECCIONAR PRODUCTO</option>
							</select>
						</div>
						<div class="form-group oculto2 col-md-8 col-md-offset-2">
							<form id="formulario4" name="formulario2">
								<h4><label>CODIGO: </label><input type="text" class="form-control letra" id="showprod" name="showprod" disabled></h4>
							    <h4><label>NOMBRE: </label><input type="text" class="form-control letra" id="showcod" name="showcod" disabled></h4>
							    <h4><label>UNIDAD: </label><input type="text" class="form-control letra" id="showunidad" name="showunidad" disabled></h4>
							    <h4><label>UNIDADES EN ALMACEN: </label><input type="text" class="form-control letra" id="showalm" name="showalm" disabled></h4>
							    <h4><label>PRECIO: </label><input type="text" class="form-control letra" id="showprecio" name="showprecio" disabled></h4>
							    <h4><label>OBSERVACION: </label><input type="text" class="form-control letra" id="showobs" name="showobs" disabled></h4>
							    <button class="btn btn-warning" id="editar-prod" style="display:none">Modificar</button>
							    <div align="center">
									<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
									<h3 id="mensaje3"></h3>
								</div>
								<div>
									<a href="#" class="btn btn-danger pull-right" id="modificar-prod">Editar</a>
									<a href="#" class="btn btn-success pull-right" id="editar-prod" style="display:none">Modificar Cambios</a>
								</div>
							</form>
						</div>
					</section>
					<section id="section-4">
						<div class="form-group" align="center"><br><br>
							<form action="../php/importarProductos.php" enctype="multipart/form-data" method="post">
							   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
							   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
								<br>
							   <input class="btn btn-success btn-lg" name="enviar" type="submit" value="IMPORTAR ARCHIVO" />
							</form>
						</div>
					</section>
				</div>
			</div>
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.Baesa.com.bo</a></p>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/cbpFWTabs.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../js/pedido.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
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
		</script>
	<?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>	
	</body>
</html>

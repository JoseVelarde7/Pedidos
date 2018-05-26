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
						<li><a href="#section-1" class="icon-food"><span> Lista de Clientes</span></a></li>
						<li><a href="#section-2" class="icon-lab"><span>Registrar Cliente</span></a></li>
						<li><a href="#section-3" class="icon-cup"><span>Modificar / Eliminar</span></a></li>
						<li><a href="#section-4" class="icon-cup"><span>Importar clientes</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						<div><br>
							<a href="#" id="listar-cli2" class="btn btn-success">Mostrar Clientes</a>
						</div>
						<table id="table" data-search="true" data-smart-display="true" data-show-toggle="true" data-pagination="true" data-mobile-responsive="true">
						</table>
					</section>
					<section id="section-2">
						<br>	
						<div class="col-sm-12 col-md-8 col-md-offset-2">
							<form id="formulario1">
								<div class="form-group">
								    <label for="codigo">CODIGO</label>
								    <input type="text" class="form-control" id="codigo" name="codigo">
								</div>
								<div class="form-group">
								    <label for="nombre">NOMBRE</label>
								    <input type="text" class="form-control" id="nombre" name="nombre">
								</div>
								<div class="form-group">
								    <label for="direccion">DIRECCION</label>
								    <input type="text" class="form-control" id="direccion" name="direccion">
								</div>
								<div class="form-group">
								    <label for="celular">CELULAR</label>
								    <input type="text" class="form-control" id="celular" name="celular" value="0">
								</div>
								<div class="form-group">
								    <label for="nombrenit">NOMBRE DEL NIT</label>
								    <input type="text" class="form-control" id="nombrenit" name="nombrenit">
								</div>
								<div class="form-group">
								    <label for="nit">NIT</label>
								    <input type="text" class="form-control" id="nit" name="nit">
								</div>
								<div class="form-group">
								  <label for="vendedor">Vendedor</label>
								  <select class="form-control" id="vendedor" name="vendedor">
								    <option value="11">Macario</option>
								    <option value="14">Rodrigo</option>
								    <option value="20">Bertha</option>
								    <option value="22">Johana</option>
								    <option value="10">William</option>
								    <option value="21">Marcelo</option>
								    <option value="25">Caros</option>
								    <option value="24">Sandra</option>
								    <option value="29">Antonio</option>
								  </select>
								</div>
								<div class="formss-group" align="center">
								    <a href="#" class="btn btn-primary" id="boton">Registrar</a>
								    <input id="resetear" class="btn btn-danger" type="reset" value="nuevo">
								</div><br>
								<div align="center">
									<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
									<h3 id="mensaje"></h3>
								</div>
							</form>
						</div>
					</section>
					<section id="section-3">
						<br>
						<label for="buscod" class="visible-xs centro">Nombre</label>
						<div class="input-group col-md-8 col-md-offset-2">
							<span class="input-group-addon hidden-xs"><label for="buscod">NOMBRE</label></span>
							<select class="form-control" name="buscod" id="buscod">
								<option value="">SELECCIONAR NOMBRE</option>
							</select>
						</div>
						<div class="form-group oculto2 col-md-8 col-md-offset-2">
							<form id="formulario2" name="formulario2">
								<!-- <div class="letra" id="shownombre"></div>-->
								<h4><label>CODIGO: </label><input type="text" class="form-control letra" id="shownombre" name="shownombre" disabled></h4>
							    <h4><label>NOMBRE: </label><input type="text" class="form-control letra" id="showcodigo" name="showcodigo" disabled></h4>
							    <h4><label>NOMBRE DEL NIT: </label><input type="text" class="form-control letra" id="shownomnit" name="shownomnit" disabled></h4>
							    <h4><label>NUMERO DE NIT: </label><input type="text" class="form-control letra" id="shownit" name="shownit" disabled></h4>
							    <h4><label>DIRECCION: </label><input type="text" class="form-control letra" id="showdir" name="showdir" disabled></h4>
							    <h4><label>CELULAR: </label><input type="text" class="form-control letra" id="showcel" name="showcel" disabled></h4>
							    <h4><label>VENDEDOR: </label><input type="text" class="form-control letra" id="showven" name="showven" disabled></h4>
							    <button class="btn btn-warning" id="editar" style="display:none">Modificar</button>
							    <div align="center">
									<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
									<h3 id="mensaje2"></h3>
								</div>
								<div>
									<a href="#" class="btn btn-danger pull-right" id="modificar">Editar</a>
									<a href="#" class="btn btn-success pull-right" id="editar" style="display:none">Modificar Cambios</a>
								</div>
								
							</form>
						</div>
					</section>
					<section id="section-4">
						<br>
						<div class="form-group" align="center"><br><br>
							<form action="../php/importarClientes.php" enctype="multipart/form-data" method="post">
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
		<script src="../js/table-mobile.js"></script>
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

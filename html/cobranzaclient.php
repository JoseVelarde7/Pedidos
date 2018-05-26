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
		<link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" />
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
						<?php
							if($nombre=='RENE SANTOS'){
						?>
						<a href="cochabamba/admincocha.php">Menu Principal</a>
						<?php
 							}else if($nombre=='PERCY MOLINA'){
						?>
						<a href="oruro/adminoruro.php">Menu Principal</a>
						<?php
							}
							else{
						?>
						<a href="notapedido.php">Menu Principal</a>
						<?php
						}
						?>
						<a href="cobranzaclient.php">Cobranza</a>
						<a href="lisclient.php">Cuentas por Cobrar</a>
						<a href="pagos.php">Pagos Realizados</a>
						<a href="estadocob.php">Resumenes</a>
					</nav>
				</div>
		<div class="container">
			<div class="row">
				<div class="form-group col-md-6 col-md-offset-3"><br>
					<input type="text" class="form-control typeahead" id="cliente" name="cliente" placeholder="Cliente">
				</div>
			</div>
			<div class="row">
				<div id="" class="oculto" align="center" style="font-size:30px;">
					<p>Total Deuda Pendiente <span class="label label-danger" id="totalcob"></span></p>
				</div>
				<div id="mensaje-cobranza">
					<table id="tab-cobranza" data-smart-display="true" data-unique-id="numero" data-pagination="true" data-mobile-responsive="true">
					</table>
				</div>
			</div>
			<div id="" class="oculto panel panel-primary" align="center">
				<table id="table"
		               data-toggle="table"
		               data-toolbar="#toolbar">
		            <thead>
		            <tr>
		                <th data-field="id">Numero</th>
		                <th data-field="name">Pago</th>
		                <th data-field="price">Saldo</th>
		            </tr>
		            </thead>
		        </table>Total
		        <div id="saldorecibo" class="letra">
		        	
		        </div>
		        <div id="ven" class="oculto2"></div>
		        <div class="input-group">
		        	<input type="tel" class="form-control" id="n-recibo" placeholder="Numero Recibo"><br><br>
		        	<a href="#" class="btn btn-primary" id="reg-cobranza">Registrar</a>
		        	<a href="cobranza.php" class="btn btn-success oculto2" id="newpago">Nuevo Pago</a>
		        </div>
		        <div align="center" class="invi" style="display:none;">
					<i class="fa fa-spin fa-spinner fa-3x"></i>
					<h3>Registrando...</h3>
				</div>
		        <div align="center" id="resultado" class="letra">
		        </div>      
			</div><br>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../js/table-mobile.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="../js/cobranza.js"></script>
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

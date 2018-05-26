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
					<a href="notapedido.php">Menu Principal</a>
					<a href="cobranzaclient.php">Cobranza</a>
					<a href="lisclient.php">Cuentas por Cobrar</a>
					<a href="pagos.php">Pagos Realizados</a>
					<a href="estadocob.php">Resumenes</a>
				</nav>
			</div>
			<div class="container-fluid"><br>
				<div>
					<a href="#" class="btn btn-success" id="btn-cob1">Generar</a><br>
				</div>
				<div>
					<div class="input-group form-inline">
						<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo date('Y-m-d');?>">
						<span class="input-group-btn">
					        <a href="#" class="btn btn-success" id="busxfecha">Buscar</a>
					    </span>
					</div>
					<table id="tab-cobrar1" class="table-striped" data-unique-id="recibo" data-search="true" data-pagination="true" data-show-export="true">
					</table><br>
					<div id="totalpagos" class="letramediana" align="center"></div>
				</div>
			</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../js/table-mobile.js"></script>
		<script src="../js/cobranza.js"></script>
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
		</script>
	<?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>
	</body>
</html>

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
						<a href="listacobranza.php">Cobranza</a>
						<a href="cochabamba/admin2.php">Sucursales</a>
					</nav>
				</div>
		<div class="containerm">
			<div class="" align="center">
				<div class="" align="center">
					<h1>MENU PRINCIPAL</h1>
					<a href="listapedidos2.php" class="btn1 btn-5 btn-5a icon-cart"><span>LISTA DE PEDIDOS</span></a>
					<a href="productos2.php" class="btn1 btn-5 btn-5a icon-cart"><span>PRODUCTOS</span></a>
					<a href="cliente2.php" class="btn1 btn-5 btn-5a icon-cart"><span>CLIENTES</span></a>
					<a href="listacobranza.php" class="btn1 btn-5 btn-5a icon-cart"><span>COBRANZA</span></a>
					<a href="cochabamba/admin2.php" class="btn1 btn-5 btn-5a icon-cart"><span>SUCURSALES</span></a>
				</div>
			</div>
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/cbpFWTabs.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/pedido.js"></script>
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

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
						<li>
							<div class="" id="logo-topo">
						    <a href="www.baesa.com.bo"><h3>BAESA</h3></a>
						  </div>
						</li>
						<li>
							<div class="btn-group">
							<a href="#" class="menombre dropdown-toggle" data-toggle="dropdown"><h4><?php echo $nombre; ?></h4></a>
							  <ul class="dropdown-menu" role="menu">
							    <li><a href="../php/salirsesion.php" class="" id="opciones">Salir</a></li>
							  </ul>
							</div>
						</li>
					</ul>
				</div>
		<div class="containerm">
			<div class="" align="center">
				<h3>MENU INICIO</h3>
				<a href="menu2.php" class="btn1 btn-5 btn-5a icon-cart"><span>MANTECA</span></a>
				<a href="archer.php" class="btn1 btn-5 btn-5a icon-cart"><span>ARCHER</span></a>
				<a href="listapedidos.php" class="btn1 btn-5 btn-5a icon-cart"><span>LISTA PEDIDOS</span></a>
				<a href="cobranzaclient.php" class="btn1 btn-5 btn-5a icon-cart"><span>COBRANZA</span></a>
				<a href="productos.php" class="btn1 btn-5 btn-5a icon-cart"><span>PRODUCTOS</span></a>
				<a href="cliente.php" class="btn1 btn-5 btn-5a icon-cart"><span>CLIENTES</span></a>
			</div>
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
	 <?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>
	</body>
</html>

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
						<h3>Menu</h3>
						<a href="admincobranza.php">Inicio</a>
						<a href="listacobranza.php">Lista Cobranza</a>
						<a href="cobranza.php">Cobranza</a>
						<!--<a href="#">Dandelion bunya</a>
						<a href="#">Rutabaga</a>-->
					</nav>
				</div>
		<div class="container">
			<div class="row">
				<div class="form-group col-md-6 col-md-offset-3"><br>
					<div class="input-group">
					    <select name="nombre-c" id="nombre-c" class="form-control letratabla1">
							<option value="10">William Vargas</option>
							<option value="11">Macario Villanueva</option>
							<option value="14">Rodrigo Sequeiros</option>
							<option value="20">Bertha Blanco</option>
							<option value="21">Marcelo Huanca</option>
							<option value="22">Jhoana Vargas</option>
							<option value="24">Sandra Capriles</option>
						</select>
						<span class="input-group-btn">
				        <a href="#" class="btn btn-success" id="show1">Generar</a>
				        </span>  
				    </div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-danger">
					  <div class="panel-heading letrabig" align="center" id="dato1">0</div>
					  <div class="panel-footer letramedia" align="center">DEUDA TOTAL</div>
					</div>
					<div class="panel panel-info">
					  <div class="panel-heading letrabig" align="center" id="dato2">0</div>
					  <div class="panel-footer letramedia" align="center" id="dato3"></div>
					</div>
					<div class="panel panel-warning">
					  <div class="panel-heading letrabig" align="center" id="dato4">0</div>
					  <div class="panel-footer letramedia" align="center" id="dato5"></div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-primary">
					  <div class="panel-heading letramedia" align="center">Deudas mas Antiguas</div>
					  <div class="panel-body">
					    <table id="deudores" data-smart-display="true">
						</table>
					  </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
					  <div class="panel-heading letramedia" align="center">Deudas mas Altas</div>
					  <div class="panel-body">
					    <table id="deuda2" data-smart-display="true">
						</table>
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

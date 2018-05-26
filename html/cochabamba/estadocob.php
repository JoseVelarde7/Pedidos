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
		<link rel="shortcut icon" href="../../favicon.ico">
		<link rel="stylesheet" href="../../css/font-awesome.css">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../../css/component.css" />
		<link rel="stylesheet" href="../../css/bootstrap-table.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/sweetalert2.min.css" />
		
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
		<div class="container"><br><br>
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
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/classie.js"></script>
		<script src="../../js/typeahead.js"></script>
		<script src="../../js/bootstrap-table.min.js"></script>
		<script src="../../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../../js/table-mobile.js"></script>
		<script src="../../js/cobranza.js"></script>
		<script src="../../js/sweetalert2.min.js"></script>
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
			$(document).ready(function(){
				$.getJSON("../../php/opcobranzas.php", {ope: "estado1"})
			        .done(function(respuesta) {
			        $('#dato1').html(respuesta[0]+" Bs");
			        $('#dato3').html(respuesta[1]);
			        $('#dato2').html(respuesta[2]+" Dias");
			        $('#dato4').html(respuesta[3]+" Bs");
			        $('#dato5').html(respuesta[4]);
			    });
			    $.getJSON("../../php/opcobranzas.php", {ope: "estado2"})
			        .done(function(respuesta) {
			          $('#deudores').bootstrapTable('destroy');
			          $('#deudores').bootstrapTable({
			              columns: [/*{
			                  field: 'numero',
			                  title: 'NUMERO'
			              },*/ {
			                  field: 'cliente',
			                  title: 'CLIENTE'
			              }, {
			                  field: 'emitido',
			                  title: 'EMITIDO'
			              }/*, {
			                  field: 'total',
			                  title: 'TOTAL'
			              }*/, {
			                  field: 'dias',
			                  title: 'DIAS'
			              }],
			              data: respuesta
			          });
			        });
			    $.getJSON("../../php/opcobranzas.php", {ope: "estado3"})
			        .done(function(respuesta) {
			          $('#deuda2').bootstrapTable('destroy');
			          $('#deuda2').bootstrapTable({
			              columns: [{
			                  field: 'nombre',
			                  title: 'NOMBRE'
			              }, {
			                  field: 'deuda',
			                  title: 'DEUDA'
			              }],
			              data: respuesta
			          });
			        });
			});
		</script>
	<?PHP
        } 
        else {
            header("location:../../index.html");
        }
    ?>
	</body>
</html>

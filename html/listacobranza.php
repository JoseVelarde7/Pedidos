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
						<a href="admin.php">Menu Principal</a>
						<a href="listacobranza.php">Lista Cobranza</a>
						<!--<a href="cobranza.php">Cobranza</a>
						<a href="#">Dandelion bunya</a>
						<a href="#">Rutabaga</a>-->
					</nav>
				</div>
		<div class="container">
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-lab"><span>Lista de Cobranzas</span></a></li>
						<li><a href="#section-2" class="icon-cup"><span>Pagos Realizados</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Subir Archivo</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1"><br>
						<a href="#" class="btn btn-success" id="btn-4">Mostrar Cobranzas</a><br>
						<table id="tabla8" class="table-striped" data-search="true" data-pagination="true"></table>
					</section>
					<section id="section-2">
						<div align="center"><h1>Lista de Cobranzas</h1></div>
						<div>
							<a href="#" class="btn btn-success" id="btn-cob">Generar</a>
							<div class="input-group col-md-4">
								<select name="xvendedor" class="form-control" id="xvendedor">
									<option value="10">WILLIAM VARGAS</option>
									<option value="20">BERTHA BLANCO</option>
									<option value="21">MARCELO HUANCA</option>
									<option value="22">JHOANA VARGAS</option>
									<option value="14">RODRIGO SEQUEIROS</option>
									<option value="11">MACARIO VILLANUEVA</option>
									<option value="24">SANDRA CAPRILES</option>
									<option value="25">CAROS ENCINAS</option>
								</select>
								<span class="input-group-btn">
                                  <a href="#" class="btn btn-primary" id="busxven" type="button">Buscar</a>
                                </span>
							</div>
						</div>
						<div>
							<div id="opci1" class="form-inline">
		                        <select class="form-control pull-right">
		                            <option value="">Exportar Vista Actual</option>
		                            <option value="all">Exportar Todo</option>
		                        </select>
		                    </div>
							<table id="tab-cobrar" class="table-striped" data-search="true" data-pagination="true" data-show-export="true" data-unique-id="recibo">
							</table>
						</div>
					</section>
					<section id="section-3"><br><br>
						<div class="form-group" align="center">
							<form action="../php/importar.php" enctype="multipart/form-data" method="post">
							   <input id="archivo" accept=".csv" name="archivo" type="file" /> 
							   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> 
								<br>
							   <input class="btn btn-success btn-lg" name="enviar" type="submit" value="IMPORTAR ARCHIVO" />
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
			<div class="modal fade" id="modaltabla" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button>
	                        Numero de Recibo: <h4 class="modal-title" id="numerorec" align="center"></h4>
	                    </div>
	                    <div class="modal-body">
	                    	<span>Cliente: <div id="ncliente"></div></span>
	                    	<span>Vendedor: <div id="nvendedor"></div><div id="numnitpd"></div></span>
	                        <table id="mod-cob" data-smart-display="true" data-mobile-responsive="true">
							</table><br>
							<div class="pull-right letramedia" id="ntotal"></div><div class="pull-right letramedia">Total :</div>
							<br>
	                    </div>
	                    <div class="modal-footer">
	                    	<a href="#" class="btn btn-primary" id="registrarCob">Registrar</a>
	                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                        <div class="resmensaje letramediana" align="center">
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/cbpFWTabs.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../js/table-mobile.js"></script>
		<script src="../js/cobranza.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="../js/boot-table-export.js"></script>
    	<script src="../js/tableExport.min.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
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
			$(function () {
	            var $table = $('#tab-cobrar');
	            $('#opci1').find('select').change(function () {
	                $table.bootstrapTable('refreshOptions', {
	                  exportDataType: $(this).val()
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

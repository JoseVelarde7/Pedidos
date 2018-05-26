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
		<link rel="stylesheet" href="../../css/font-awesome.css">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<link rel="stylesheet" href="../../css/bootstrapValidator.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../../css/component.css" />
		<link rel="stylesheet" href="../../css/typeahead.css">
		<link rel="stylesheet" href="../../css/bootstrap-table.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/sweetalert2.min.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="cbp-spmenu-push">
				<div class="">
					<ul id="gn-menu" class="gn-menu-main">
						<li class="gn-trigger">
							<div align="center">
								<a href="admincocha.php">
									<i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
								</a>
							</div>
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
				</div>
		<div class="container">
		<div align="center"><span align="center" class="titulo1">PEDIDOS</span></div>
				<table id="table-pedido" data-search="true" data-smart-display="true" data-row-style="rowStyle" data-show-toggle="true" data-pagination="true" data-mobile-responsive="true">
				</table>
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
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
		</div>
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/cbpFWTabs.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/classie.js"></script>
		<script src="../../js/typeahead.js"></script>
		<script src="../../js/cochabamba.js"></script>
		<script src="../../js/bootstrapValidator.min.js"></script>
		<script src="../../js/sweetalert2.min.js"></script>
		<script src="../../js/bootstrap-table.min.js"></script>
		<script src="../../js/bootstrap-table-es-SP.min.js"></script>
		<script>
			$('#nuevo').hide();
			$(".n1").hide();
			$("input[name=inputprueba]").change(function(){
				$(".n1").toggle();
			});

			$.getJSON("../../php/operacionget.php", {ope: "listarpedidosco"})
				  .done(function(respuesta) {
			  	  //console.log(respuesta);
			  	  $('#table-pedido').bootstrapTable('destroy');
		          $('#table-pedido').bootstrapTable({
						    columns: [{
						        field: 'pedidoid',
						        title: 'NUMERO'
						    }, {
						        field: 'fecha',
						        title: 'FECHA'
						    }, {
						        field: 'hora',
						        title: 'HORA'
						    }, {
						        field: 'nombre',
						        title: 'NOMBRE'
						    }, {
						        field: 'nombrenit',
						        title: 'NOMBRE NIT'
						    }, {
						        field: 'nit',
						        title: 'NIT'
						    }, {
						        field: 'boton',
						        title: 'VER',
						        events: operateEvents,
						        formatter: operateFormatter
						    },{
						        field: 'factura',
						        title: '# NUMERO'
						    },{
						        field: 'estado',
						        title: 'ESTADO',
						        formatter: formato2
						    }, {
						        field: 'operacion2',
						        title: 'ANULAR',
						        events: operateEvents4,
						        formatter: operateFormatter41
						    }],
						    data: respuesta
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

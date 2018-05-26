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
			<div align="center"><span align="center" class="titulo1">PRODUCTOS</span></div>
			<table id="table3" class="table-striped" data-search="true" data-pagination="true">
			</table>
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
			$.getJSON("../../php/operacionget.php", { ope: "listarprodco"})
			  .done(function(respuesta) {
			  	  console.log(respuesta);
			  	  $('#table3').bootstrapTable('destroy');
		          $('#table3').bootstrapTable({
					    columns: [{
					        field: 'codigo',
					        title: 'COD'
					    }, {
					        field: 'nombre_prod',
					        title: 'NOMBRE'
					    }, {
					        field: 'cochabamba',
					        title: 'UNI'
					    }, {
					        field: 'precio',
					        title: 'PRECIO'
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

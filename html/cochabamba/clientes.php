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
			<div align="center"><span align="center" class="titulo1">CLIENTES</span></div>
			  <div class="row">
            <div class="board">
                <div class="board-inner">
                	<ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                 		<li class="active">
                 			<a href="#home" data-toggle="tab" title="Lista de Clientes">
                  			<span class="round-tabs one">
                          <i class="glyphicon glyphicon-home"></i>
                  			</span> 
              				</a>
              			</li>
              			<li>
              				<a href="#profile" data-toggle="tab" title="Registrar Cliente">
                 				<span class="round-tabs two">
                     			<i class="glyphicon glyphicon-user"></i>
                 				</span> 
       								</a>
             				</li>
             				<li>
             					<a href="#messages" data-toggle="tab" title="Modificar Clientes">
	                     <span class="round-tabs three">
	                          <i class="glyphicon glyphicon-gift"></i>
	                     </span>
	                    </a>
                 		</li>
                 </ul>
               </div>

               <div class="tab-content">
                  <div class="tab-pane fade in active" id="home"> 
                  		<div class="col-md-12">
                  			<div><a href="#" class="btn btn-success" id="reloadtable">Actualizar</a></div>
                    		<table id="table" data-search="true" data-smart-display="true">
												</table>	
                  		</div>
                  </div>
                  <div class="tab-pane fade" id="profile">
                  		<form id="formulario1">
                  			<div class="col-md-6">
                    			<div class="form-group">
								<label for="codigo">CODIGO</label>
								<input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo date('mdHis');?>" readonly>
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
                  				</div>
                  			<div class="col-md-6">
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
													  <select class="form-control" id="vendedor" name="vendedor" readonly>
													    <option value="40">Cochabamba</option>
													  </select>
													</div>	
                  			</div>
                  			<div class="formss-group" align="center">
													    <a href="#" class="btn btn-primary btn-lg" id="boton">Registrar</a>
													    <input id="resetear" class="btn btn-danger btn-lg" type="reset" value="nuevo">
												</div><br>
												<div align="center">
														<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
														<h3 id="mensaje"></h3>
												</div>
												
											</form>
											<div class="pull-right">
                  			<button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                  		</div> 
                  </div>
                  <div class="tab-pane fade" id="messages">
                      <div class="col-md-12">
                      	<label for="buscod" class="visible-xs centro">Nombre</label>
												<div class="input-group col-md-8 col-md-offset-2 le">
													<span class="input-group-addon hidden-xs"><label for="buscod">NOMBRE</label></span>
													<select class="form-control" name="buscod" id="buscod">
														<option value="">SELECCIONAR NOMBRE</option>
													</select>
												</div>
												<div class="form-group col-md-12">
													<form id="formulario2" name="formulario2">
														<!-- <div class="letra" id="shownombre"></div>-->
														<div class="col-md-6">
															  <h4><label>CODIGO: </label><input type="text" class="form-control letra" id="shownombre" name="shownombre" readonly></h4>
														    <h4><label>NOMBRE: </label><input type="text" class="form-control letra" id="showcodigo" name="showcodigo"></h4>
														    <h4><label>NOMBRE DEL NIT: </label><input type="text" class="form-control letra" id="shownomnit" name="shownomnit"></h4>
														    <h4><label>NUMERO DE NIT: </label><input type="text" class="form-control letra" id="shownit" name="shownit"></h4>	
														</div>
														<div class="col-md-6">
																<h4><label>DIRECCION: </label><input type="text" class="form-control letra" id="showdir" name="showdir"></h4>
														    <h4><label>CELULAR: </label><input type="text" class="form-control letra" id="showcel" name="showcel"></h4>
														    <h4><label>VENDEDOR: </label>
														    <input type="text" class="form-control letra" id="showven" name="showven" readonly>
														    </h4>
														    <div align="center">
																	<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
																	<h3 id="mensaje2"></h3>
																</div>
														</div>
													    
														<div>
															<a href="#" class="btn btn-success pull-right" id="editar">Modificar Cambios</a>
														</div>
													</form>
												</div>
												<div class="pull-right">
                    			<button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                    		</div>
                      </div>
                  </div>
									<div class="clearfix"></div>
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
			
			$('#table').bootstrapTable('destroy');
			$.getJSON("../../php/operacionget.php", { ope: "listartodoco"})
				.done(function(respuesta) {
				  //console.log(respuesta);
			          $('#table').bootstrapTable({
						    columns: [{
						        field: 'codigo',
						        title: 'CODIGO'
						    }, {
						        field: 'nombre',
						        title: 'NOMBRE'
						    }, {
						        field: 'direccion',
						        title: 'DIRECCION'
						    }, {
						        field: 'celular',
						        title: 'CELULAR'
						    }, {
						        field: 'nombrenit',
						        title: 'NOMBRE NIT'
						    }, {
						        field: 'nit',
						        title: 'NIT'
						    }],
						    data: respuesta
					  });
			});

				var arreglo7=new Array();
				var n7=0;
				$.getJSON("../../php/operacionget.php",{ope: "buscar"})
				  .done(function(resp) {
				  	   //console.log(resp);
				  	   $.each(resp,function(c,v){
					   arreglo7[n7]=v;
					         n7++;
					   });
					   for (var i = 0; i < resp.length; i++) {
						  $('#buscod').append("<option value='"+arreglo7[i]+"'>"+arreglo7[i]+"</option>");
					   }
				  })
				  .fail(function( jqxhr, textStatus, error ) {
				    var err = textStatus + ", " + error;
				    console.log( "Request Failed: " + err );
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

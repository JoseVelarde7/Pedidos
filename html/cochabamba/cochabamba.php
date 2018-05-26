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
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style>
			.fullscreen-modal .modal-dialog {
			  margin: 0;
			  margin-right: auto;
			  margin-left: auto;
			  width: 95%;
			}
			.board{
   			 width: 90%;
			margin: 60px auto;
			height: 550px;
			background: #fff;
			/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
			}
			.board .nav-tabs {
			    position: relative;
			    /* border-bottom: 0; */
			    /* width: 80%; */
			    margin: 40px auto;
			    margin-bottom: 0;
			    box-sizing: border-box;

			}

			.board > div.board-inner{
			    background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
			    background-size: 30%;
			}

			p.narrow{
			    width: 60%;
			    margin: 10px auto;
			}

			.liner{
			    height: 2px;
			    background: #ddd;
			    position: absolute;
			    width: 80%;
			    margin: 0 auto;
			    left: 0;
			    right: 0;
			    top: 50%;
			    z-index: 1;
			}

			.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
			    color: #555555;
			    cursor: default;
			    /* background-color: #ffffff; */
			    border: 0;
			    border-bottom-color: transparent;
			}

			span.round-tabs{
			    width: 70px;
			    height: 70px;
			    line-height: 70px;
			    display: inline-block;
			    border-radius: 100px;
			    background: white;
			    z-index: 2;
			    position: absolute;
			    left: 0;
			    text-align: center;
			    font-size: 25px;
			}

			span.round-tabs.one{
			    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
			}

			li.active span.round-tabs.one{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: rgb(34, 194, 34);
			}

			span.round-tabs.two{
			    color: #febe29;border: 2px solid #febe29;
			}

			li.active span.round-tabs.two{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #febe29;
			}

			span.round-tabs.three{
			    color: #3e5e9a;border: 2px solid #3e5e9a;
			}

			li.active span.round-tabs.three{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #3e5e9a;
			}

			span.round-tabs.four{
			    color: #f1685e;border: 2px solid #f1685e;
			}

			li.active span.round-tabs.four{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #f1685e;
			}

			span.round-tabs.five{
			    color: #999;border: 2px solid #999;
			}

			li.active span.round-tabs.five{
			    background: #fff !important;
			    border: 2px solid #ddd;
			    color: #999;
			}

			.nav-tabs > li.active > a span.round-tabs{
			    background: #fafafa;
			}
			.nav-tabs > li {
			    width: 20%;
			}
			.nav-tabs > li:after {
			    content: " ";
			    position: absolute;
			    left: 45%;
			   opacity:0;
			    margin: 0 auto;
			    bottom: 0px;
			    border: 5px solid transparent;
			    border-bottom-color: #ddd;
			    transition:0.1s ease-in-out;
			    
			}
			.nav-tabs > li.active:after {
			    content: " ";
			    position: absolute;
			    left: 45%;
			   opacity:1;
			    margin: 0 auto;
			    bottom: 0px;
			    border: 10px solid transparent;
			    border-bottom-color: #ddd;
			    
			}
			.nav-tabs > li a{
			   width: 70px;
			   height: 70px;
			   margin: 20px auto;
			   border-radius: 100%;
			   padding: 0;
			}

			.nav-tabs > li a:hover{
			    background: transparent;
			}

			.tab-content{
			}
			.tab-pane{
			   position: relative;
			padding-top: 50px;
			}
			.tab-content .head{
			    font-family: 'Roboto Condensed', sans-serif;
			    font-size: 25px;
			    text-transform: uppercase;
			    padding-bottom: 10px;
			}
			.btn-outline-rounded{
			    padding: 10px 40px;
			    margin: 20px 0;
			    border: 2px solid transparent;
			    border-radius: 25px;
			}

			.btn.green{
			    background-color:#5cb85c;
			    /*border: 2px solid #5cb85c;*/
			    color: #ffffff;
			}



			@media( max-width : 585px ){
			    
			    .board {
			width: 90%;
			height:auto !important;
			}
			    span.round-tabs {
			        font-size:16px;
			width: 50px;
			height: 50px;
			line-height: 50px;
			    }
			    .tab-content .head{
			        font-size:20px;
			        }
			    .nav-tabs > li a {
			width: 50px;
			height: 50px;
			line-height:50px;
			}

			.nav-tabs > li.active:after {
			content: " ";
			position: absolute;
			left: 35%;
			}

			.btn-outline-rounded {
			    padding:12px 20px;
			}
			#seccion{
					background-color: transparent;
					opacity: 0.5;
					padding-top: 0px;
					margin-top: -10px;
			}
			.mayuscula{
				text-transform:uppercase;
			}
			#home,.tab-content{
				background: #000;
			}
		</style>
	</head>
	<body class="cbp-spmenu-push">
		<div class="">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<div align="center">
						<a href="admin2.php">
							<i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>
						</a>
					</div>
				</li>
				<li>
					<div class="btn-group">
					<a href="#" class="menombre dropdown-toggle" data-toggle="dropdown"><h4><?php echo $nombre; ?></h4></a>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="../../php/salirsesion.php" class="" id="opciones">Salir</a></li>
					  </ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="containerm">
			<div class="" align="center">
				<h1>SUCURSAL COCHABAMBA</h1>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modal3" id="showtab4"><span>LISTA DE PEDIDOS</span></a>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modal2" id="showtab3"><span>PRODUCTOS</span></a>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modalclientes" id="listacliente"><span>CLIENTES</span></a>
			</div>
			
			<div id="modalclientes" class="modal fullscreen-modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header" align="center">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h1 class="modal-title">LISTA DE CLIENTES COCHABAMBA</h1>
			      </div>
			      <div class="modal-body">
			        <div><a href="#" class="btn btn-success" id="reloadtable">Mostrar/Actualizar</a></div>
          		<table id="table" data-search="true" data-smart-display="true" data-height="430">
							</table>
			      </div>											
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			      </div>
			    </div>
			  </div>
			</div>
			<div id="modal2" class="modal fullscreen-modal fade" role="dialog">
			  <section id="seccion">
	        <div class="container">
	            <div class="row">
	                <div class="board">
	                    <div class="board-inner">
	                    	<ul class="nav nav-tabs" id="myTab">
	                        <div class="liner"></div>
	                     		<li class="active">
	                     			<a href="#home" data-toggle="tab" title="Lista de Productos">
	                      			<span class="round-tabs one">
	                              <i class="glyphicon glyphicon-home"></i>
	                      			</span> 
	                  				</a>
	                  			</li>
	                  			<li>
	                  				<a href="#profile" data-toggle="tab" title="Registrar Productos">
	                     				<span class="round-tabs two">
	                         			<i class="glyphicon glyphicon-user"></i>
	                     				</span>   
	           								</a>
	                 				</li>
	                     	</ul>
	                    </div>
	                   <div class="tab-content">
	                      <div class="tab-pane fade in active" id="home"> 
	                      		<div class="col-md-12">
	                      			<div><a href="#" class="btn btn-success" id="tab-cocha">Mostrar/Actualizar</a></div>
		                      		<table id="table-co" class="table-striped"  data-search="true" data-pagination="true" data-height="300"></table>	
	                      		</div>
	                      		<div class="pull-right">
	                      			<button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
	                      		</div>
	                      </div>
	                      <div class="tab-pane fade" id="profile">
	                      		<div class="col-md-12">
	                          	<label for="buscod" class="visible-xs centro">Nombre</label>
															<div class="input-group col-md-8 col-md-offset-2 le">
																<span class="input-group-addon hidden-xs"><label for="lmanteca">NOMBRE</label></span>
																<input type="text" class="form-control typeahead pmanteca" id="lmanteca" name="lmanteca">
																<span class="input-group-btn">
											          <a href="#" class="btn btn-default" id="busStock">Agregar</a>
											        </span>
															</div>

															
															<div class="form-group col-md-12">
																<form id="form1" name="form1">
																	<!-- <div class="letra" id="shownombre"></div>-->
																	<div class="col-md-6">
																		  <h4><label>CODIGO: </label><input type="text" class="form-control letra" id="pcodigo" name="pcodigo" readonly></h4>
																	    <h4><label>Cantidad Actual: </label><input type="text" class="form-control letra" id="pcantidad" name="pcantidad" readonly></h4>
																	</div>
																	<div class="col-md-6">
																			<h4><label>Cantidad de Ingreso al Almacen</label><input type="text" class="form-control letra" id="newStock" name="newStock">
																			</h4>
																	    <div align="center">
																				<i class="fa fa-spin fa-circle-o-notch fa-3x oculto"></i>
																				<h3 id="mensaje2"></h3>
																			</div>
																	</div>
																	<div>
																		<a href="#" class="btn btn-success btn-lg pull-right" id="addStock">Ingresar Stock</a>
																		<a href="#" class="btn btn-success btn-lg pull-right" id="addNuevo">Ingresar Nuevo</a>
																	</div>
																	<div class="letra" id="respuesta1">
																		
																	</div>
																</form>
															</div>
	                          </div>
	                      </div>
	                      <!--<div class="tab-pane fade" id="messages">
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
												<div class="clearfix"></div>
											</div>
									</div>
							</div>
					</div>
				</section>
			</div>
			<div id="modal3" class="modal fullscreen-modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header" align="center">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h1 class="modal-title">LISTA DE PEDIDOS</h1>
			      </div>
			      <div class="modal-body">
			        <table id="table-pedido" data-search="true" data-smart-display="true" data-row-style="rowStyle" data-show-toggle="true" data-pagination="true" data-mobile-responsive="true">
							</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			      </div>
			    </div>
			  </div>
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
	        <div class="modal fade" id="modalventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	            <div class="modal-dialog">
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <h3 align="center">INGRESAR NUMERO DE FACTURA</h3>
	                    </div>
	                    <div class="modal-body">
	                    	<form>
	                    		<div id="codigo-invoice"></div>
	                    		<input type="text" class="form-control" id="number-invoice">
	                    	</form>
	                    	<div id="men-invoice"></div>
	                    </div>
	                    <div class="modal-footer">
	                        <a href="#" class="btn btn-success" id="regfactura">Registrar</a>
	                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                    </div>
	                </div><!-- /.modal-content -->
	            </div><!-- /.modal-dialog -->
	        </div>
			<footer class="footer">
				<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
			</footer>

		</div>
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/classie.js"></script>
		<script src="../../js/cochabamba.js"></script>
		<script src="../../js/bootstrap-table.min.js"></script>
		<script src="../../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../../js/typeahead.js"></script>
		<script>
			$(function(){
			  $('a[title]').tooltip();
			});
			$(document).ready(function(){
				$('#addNuevo').hide();
				var substringMatcher = function(strs) {
				  return function findMatches(q, cb) {
				    var matches, substringRegex;
				    matches = [];
				    substrRegex = new RegExp(q, 'i');
				    $.each(strs, function(i, str) {
				      if (substrRegex.test(str)) {
				        matches.push(str);
				      }
				    });
				    cb(matches);
				  };
				};
				$('#tab-cocha').on('click',function(e){
					e.preventDefault();
					$.getJSON("../../php/sucursal.php", { ope: "prod-cochabamba"})
					  .done(function(respuesta) {
					  	  //console.log(respuesta);
					  	  $('#table-co').bootstrapTable('destroy');
				          $('#table-co').bootstrapTable({
								    columns: [{
								        field: 'codigo',
								        title: 'COD'
								    }, {
								        field: 'nombre_prod',
								        title: 'NOMBRE'
								    }, {
								        field: 'unidad',
								        title: 'UNIDAD'
								    },{
								        field: 'uni_almacen',
								        title: 'ALMACEN'
								    }, {
								        field: 'precio',
								        title: 'PRECIO'
								    }, {
								        field: 'observacion',
								        title: 'OBSERVACION'
								    }],
								    data: respuesta
							  	});
					  });
				});
				$('#busStock').click(function(e){
					e.preventDefault();
					var nombre=$('#lmanteca').val();
					$.getJSON("../../php/sucursal.php",{ope: "getStock",nombre:nombre})
				  .done(function(resp) {
				  	$('#pcodigo').attr('value',resp[0]);
				  	$('#pcantidad').attr('value',resp[1]);
				  })
				  .fail(function( jqxhr, textStatus, error ) {
				    var err = textStatus + ", " + error;
				    console.log("Request Failed: "+err);
				  });
				});
				$('#addStock').click(function(e){
					e.preventDefault();
					var codigo=$ ('#pcodigo').val();
					var nstock=$('#newStock').val();
					$.getJSON("../../php/sucursal.php",{ope: "agregarStock",codigo:codigo,stock:nstock})
				  .done(function(resp) {
				  	console.log(resp);
				  	$('#respuesta1').html(resp+" Se agregaron "+nstock+ " al producto");
				  	$('#addStock').hide();
				  	$('#addNuevo').show();
				  })
				  .fail(function( jqxhr, textStatus, error ) {
				    var err = textStatus + ", " + error;
				    console.log("Request Failed: "+err);
				  });
				});
				$('#addNuevo').click(function(e){
					e.preventDefault();
					$('#form1')[0].reset();
					$('#pcodigo').attr('value','');
				  $('#pcantidad').attr('value','');
				  $('#lmanteca').attr('value','');
				  $('#respuesta1').html("");
				});
				var arreglo1a=new Array();
    		var n1a=0;
				$.getJSON("../../php/sucursal.php",{ope: "listaManteca"})
				  .done(function(resp) {
				  	$('.pmanteca').typeahead({
						  hint: true,
						  highlight: true,
						  minLength: 1
						},
						{
						  name: 'states',
						  limit: 10,
						  source: substringMatcher(resp)
					  });
				  })
				  .fail(function( jqxhr, textStatus, error ) {
				    var err = textStatus + ", " + error;
				    console.log("Request Failed: "+err);
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

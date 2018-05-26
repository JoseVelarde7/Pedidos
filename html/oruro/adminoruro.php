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
			/*li.active:before {
			    content: " ";
			    position: absolute;
			    left: 45%;
			    opacity:0;
			    margin: 0 auto;
			    bottom: -2px;
			    border: 10px solid transparent;
			    border-bottom-color: #fff;
			    z-index: 1;
			    transition:0.2s ease-in-out;
			}*/
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
						<li>
							<div class="" id="logo-topo">
						          <a href="admincocha.php"><h3>BAESA</h3></a>
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
				<h1>SUCURSAL ORURO</h1>
				<a href="pedidos.php" class="btn1 btn-5 btn-5a icon-cart"><span>PEDIDOS</span></a>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modal3" id="showtab6"><span>LISTA DE PEDIDOS</span></a>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modal2" id="showtab3"><span>PRODUCTOS</span></a>
				<a href="#" class="btn1 btn-5 btn-5a icon-cart" data-toggle="modal" data-target="#modalclientes" id="listacliente"><span>CLIENTES</span></a>
				<a href="../cobranzaclient.php" class="btn1 btn-5 btn-5a icon-cart"><span>COBRANZA</span></a>
			</div>
			
			<div class="modal fullscreen-modal fade" id="modalclientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			      	<section id="seccion">
				        <div class="container">
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
				                      			<div><a href="#" class="btn btn-success" id="reloadtable">Mostrar/Actualizar</a></div>
					                      		<table id="table" data-search="true" data-smart-display="true" data-height="300">
																		</table>	
				                      		</div>
				                      		<div class="pull-right">
				                      			<button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
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
																			    <option value="32">ORURO</option>
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
							</section>
			</div>
			<div id="modal2" class="modal fullscreen-modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header" align="center">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h1 class="modal-title">LISTA DE PRODUCTOS</h1>
			      </div>
			      <div class="modal-body">
			        <table id="table3" class="table-striped" data-search="true" data-pagination="true" data-height="350">
							</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
			      </div>
			    </div>
			  </div>
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
			<footer class="footer">
				<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
			</footer>
			
		</div>
		<script src="../../js/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/classie.js"></script>
		<script src="../../js/oruro.js"></script>
		<script src="../../js/bootstrap-table.min.js"></script>
		<script src="../../js/bootstrap-table-es-SP.min.js"></script>
		<script src="../../js/typeahead.js"></script>
		<script>
			$(function(){
			  $('a[title]').tooltip();
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

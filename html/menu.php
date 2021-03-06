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
		<link rel="stylesheet" href="../css/bootstrapValidator.css"/>
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<link rel="stylesheet" href="../css/typeahead.css">
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
				<a href="notapedido.php">Nota de Pedido</a>
				<a href="listapedidos.php">Lista de Pedidos</a>
				<a href="productos.php">Productos</a>
				<a href="cliente.php">Clientes</a>
			</nav>
		</div>
		<div class="container">
			<div align="center"><span align="center" class="titulo1">PEDIDOS DE MANTECA Y OTROS</span></div>
					<section id="section-1">
						<div id="fechaid" align="center"></div>
						<div class="row">
							<div class="col-md-9">
								<form id="datoscli">
									<label for="buscod" class="visible-xs centro">CLIENTE</label>
									<div class="input-group" style="width: 100%;">
										<span class="input-group-addon hidden-xs"><label for="names">NOMBRE</label></span>
										<input type="text" class="form-control typeahead"  id="names" name="names">
									</div>
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="codcli">COD CLI</label></span>
										<input type="text" class="form-control inputsinestilo" id="codcli" name="codcli" readonly>
									</div>
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="dir">DIRECCION</label></span>
										<input type="text" class="form-control inputsinestilo" id="dir" name="dir" readonly>
									</div>
									<div class="input-group cien oculto2">
										<span class="input-group-addon hidden-xs"><label for="vendedor">VENDEDOR</label></span>
										<input type="text" class="form-control inputsinestilo" id="vendedor" name="vendedor" readonly>
									</div>
							</div>
							<div class="col-md-3">
									<div class="input-group cien">
										<span class="input-group-addon hidden-xs"><label for="celular">CELULAR</label></span>
										<input type="text" class="form-control inputsinestilo" id="celular" name="celular" >
									</div>
									<!--<div class="checkbox" align="right">
									  <label>
									    <input type="checkbox" id="inputprueba" name="inputprueba">
									    F
									  </label>
									</div>-->
									<div class="input-group cien n1">
									<label for="vendedor" class="visible-xs centro n1">Nombre nit</label>
										<span class="input-group-addon hidden-xs"><label for="nombre_nit">NOMBRE NIT</label></span>
										<input type="text" class="form-control" id="nombre_nit" name="nombre_nit">
									</div>
									<div class="input-group cien n1">
									<label for="nit" class="visible-xs centro n1">Numero Nit</label>
										<span class="input-group-addon hidden-xs"><label for="nit">NIT</label></span>
										<input type="text" class="form-control" id="nit" name="nit">
									</div>
								</form>
							</div>
						</div>
						<div align="center" style="color:red;font-size:20px;" id="aviso"></div>
						<div class="row">
							<h3 align="center">CATEGORIA</h3>
							<select name="tipos" id="tipos" class="form-control">
								<option value="0">Seleccionar Categoria</option>
							</select>
							<h3 align="center">PRODUCTOS</h3>
							<div class="input-group">
								<select name="tipProd" id="tipProd" class="form-control">
									<option value="0">Seleccionar Productos</option>
								</select>
								<span class="input-group-btn">
						          <a href="#" class="btn btn-default" id="addprod">Agregar</a>
						        </span>	
							</div>
							<table id="table1"
					               data-toggle="table"
					               data-toolbar="#toolbar">
					            <thead>
					            <tr>
					                <th data-field="id">Producto</th>
					                <th data-field="name">Cantidad</th>
					                <th data-field="price">Precio</th>
					                <th data-field="total">Total</th>
					            </tr>
					            </thead>
					        </table>
					        <div id="total" name="total" class="pull-right" style="font-size:30px;">
							</div>
								<div align="center">
									<textarea class="form-control" name="obs" id="obs" cols="50" rows="2" placeholder="Observaciones" form="datoscli"></textarea>
								</div>	
							<!--</div>-->
						</div><br>
						<div class="row">
							<div class="centro">
								<a href="#" class="btn btn-primary" id="enviar">Enviar Pedido</a>
								<a href="menu.php" class="btn btn-success">Nuevo Pedido</a>
							</div>
						</div><br><br>
						<div align="center">
							<i class="fa fa-spin fa-spinner fa-3x oculto"></i>
							<h3 id="mensaje3"></h3>
						</div>

					</section>
		</div>
			<p class="info">(c) by Juan Jose for <br><a href="http://www.baesa.com.bo">www.baesa.com.bo</a></p>
		</div>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/cbpFWTabs.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/classie.js"></script>
		<script src="../js/typeahead.js"></script>
		<script src="../js/pedido.js"></script>
		<script src="../js/bootstrapValidator.min.js"></script>
		<script src="../js/sweetalert2.min.js"></script>
		<script src="../js/bootstrap-table.min.js"></script>
		<script src="../js/bootstrap-table-es-SP.min.js"></script>
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
			$('#nuevo').hide();
			

			$('#lis-pro').bootstrapValidator({
		        message: 'This value is not valid',
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		        	name1:{
		        		validators: {
		                    notEmpty: {
		                        message: 'Seleccione un nombre'
		                    }
		                }
		        	},
		            cantidad1: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var almacenes=parseInt($('#ca-al1').text());
		                            return value<=almacenes;
		                        }
		                    }
		                }
		            },
		            precio1: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    }
		                }
		            },
		            name2:{
		        		validators: {
		                    notEmpty: {
		                        message: 'Seleccione un nombre'
		                    }
		                }
		        	},
		            cantidad2: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var almacenes=parseInt($('#ca-al2').text());
		                            return value<=almacenes;
		                        }
		                    }
		                }
		            },
		            precio2: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    }
		                }
		            },
		            name3:{
		        		validators: {
		                    notEmpty: {
		                        message: 'Seleccione un nombre'
		                    }
		                }
		        	},
		            cantidad3: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var almacenes=parseInt($('#ca-al3').text());
		                            return value<=almacenes;
		                        }
		                    }
		                }
		            },
		            precio3: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    }
		                }
		            },
		            name4:{
		        		validators: {
		                    notEmpty: {
		                        message: 'Seleccione un nombre'
		                    }
		                }
		        	},
		            cantidad4: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var almacenes=parseInt($('#ca-al4').text());
		                            return value<=almacenes;
		                        }
		                    }
		                }
		            },
		            precio4: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    }
		                }
		            },
		            name5:{
		        		validators: {
		                    notEmpty: {
		                        message: 'Seleccione un nombre'
		                    }
		                }
		        	},
		            cantidad5: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var almacenes=parseInt($('#ca-al5').text());
		                            return value<=almacenes;
		                        }
		                    }
		                }
		            },
		            precio5: {
		                validators: {
		                    notEmpty: {
		                        message: 'No puede estar vacio'
		                    }
		                }
		            }
		        }
		    });
			//$(".n1").hide();
			/*$("input[name=inputprueba]").change(function(){
				$(".n1").toggle();
			});*/

			$.getJSON("../php/operacionget.php", { ope: "mantecaTipo" })
			  .done(function(respuesta) {
			  	for (var i = 0; i<respuesta.length; i++) {
			  		$("#tipos").append('<option value="'+respuesta[i]+'">'+respuesta[i].toUpperCase()+'</option>');
			  	}
			});

			$("#tipos").change(function(){
		        var valor=$(this).val();
		        $('#tipProd').html('');
			    $.getJSON("../php/operacionget.php", { ope: "archerTipo2",valor:valor })
				  .done(function(respuesta) {
				  	for (var i = 0; i<respuesta.length; i++) {
				  		$("#tipProd").append('<option value="'+respuesta[i]+'">'+respuesta[i].toUpperCase()+'</option>');
				  	}
				});
			});

			var $table = $('#table1');
			var to=0;
			var par=0;
			$('#addprod').on('click',function(e){
				e.preventDefault();
				var producto=$('#tipProd').val();
				$.getJSON("../php/operacionget.php", { ope: "archerTipo4",valor:producto })
				  .done(function(respuesta) {
				  	//console.log(respuesta);
				  	swal({
				      title: ''+producto,
				      text: 'Unidades '+respuesta[0]+' Precio '+respuesta[1]+' Bs.',
				      input: 'tel',
				      showCancelButton: true,
				      inputValidator: function (value) {
				        return new Promise(function (resolve, reject) {
				          if (parseInt(value)<=parseInt(respuesta[0])) {
				            resolve()
				          } else {
				            reject('El monto no puede ser mayor que el saldo!')
				          }
				        })
				      }
				    }).then(function (result) {
				      /*swal({
				        type: 'success'
				      });*/
				      par=parseInt(result)*parseInt(respuesta[1]);
				      $table.bootstrapTable('insertRow', {
				          index: 0,
				          row: {
				              id: producto,
				              name: result,
				              price: respuesta[1],
				              total: par
				          }
				      });
				      to=to+parseInt(par);
				      $('#total').html(""+to);
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

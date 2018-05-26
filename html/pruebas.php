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
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body class="cbp-spmenu-push">
		<div class="container">
			<h3 align="center">PEDIDOS DE MANTECA Y OTROS</h3>
				<select name="name1" id="name1" class="form-control carga">
					<option value="">Seleccionar Producto</option>
				</select>
			 		<form id="lis-pro">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Full name</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="cantidad1" name="cantidad1" placeholder="precio" />
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="cantidad2" name="cantidad2" placeholder="precio" />
                            </div>
                        </div>
                    </form>
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
		<script>
		$(document).ready(function(){
			$('#lis-pro').bootstrapValidator({
		        message: 'This value is not valid',
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok',
		            invalid: 'glyphicon glyphicon-remove',
		            validating: 'glyphicon glyphicon-refresh'
		        },
		        fields: {
		            cantidad1: {
		                validators: {
		                    notEmpty: {
		                        message: 'The first name is required and cannot be empty'
		                    },callback: {
		                        message: 'Elija una cantidad menor',
		                        callback: function(value, validator) {
		                            var producto=$('#name1').val();
		                            var otra=consulta(producto,function(resultado){
		                            	return resultado;
		                            });
		                            console.log(otra);
		                            return 1;
		                        }
		                    }
		                }
		            },
		            cantidad2: {
		                validators: {
		                    notEmpty: {
		                        message: 'The last name is required and cannot be empty'
		                    },
		                    stringLength: {
		                        min: 2,
		                        max: 10,
		                        message: 'no hay stock'
		                    }
		                }
		            }
		        }
		    });
		});
			
		var resp="";
		function consulta(producto,callback){
			$.getJSON("../php/operacionget.php", { ope: "validarstock", nom: producto})
			.done(function(respuesta) {
				resp=(parseInt(respuesta[0]));
				callback(resp); 
			});
		}

		/*function resconsulta(producto){
			consulta(producto,function(resultado){
		          return resultado;
		    });
		}*/
		</script>
	<?PHP
        } 
        else {
            header("location:../index.html");
        }
    ?>
	</body>
</html>

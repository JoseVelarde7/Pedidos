$(document).ready(function(){
/*-------------PARA OBTENER LA FECHA----------*/
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	var f=new Date();
	var fecha=(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
	$('#fechaid,#fechaid1').html(""+fecha);
/*-----------------------------------------------*/
	var arreglo=new Array();
    var n=0;
/*-----------PARA CARGAR LA VISTA PREVIA DE LOS NOMBRES-------------*/
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

	var arreglo7=new Array();
	var n7=0;
	$.getJSON("../php/operacionget.php",{ope: "buscar"})
	  .done(function(resp) {
		$('#names,#names-one').typeahead({
			  hint: true,
			  highlight: true,
			  minLength: 1
			},
			{
			  name: 'states',
			  source: substringMatcher(resp)
		  });
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
/*--------------CARGAR LOS DATOS DE LOS CLIENTES----------------------*/
	$("#buscod").change(function(e){
        e.preventDefault();
		$('.oculto2').css('display','inline-block');
		var valor=$(this).val();
		var arreglo=new Array();
		var n=0;
		$.getJSON("../php/operacionget.php", { ope: "mostrar", nom: valor })
		  .done(function(respuesta) {
	              $.each(respuesta,function(c,v){
	                arreglo[c]=v;
	                n++;
	              });
	        $('#shownombre').attr('value',arreglo[1]);
			$('#showcodigo').attr('value',arreglo[2]);
			$('#shownomnit').attr('value',arreglo[3]);
			$('#shownit').attr('value',arreglo[4]);
			$('#showdir').attr('value',arreglo[5]);
			$('#showcel').attr('value',arreglo[6]);
			switch (arreglo[7]) {
			  case "10":
			    $('#showven').attr('value',"WILLIAM VARGAS");
			    break;
			  case "11":
			    $('#showven').attr('value',"MACARIO VILLANUEVA TANCARA");
			    break;
			  case "14":
			    $('#showven').attr('value',"RODRIGO SEQUEIROS");
			    break;
			  case "20":
			    $('#showven').attr('value',"BERTHA LUCY BLANCO TANCARA");
			    break;
			  case "21":
			  	$('#showven').attr('value',"MARCELO HUANCA");
			    break;
			  case "22":
			  	$('#showven').attr('value',"JHOANA VARGAS COPA");
			    break;
			  case "24":
			  	$('#showven').attr('value',"SANDRA CAPRILES");
			    break;
			  case "25":
			  	$('#showven').attr('value',"CAROS ENCINAS");
			    break;
			  case "29":
			  	$('#showven').attr('value',"LUIS ANTONIO MENDOZA");
			    break;
			  default:
			    $('#showven').attr('value',"OFICINA");
			}
		  });
    });

/*--------------CARGAR VISTA DATOS CLIENTES EN PEDIDO ----------------*/
	$('#names').bind('typeahead:select', function(ev, suggestion) {
		var arreglo=new Array();
		var n=0;
		$.getJSON("../php/operacionget.php", { ope: "mostrar", nom: suggestion })
		  .done(function(respuesta) {
		  	//console.log(respuesta);
	              $.each(respuesta,function(c,v){
	                arreglo[c]=v;
	                n++;
	              });
			$('#codcli').attr("value",arreglo[1]);
			$('#nombre_nit').attr("value",arreglo[3]);
			$('#nit').attr("value",arreglo[4]);
			$('#dir').attr("value",arreglo[5]);
			$('#celular').attr("value",arreglo[6]);
			$('#vendedor').attr("value",arreglo[7]);
		});
		$('#aviso').html("");
		$.getJSON("../php/opcobranzas.php", { ope: "avisoDeuda", nom: suggestion })
		  .done(function(respuesta) {
	        if (respuesta[0].dias>30) {
	        	$('#aviso').html("Este Cliente Tiene Una Deuda Pendiente de "+respuesta[0].dias+" Dias no Puede Realizar Pedidos");
	        }
		});
	});
	$('#names-one').bind('typeahead:select', function(ev, suggestion) {
		var arreglo=new Array();
		var n=0;
		$.getJSON("../php/operacionget.php", { ope: "mostrar", nom: suggestion })
		  .done(function(respuesta) {
		  	//console.log(respuesta);
	            $.each(respuesta,function(c,v){
	              arreglo[c]=v;
	              n++;
	            });
			$('#codcli1').attr("value",arreglo[1]);
			$('#nombrenit1').attr("value",arreglo[3]);
			$('#nit1').attr("value",arreglo[4]);
			$('#dir1').attr("value",arreglo[5]);
			$('#celular1').attr("value",arreglo[6]);
			$('#vendedor1').attr("value",arreglo[7]);
		});
	});
    $(".carga").bind('typeahead:select', function(ev, suggestion){
        var ide=$(this).attr('id');
        //var producto=$(this).val();
		var precio2=("#precio"+ide.substr(4,4));
		var almacen=("#ca-al"+ide.substr(4,4));
		var arreglo=new Array();
		var n=0;
		$.getJSON("../php/operacionget.php", { ope: "buscarprecio", nom: suggestion})
		  .done(function(respuesta) {
		  //console.log(respuesta);
	        $.each(respuesta,function(c,v){
	                arreglo[c]=v;
	                n++;
	        });
			$(precio2).attr("value",arreglo[0]);
			$(almacen).html(""+arreglo[1]);
		  });
    });
    $('.carga1').bind('typeahead:select', function(ev, suggestion) {
		var ide=$(this).attr('id');
        var producto=$(this).val();
		var precio2=("#precio"+ide.substr(4,4));
		var almacen2=("#ca-al"+ide.substr(4,4));
		var arreglo=new Array();
		var n=0;
		//console.log(precio2+" "+almacen2);
		$.getJSON("../php/operacionget.php", { ope: "buscarprecio", nom: producto})
		  .done(function(respuesta) {
	        $.each(respuesta,function(c,v){
	                arreglo[c]=v;
	                n++;
	              });
			$(precio2).attr("value",arreglo[0]);
			$(almacen2).html(""+arreglo[1]);
		  });
	});
/*------------------VISTA PREVIA DE LOS PRODUCTOS---------------------*/
	var arreglo1=new Array();
    var n1=0;
	$.getJSON("../php/operacionget.php",{ope: "buscarpro"})
		  .done(function(resp) {
		  		//console.log(resp);
		  		$('.carga').typeahead({
				  hint: true,
				  highlight: true,
				  minLength: 1
				},
				{
				  name: 'states',
				  limit: 10,
				  source: substringMatcher(resp)
			    });
			    $.each(resp,function(c,v){
					arreglo1[n1]=v;
			        n1++;
			    });
		 		for (var i = 0; i < resp.length; i++) {
					$('.carga22').append("<option value='"+arreglo1[i]+"'>"+arreglo1[i]+"</option>");
				}
		  })
		  .fail(function( jqxhr, textStatus, error ) {
		    var err = textStatus + ", " + error;
		    console.log("Request Failed: "+err);
		  });
/*---------------------VISTA DE LOS PRODUCTOS ARCHER---------*/
	var arreglo1a=new Array();
    var n1a=0;
	$.getJSON("../php/operacionget.php",{ope: "buscarproar"})
		  .done(function(resp) {
		  	//console.log(resp);
		  	   $('.carga1').typeahead({
				  hint: true,
				  highlight: true,
				  minLength: 1
				},
				{
				  name: 'states',
				  limit: 10,
				  source: substringMatcher(resp)
			  });
			  /*$('.carga1').typeahead(null, {
                  name: 'countries',
                  limit: 15,
                  source: substringMatcher(resp)
              });*/
		  	   $.each(resp,function(c,v){
					arreglo1[n1]=v;
			        n1++;
			    });
		 		for (var i = 0; i < resp.length; i++) {
					$('.carga12').append("<option value='"+arreglo1[i]+"'>"+arreglo1[i]+"</option>");
				}
		  })
		  .fail(function( jqxhr, textStatus, error ) {
		    var err = textStatus + ", " + error;
		    console.log("Request Failed: "+err);
		  });
/*--------------------------------------------------------------------*/
	$('#fila1,#fila2,#fila3,#fila4').hide();
	var numero=1;
	var tab;
	var n1;
	var n2;
	var r;
	$('#mas').on('click',function(e){
		e.preventDefault();
		$('#fila'+numero).show();
		numero++;
	});
	$('#menos').on('click',function(e){
		numero--;
		e.preventDefault();
		$('#fila'+numero).hide();
	});
/*--------------------------------------------------------------------*/
$('#fila1a,#fila2a,#fila3a,#fila4a,#fila5a,#fila6a,#fila7a,#fila8a,#fila9a,#fila10a,#fila11a').hide();
	var numeroa=1;
	$('#masa').on('click',function(e){
		e.preventDefault();
		$('#fila'+numeroa+'a').show();
		numeroa++;
	});
	$('#menosa').on('click',function(e){
		numeroa--;
		e.preventDefault();
		$('#fila'+numeroa+'a').hide();
	});
/*------------------PARA REGISTRAR UN PEDIDO---------------------------*/
	//$('#nuevo').hide();
	$('#enviar').on('click',function(e){
		e.preventDefault();
		var datcli=$('#datoscli').serialize();
		var datpro=$('#table1').bootstrapTable('getData');	
		var total=$('#total').text();
		var datos2="operacion=regpedido&"+datcli+"&total="+total;
		console.log(datos2);
		$.ajax({
			url: "../php/registrar2.php",
			method: "POST",
			data: datos2,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje3').html(""+mensaje);
		    $('#datoscli,#lis-pro').find('input, textarea, button, select').attr('disabled','disabled');
		    $('#enviar').hide();
		    $('#nuevo').show();
		    if(mensaje=='insertado'){
		    	$.post("../php/registrar2.php",{operacion: "regArcher",datos:datpro})
			    .done(function(resp) {
			    	$('#mensaje3').html("Pedido "+resp);
				});
		    }
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
	$('#enviarar').on('click',function(e){
		e.preventDefault();
		var datcli=$('#datoscliar').serialize();
		var datpro=$('#table1').bootstrapTable('getData');	
		var total=$('#totala').text();
		var datos2="operacion=regpedido-ar&"+datcli+"&total="+total;
		$.ajax({
			url: "../php/registrar2.php",
			method: "POST",
			data: datos2,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#datoscliar,#lis-proar').find('input, textarea, button, select').attr('disabled','disabled');
		    $('#enviarar').hide();
		    console.log(mensaje);
		    if(mensaje=='insertado'){
		    	$.post("../php/registrar2.php",{operacion: "regArcher",datos:datpro})
			    .done(function(resp) {
			    	$('#mensaje3ar').html("Pedido "+resp);
				});
		    }
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
	var suma=0;
	$("#precio1a,#precio2a,#precio3a,#precio4a,#precio5a,#precio6a,#precio7a,#precio8a,#precio9a,#precio10a,#precio11a").keyup(function(){
		suma=(parseFloat($("#total1a").text()))+(parseFloat($("#total2a").text()))+(parseFloat($("#total3a").text()))+(parseFloat($("#total4a").text()))+(parseFloat($("#total5a").text()))+(parseFloat($("#total6a").text()))+(parseFloat($("#total7a").text()))+(parseFloat($("#total8a").text()))+(parseFloat($("#total9a").text()))+(parseFloat($("#total10a").text()))+(parseFloat($("#total11a").text()));
    	$("#totala").html(suma);
	});
	$('.totales1').bind('DOMSubtreeModified',function(){
		suma=(parseFloat($("#total1a").text()))+(parseFloat($("#total2a").text()))+(parseFloat($("#total3a").text()))+(parseFloat($("#total4a").text()))+(parseFloat($("#total5a").text()))+(parseFloat($("#total6a").text()))+(parseFloat($("#total7a").text()))+(parseFloat($("#total8a").text()))+(parseFloat($("#total9a").text()))+(parseFloat($("#total10a").text()))+(parseFloat($("#total11a").text()));
    	$("#totala").html(suma);
	});
	var suma1=0;
	$('.totales').bind('DOMSubtreeModified',function(){
		suma1=(parseFloat($("#total1").text()))+(parseFloat($("#total2").text()))+(parseFloat($("#total3").text()))+(parseFloat($("#total4").text()))+(parseFloat($("#total5").text()));
    	$("#total").html(suma1);
	});
	$("#precio1,#precio2,#precio3,#precio4,#precio5").keyup(function(){
		suma1=(parseFloat($("#total1").text()))+(parseFloat($("#total2").text()))+(parseFloat($("#total3").text()))+(parseFloat($("#total4").text()))+(parseFloat($("#total5").text()));
    	$("#total").html(suma1);
	});
/*------------------MOSTRAR LA LISTA DE CLIENTES------------------------*/
	$('#listar-cli').click(function(e){
		e.preventDefault();
		$.getJSON("../php/operacionget.php", { ope: "listartodo"})
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
	});
	$('#listar-cli2').click(function(e){
		e.preventDefault();
		$.getJSON("../php/operacionget.php", { ope: "listartodo2"})
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
	});
/*------------------PARA REGISTRAR UN CLIENTE---------------------------*/
	$('#boton').click(function(e){
		e.preventDefault();
		var datos=$('#formulario1').serialize();
		//console.log(datos);
		$.ajax({
			url: "../php/operacion.php",
			method: "POST",
			data: 'ope=reg-pedido&'+datos,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje').html(""+mensaje);
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
/*------------------MODIFICAR UN CLIENTE---------------------------------*/
	$('#modificar').click(function(e){
		e.preventDefault();
		$('#shownombre,#showcodigo,#shownomnit,#shownit,#showdir,#showcel,#showven').removeAttr('disabled');
		$('#editar').css('display','block');
		$(this).css('display','none');
	});
	$('#editar').on('click',function(e){
		e.preventDefault();
		var datos=$('#formulario2').serialize();
		console.log(datos);
		$.ajax({
			url: "../php/operacion.php",
			method: "POST",
			data: "ope=actualizar&"+datos,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje2').html(""+mensaje);
		    console.log(mensaje);
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
/*----------------MOSTRAR TABLA DE PRODUCTOS-------------------------*/
	$('#listar-prod').click(function(e){
		e.preventDefault();
		$.getJSON("../php/operacionget.php", { ope: "listarprod"})
			  .done(function(respuesta) {
			  	  //console.log(respuesta);
			  	  $('#table2').bootstrapTable('destroy');
		          $('#table2').bootstrapTable({
					    columns: [{
					        field: 'codigo',
					        title: 'COD'
					    }, {
					        field: 'nombre_prod',
					        title: 'NOMBRE'
					    },/* {
					        field: 'unidad',
					        title: 'UNIDAD'
					    },*/ {
					        field: 'uni_almacen',
					        title: 'UNI'
					    }, {
					        field: 'precio',
					        title: 'PRECIO'
					    }/*, {
					        field: 'observacion',
					        title: 'OBSERVACION'
					    }*/],
					    data: respuesta
				  });
			  });
	});
/*-----------------PARA REGISTRAR UN PRODUCTO-----------------------*/
	$('#reg-prod').click(function(e){
		e.preventDefault();
		var datos=$('#formulario2').serialize();
		console.log(datos);
		$.ajax({
			url: "../php/operacion.php",
			method: "POST",
			data: 'ope=reg-producto&'+datos,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje2').html(""+mensaje);
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
/*-----------------------PARA MOSTRAR LA EDICION DE PRODUCTOS--------------*/
	$("#prod-carga").change(function(e){
       e.preventDefault();
		$('.oculto2').css('display','inline-block');
		var valor=$(this).val();
		var arreglo=new Array();
		var n=0;
		$.getJSON("../php/operacionget.php", { ope: "mostrar-prod", nom: valor })
		  .done(function(respuesta) {
	              $.each(respuesta,function(c,v){
	                arreglo[c]=v;
	                n++;
	              });
	        $('#showprod').attr('value',arreglo[1]);
			$('#showcod').attr('value',arreglo[2]);
			$('#showunidad').attr('value',arreglo[4]);
			$('#showalm').attr('value',arreglo[5]);
			$('#showprecio').attr('value',arreglo[6]);
			$('#showobs').attr('value',arreglo[7]);
		  });
    });
/*-----------------PARA HABILITAR LAS CASILLAS DE LOS PRODUCTOS------------*/
	$('#modificar-prod').click(function(e){
		e.preventDefault();
		$('#showprod,#showcod,#showunidad,#showalm,#showprecio,#showobs').removeAttr('disabled');
		$('#editar-prod').css('display','block');
		$(this).css('display','none');
	});
	$('#editar-prod').on('click',function(e){
		e.preventDefault();
		var datos=$('#formulario4').serialize();
		console.log(datos);
		$.ajax({
			url: "../php/operacion.php",
			method: "POST",
			data: "ope=actualizar-prod&"+datos,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje3').html(""+mensaje);
		    console.log(mensaje);
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
/*---------------------------CARGAR LISTA DE PEDIDOS------------------------*/
	$('#listar-pedido').click(function(e){
		e.preventDefault();
		$.getJSON("../php/operacionget.php", {ope: "listarpedidos"})
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
					        field: 'direccion',
					        title: 'DIRECCION'
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
					        field: 'modificar',
					        title: 'MODIFICAR',
					        events: operateEvents5,
					        formatter: operateFormatter51
					    }, {
					        field: 'operacion2',
					        title: 'ANULAR',
					        events: operateEvents4,
					        formatter: operateFormatter41
					    }],
					    data: respuesta
				  });
			  });
	});
	$('#listar-pedido2').click(function(e){
		e.preventDefault();
		$.getJSON("../php/operacionget.php", {ope: "listar-dos"})
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
					        field: 'vendedor',
					        title: 'VENDEDOR'
					    }, {
					        field: 'nombrenit',
					        title: 'NOMBRE NIT'
					    }, {
					        field: 'nit',
					        title: 'NIT'
					    }, {
					        field: 'boton',
					        title: 'PRODUCTOS',
					        events: operateEvents1,
					        formatter: operateFormatter
					    }, {
					        field: 'factura',
					        title: 'FACTURA',
					    }, {
					        field: 'estado',
					        title: 'ESTADO',
					        formatter: formato2
					    }, {
					        field: 'operacion',
					        title: 'ENTREGAR',
					        events: operateEvents3,
					        formatter: operateFormatter3
					    }, {
					        field: 'modificar',
					        title: 'MODIFICAR',
					        events: operateEvents5,
					        formatter: operateFormatter5
					    }, {
					        field: 'operacion2',
					        title: 'ANULAR',
					        events: operateEvents4,
					        formatter: operateFormatter4
					    }, {
					        field: 'codigo',
					        title: 'CODIGO'
					    }, {
					        field: 'observacion',
					        title: 'OBSERVACION'
					    }],
					    data: respuesta
				  });
		          $('#table-pedido').bootstrapTable('hideColumn', 'codigo');
				  $('#table-pedido').bootstrapTable('hideColumn', 'observacion');
			  });
	});
/*------------------------VALIDACIONES-------------------------------------*/
	$("#regfactura").on('click',function(e){
		e.preventDefault();
		var ie=$('#codigo-invoice').text();
		var nf=$('#number-invoice').val();
		/*console.log("hola");*/
		$.getJSON("../php/operacionget.php", {ope: "add-invoice",ide:ie,numfac:nf})
			  .done(function(resp) {
			  	console.log(resp);
			  	 $('#men-invoice').html(""+resp);
		});
	});		
	$("#change").on('click',function(e){
		e.preventDefault();
		//console.log("it's works..");
		$('#lis-pro').each(function(){
  			this.reset();
		});
		$('#resmodifica').html("");
		$('#total1').html("");
		$('#total2').html("");
		$('#total3').html("");
		$('.ocultar').hide();
	});	
	$('#change-agregar').on('click',function(e){
		e.preventDefault();
		var dat=$('#lis-pro').serialize();
		var ides=$('#ides').text();
		var datos2="operacion=change-reg&"+dat+"&ide="+ides;
		//console.log(datos2);
		$.ajax({
			url: "../php/registrar2.php",
			method: "POST",
			data: datos2,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $("#resmodifica").html("Registro Agregado "+mensaje);
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});
});

var nu1,nu2,res; 
function sumar(numero1,numero2,salida){
	nu1=parseFloat($(numero1).val());
	nu2=parseFloat($(numero2).val());
	res=nu1*nu2;
	$(salida).html(""+res);
}
	function operateFormatter(value, row, index) {
        return [
            '<a class="like btn btn-info" id="verdatos" href="javascript:void(0)" title="Like">',
            '<i class="glyphicon glyphicon-play" data-toggle="modal" data-target="#modaltabla"> Ver</i>',
            '</a>'
        ].join('');
    }
    function operateFormatter3(value, row, index) {
    	var estado2=row.estado;
    	if(estado2==''){
    	return [
            '<a class="like btn btn-success" title="Like" data-toggle="modal" data-target="#modal2">',
            '<i class="glyphicon glyphicon-ok"> Entregar</i>',
            '</a>'
        ].join('');	
    	}
    	else{
    	return [
            '<a class="like btn btn-success" href="javascript:void(0)" title="Entregar" disabled>',
            '<i class="glyphicon glyphicon-ok"> Entregar</i>',
            '</a>'
        ].join('');		
    	}
    }
    function operateFormatter4(value, row, index) {
        var estado = row.estado;
        if (estado=='anulado') {
        return [
            '<a class="like btn btn-danger" href="javascript:void(0)" title="Anular" disabled>',
            '<i class="glyphicon glyphicon-erase"> Anular</i>',
            '</a>'
        ].join('');	
        }
        else{
        return [
            '<a class="like btn btn-danger" href="javascript:void(0)" title="Anular">',
            '<i class="glyphicon glyphicon-erase"> Anular</i>',
            '</a>'
        ].join('');	
        }
        
    }
    function operateFormatter5(value, row, index) {
        var estado = row.estado;
        if (estado=='anulado') {
        return [
            '<a class="like btn btn-warning" href="javascript:void(0)" title="Modificar" disabled>',
            '<i class="glyphicon glyphicon-erase"> Modificar</i>',
            '</a>'
        ].join('');	
        }
        else{
        return [
            '<a class="like btn btn-warning" href="#" data-toggle="modal" data-target="#modaltabla2" title="Modificar">',
            '<i class="glyphicon glyphicon-edit"> Modificar</i>',
            '</a>'
        ].join('');	
        }
        
    }
    function operateFormatter51(value, row, index) {
        var estado = row.estado;
        if (estado=='anulado' || estado=='entregado') {
        return [
            '<a class="like btn btn-warning" href="javascript:void(0)" title="Modificar" style="display:none;>',
            '<i class="glyphicon glyphicon-erase"> Modificar</i>',
            '</a>'
        ].join('');	
        }
        else{
        return [
            '<a class="like btn btn-warning" href="#" data-toggle="modal" data-target="#modaltabla2" title="Modificar">',
            '<i class="glyphicon glyphicon-edit"> Modificar</i>',
            '</a>'
        ].join('');	
        }
    }
    function operateFormatter41(value, row, index) {
        var estado = row.estado;
        if (estado=='anulado' || estado=='entregado') {
        return [
            '<a class="like btn btn-danger" href="javascript:void(0)" title="Anular" style="display:none;">',
            '<i class="glyphicon glyphicon-erase"> Anular</i>',
            '</a>'
        ].join('');	
        }
        else{
        return [
            '<a class="like btn btn-danger" href="javascript:void(0)" title="Anular">',
            '<i class="glyphicon glyphicon-erase"> Anular</i>',
            '</a>'
        ].join('');	
        }
        
    }

    function formato2(value, row, index) {
    	if(value=='entregado'){
    		return "<h4><span class='label label-success'>"+value+"</span></h4>";
    	}
    	if(value=='anulado'){
    		return "<h4><span class='label label-default'>"+value+"</span></h4>";
    	}
    	else{
    		return "<h4><span class='label label-danger'>En Espera</span></h4>";	
    	}
    }
    var valores="";
    operateEvents = {
        'click .like': function (e, value, row, index) {
            //$('#mostrarmen').html(''+/*JSON.stringify(row.pedidoid)*/row.pedidoid);
            valores=row.pedidoid;
            $('#nompd').html(""+row.nombre);
            $('#fechapd').html(""+row.fecha);
            $('#nomnitpd').html(""+row.nombrenit);
            $('#numnitpd').html(""+row.nit);
            $.getJSON("../php/operacionget.php", {ope: "listar-pedi2",ide:valores})
			  .done(function(resp) {
			  	  //console.log(resp);
			  	  $('#mostrarmen').bootstrapTable('destroy');
		          $('#mostrarmen').bootstrapTable({
					    columns: [{
					        field: 'codigo',
					        title: 'CODIGO'
					    }, { 
					        field: 'producto',
					        title: 'PRODUCTO'
					    }, {
					        field: 'cantidad',
					        title: 'CANTIDAD'
					    }, {
					        field: 'precio',
					        title: 'PRECIO'
					    }, {
					        field: 'total',
					        title: 'TOTAL',
					        formatter: formatosuma
					    }],
					    data: resp
				  });
			  });
        }
    };
    operateEvents1 = {
        'click .like': function (e, value, row, index) {
            //$('#mostrarmen').html(''+/*JSON.stringify(row.pedidoid)*/row.pedidoid);
            valores=row.pedidoid;
            $('#nompd').html(""+row.nombre);
            $('#fechapd').html(""+row.fecha);
            $('#nomnitpd').html(""+row.nombrenit);
            $('#numnitpd').html(""+row.nit);
            $('#ncodigo').html(""+row.codigo);
            $('#nobservacion').html(""+row.observacion);
            $.getJSON("../php/operacionget.php", {ope: "listar-pedi2",ide:valores})
			  .done(function(resp) {
			  	  //console.log(resp);
			  	  $('#mostrarmen').bootstrapTable('destroy');
		          $('#mostrarmen').bootstrapTable({
					    columns: [{
					        field: 'codigo',
					        title: 'CODIGO',
					        /*editable: true,**/
					        formatter: formedit
					    }, { 
					        field: 'producto',
					        title: 'PRODUCTO',
					        formatter: formedit
					    }, {
					        field: 'cantidad',
					        title: 'CANTIDAD',
					        formatter: formedit
					    }, {
					        field: 'precio',
					        title: 'PRECIO',
					        formatter: formedit
					    }, {
					        field: 'total',
					        title: 'TOTAL',
					        formatter: formatosuma
					    }],
					    data: resp
				  });
			  });
        }
    };
    var valores2="";
    operateEvents3 = {
        'click .like': function (e, value, row, index) {
        	$("#men-invoice").html("");
        	$("#number-invoice").val('');
        	valores2=row.pedidoid;
            $.getJSON("../php/operacionget.php", {ope: "update-state",ide:valores2})
			  .done(function(resp) {
			  	  var puntero=parseInt(index);
			  	  $('#table-pedido').bootstrapTable('updateRow', {
	                index: puntero,
	                row: {
	                    estado:"entregado"
	                }
	              });
	              var cdi=row.pedidoid;
	              $('#codigo-invoice').html(""+cdi);
			});
        }
    };
    var valores3="";
    operateEvents4 = {
        'click .like': function (e, value, row, index) {
        	valores3=row.pedidoid;
            $.getJSON("../php/operacionget.php", {ope: "delete-state",ide:valores3})
			  .done(function(resp) {
			  	console.log(resp);
			  	  var puntero=parseInt(index);
			  	  $('#table-pedido').bootstrapTable('updateRow', {
	                index: puntero,
	                row: {
	                    estado:"anulado"
	                }
	              });
			});
        }
    };
    operateEvents5 = {
        'click .like': function (e, value, row, index) {
            //$('#mostrarmen').html(''+/*JSON.stringify(row.pedidoid)*/row.pedidoid);
            valores=row.pedidoid;
            $('#ides').html(""+row.pedidoid );
            $('#nompd1').html(""+row.nombre);
            $('#fechapd1').html(""+row.fecha);
            $('#nomnitpd1').html(""+row.nombrenit);
            $('#numnitpd1').html(""+row.nit);
            $.getJSON("../php/operacionget.php", {ope: "listar-pedi2",ide:valores})
			  .done(function(resp) {
			  	  //console.log(resp);
			  	  $('#mostrarmen1').bootstrapTable('destroy');
		          $('#mostrarmen1').bootstrapTable({
					    columns: [{
					        field: 'codigo',
					        title: 'CODIGO'
					        /*editable: true,
					        formatter: formedit*/
					    }, { 
					        field: 'producto',
					        title: 'PRODUCTO'
					    }, {
					        field: 'cantidad1',
					        title: 'CANTIDAD'
					    }, {
					        field: 'cantidad',
					        title: 'CANTIDAD'
					    }, {
					        field: 'precio1',
					        title: 'PRECIO'
					    }, {
					        field: 'precio',
					        title: 'PRECIO'
					    }/*, {
					        field: 'total',
					        title: 'TOTAL',
					        formatter: formatosuma
					    }, {
					        field: 'modificar',
					        title: 'MODIFICAR',
					        events: eventochange,
					        formatter: formatoedit
					    }*/, {
					        field: 'eliminar',
					        title: 'ELIMINAR',
					        events: eventodelete,
					        formatter: formatodelete
					    }],
					    data: resp
				  });
				  $('#mostrarmen1').bootstrapTable('hideColumn', 'cantidad1');
				  $('#mostrarmen1').bootstrapTable('hideColumn', 'precio1');
			  });
        }
    };
    eventodelete = {
        'click .like': function (e, value, row, index) {
        	var ide1=$('#ides').text();
        	var item=row.producto;
        	var cant=row.cantidad;
        	var pre=(row.cantidad)*(row.precio);
            $.getJSON("../php/operacionget.php", {ope: "anular-columna",ide:ide1,producto:item,cantidad:cant,precio:pre})
			   .done(function(resp) {
			  	 //console.log(resp);
			  	 $('#resmodifica').html(""+resp);
			   });
        }
    };
    eventochange = {
        'click .like': function (e, value, row, index) {
        	var ide1=$('#ides').text();
        	var item=row.producto;
        	var cant=row.cantidad;
        	var preci=row.precio;
        	var preci1=row.precio1;
        	var total=row.cantidad1;
        	console.log(ide1+" "+item+" "+cant+" "+preci+" "+total);
            /*$.getJSON("../php/operacionget.php", {ope: "cambiar-columna",ide:ide1,producto:item,cantidad:cant,precio:preci,can1:total,precio1:preci1})
			   .done(function(resp) {
			  	 $('#resmodifica').html(""+resp);
			});*/
        }
    };
    function formatosuma(value, row, index) {
        return (parseFloat(row.cantidad))*(parseFloat(row.precio));
    }
    function formedit(value, row, index) {
        return "<span>"+value+"</span>";
    }
    function formedit2(value, row, index) {
        return [
            '<a class="like btn btn-info" href="javascript:void(0)" title="Modificar">'+value+'</a>'
        ].join('');
    }
    function formatoedit(value, row, index) {
        return [
            '<a class="like btn btn-success" href="javascript:void(0)" title="Modificar">',
            '<i class="glyphicon glyphicon-edit"> Modificar</i>',
            '</a>'
        ].join('');	     
    }
    function formatodelete(value, row, index) {
        return [
            '<a class="like btn btn-danger" href="javascript:void(0)" title="Eliminar">',
            '<i class="glyphicon glyphicon-erase"> Eliminar</i>',
            '</a>'
        ].join('');	     
    }
    function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];
        /*if (index % 2 === 0 && index / 2 < classes.length) {
            return {
                classes: classes[index / 2]
            };
        }*/
        var estado=row.estado;
        if(estado==''){
        	return {classes: classes[4]};
        }
        if(estado=='entregado'){
        	return {classes: classes[1]};
        }
        if(estado=='anulado'){
        	return {classes: classes[2]};
        }
        return {};
    }
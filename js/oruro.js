$(document).ready(function(){

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
	$.getJSON("../../php/operacionget.php",{ope: "buscar"})
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
	  })
	  .fail(function( jqxhr, textStatus, error ) {
	    var err = textStatus + ", " + error;
	    console.log( "Request Failed: " + err );
	  });

	var arreglo1=new Array();
  var n1=0;
	$.getJSON("../../php/operacionget.php",{ope: "buscarproco"})
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
		  })
		  .fail(function( jqxhr, textStatus, error ) {
		    var err = textStatus + ", " + error;
		    console.log("Request Failed: "+err);
		  });

	  $('#names').bind('typeahead:select', function(ev, suggestion) {
		var arreglo=new Array();
		var n=0;
		$.getJSON("../../php/operacionget.php", { ope: "mostrar", nom: suggestion })
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
	   });
	$('#boton').click(function(e){
		e.preventDefault();
		var datos=$('#formulario1').serialize();
		//console.log(datos);
		$.ajax({
			url: "../../php/operacion.php",
			method: "POST",
			data: 'ope=reg-pedido&'+datos,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#mensaje').html(""+mensaje);
		    $('#boton').hide();
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
		})
	});

	$('#resetear').on('click',function(e){
		e.preventDefault();
		$('#boton').show();
		$('#mensaje').html("");
		$('#formulario1')[0].reset();
		$('#codigo').attr('value',parseInt($('#codigo').val())+1);
	});

	$('#listacliente').click(function(e){
		e.preventDefault();
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
	});

	$("#buscod").change(function(e){
        e.preventDefault();
		$('.oculto2').css('display','inline-block');
		var valor=$(this).val();
		var arreglo=new Array();
		var n=0;
		$.getJSON("../../php/operacionget.php", { ope: "mostrar", nom: valor })
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
			$('#showven').attr('value',"ORURO");
		  });
    });

    $('#editar').on('click',function(e){
			e.preventDefault();
			var datos=$('#formulario2').serialize();
			console.log(datos);
			$.ajax({
				url: "../../php/operacion.php",
				method: "POST",
				data: "ope=actualizar-or&"+datos,
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

	$('#reloadtable').on('click',function(e){
		e.preventDefault();
		$('#table').bootstrapTable('destroy');
		$.getJSON("../../php/operacionget.php", { ope: "listartodoor"})
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

	$('#showtab3').on('click',function(e){
		e.preventDefault();
		$.getJSON("../../php/operacionget.php", { ope: "listarprodor"})
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
					    },/* {
					        field: 'unidad',
					        title: 'UNIDAD'
					    },*/ {
					        field: 'oruro',
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

	$('#enviar').on('click',function(e){
		e.preventDefault();
		var datcli=$('#datoscli').serialize();
		var datpro=$('#table1').bootstrapTable('getData');		
		var total=$('#total').text();
		var datos2="operacion=regpedido-man&"+datcli+"&total="+total;
		//console.log(datos2);
		$.ajax({
			url: "../../php/registrar2.php",
			method: "POST",
			data: datos2,
			beforeSend: function() {
			    $('.oculto').css('display','block');
			}
		}).done(function(mensaje) {
		    $('#enviar').hide();
		    if(mensaje=='insertado'){
		    	console.log(datpro);
		    	$.post("../../php/registrar2.php",{operacion: "regMantecaor",datos:datpro})
				    .done(function(resp) {
				    	$('#mensaje3').html("Pedido "+resp);
					});
		    }
		}).fail(function() {
		    console.log("error");
		}).always(function() {
			$('.oculto').css('display','none');
			$('#nuevo').show();
		})
	});

	$('#showtab4').on('click',function(e){
		e.preventDefault();
		$.getJSON("../../php/operacionget.php", {ope: "listar"})
			  .done(function(respuesta) {
			  	  console.log(respuesta);
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
						    }, /*{
						        field: 'direccion',
						        title: 'DIRECCION'
						    }, */{
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
						    },{
						        field: 'operacion',
						        title: 'ENTREGAR',
						        events: operateEvents3,
						        formatter: operateFormatter3
						    },{
						        field: 'operacion2',
						        title: 'ANULAR',
						        events: operateEvents4,
						        formatter: operateFormatter41
						    }],
						    data: respuesta
					  });
			  });
	});

	$('#showtab6').on('click',function(e){
		e.preventDefault();
		$.getJSON("../../php/operacionget.php", {ope: "listarpedidosor"})
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
	});

	var $table = $('#table1');
	var to=0;
	var par=0;
	$('#addprod').on('click',function(e){
		e.preventDefault();
		var producto=$('#producto1').val();
		//console.log(producto);
		$.getJSON("../../php/operacionget.php", { ope: "archerTipo5",valor:producto })
		  .done(function(respuesta) {
		  	console.log(respuesta);
		    swal.setDefaults({
			  input: 'text',
			  confirmButtonText: 'Next &rarr;',
			  showCancelButton: true,
			  animation: false,
			  progressSteps: ['1', '2']
			})

			var steps = [
			  {
			    title: ''+producto,
			    text: 'Unidades en Almacen '+respuesta[0]
			  },
			  {
			    title: ''+producto,
			    text: 'Precio Sugerido '+respuesta[1]
			  }
			]
			swal.queue(steps).then(function (result) {
			  swal.resetDefaults();
			  swal({
		        type: 'success'
		      });
		      par=parseFloat(result[0])*parseFloat(result[1]);
		      $table.bootstrapTable('insertRow', {
		          index: 0,
		          row: {
		              id: producto,
		              name: result[0],
		              price: result[1],
		              total: par
		          }
		      });
		      to=to+parseFloat(par);
		      $('#total').html(""+to);
		      $('#producto1').val(" ");
			  /*swal({
			    title: 'All done!',
			    html:
			      'Your answers: <pre>' +
			        //JSON.stringify(result) +
			        result[0] + result[1] + 
			      '</pre>',
			    confirmButtonText: 'Lovely!',
			    showCancelButton: false
			  })*/
			}, function () {
			  swal.resetDefaults()
			});

		});
	});

	$("#regfactura").on('click',function(e){
		e.preventDefault();
		var ie=$('#codigo-invoice').text();
		var nf=$('#number-invoice').val();
		/*console.log("hola");*/
		$.getJSON("../../php/operacionget.php", {ope: "add-invoice",ide:ie,numfac:nf})
			  .done(function(resp) {
			  	console.log(resp);
			  	 $('#men-invoice').html(""+resp);
		});
	});
});
	function formatosuma(value, row, index) {
        return (parseFloat(row.cantidad))*(parseFloat(row.precio));
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
    var valores3="";
    operateEvents4 = {
        'click .like': function (e, value, row, index) {
        	valores3=row.pedidoid;
            $.getJSON("../../php/operacionget.php", {ope: "delete-state",ide:valores3})
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
    var valores="";
    operateEvents = {
        'click .like': function (e, value, row, index) {
            //$('#mostrarmen').html(''+/*JSON.stringify(row.pedidoid)*/row.pedidoid);
            valores=row.pedidoid;
            $('#nompd').html(""+row.nombre);
            $('#fechapd').html(""+row.fecha);
            $('#nomnitpd').html(""+row.nombrenit);
            $('#numnitpd').html(""+row.nit);
            $.getJSON("../../php/operacionget.php", {ope: "listar-pedi2",ide:valores})
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
    var valores2="";
    operateEvents3 = {
        'click .like': function (e, value, row, index) {
        	$("#men-invoice").html("");
        	$("#number-invoice").val('');
        	valores2=row.pedidoid;
            $.getJSON("../../php/operacionget.php", {ope: "update-state",ide:valores2})
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
    function operateFormatter3(value, row, index) {
    	var estado2=row.estado;
    	if(estado2==''){
    	return [
            '<a class="like btn btn-success" title="Like" data-toggle="modal" data-target="#modalventana">',
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
    function operateFormatter(value, row, index) {
        return [
            '<a class="like btn btn-info" id="verdatos" href="javascript:void(0)" title="Like">',
            '<i class="glyphicon glyphicon-play" data-toggle="modal" data-target="#modaltabla"> Ver</i>',
            '</a>'
        ].join('');
    }
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
	
	var $table = $('#table1');
	var to=0;
	var par=0;
	$('#addprod').on('click',function(e){
		e.preventDefault();
		var producto=$('#tipProd').val();
		  	var cadena3=new Array();
		  	cadena3=devolverProducto(arreglo12[1],producto);
		    swal({
			  title: ''+cadena3[0].nombre,
			  showCancelButton: true,
			  confirmButtonText: 'Agregar',
			  cancelButtonText: 'Cancelar!',
			  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
			  html:
			  	'<h3>Unidades en Almacen '+cadena3[0].unidades+'</h3>'+
			    'Unidades: <input id="swal-input1" type="tel" class="swal2-input">' +
			    'Precio: <input id="swal-input2" type="tel" class="swal2-input" value="'+cadena3[0].precio+'">',
			  focusConfirm: false,
			  preConfirm: function () {
			  	return new Promise(function (resolve, reject) {
			  	  var adn=$('#swal-input1').val();
		          if (parseInt(adn)<=parseInt(cadena3[0].unidades)) {
		            resolve([
				        $('#swal-input1').val(),
				        $('#swal-input2').val()
				    ])
		          } else {
		            reject('No hay Stock Suficiente!')
		          }
		        })
			  }
			}).then(function (result) {
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
			}).catch(swal.noop)


	});

	var arreglo12=new Array();
var n12=0;
Array.prototype.unique=function(a){
	return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
	});
	$.getJSON("../php/operacionget.php", {ope:"exdatos"})
	  .done(function(respuesta) {
	  	//console.log(respuesta);
	  	$.each(respuesta,function(c,v){
			arreglo12[n12]=v;
	      n12++;
	    });
	    for (var i = 0; i<arreglo12[0].unique().length; i++) {
	  		$("#tipos").append('<option value="'+arreglo12[0].unique()[i]+'">'+arreglo12[0].unique()[i].toUpperCase()+'</option>');
	  	}
	  	arreglo12[0].sort(function (a){
		  	return (a.descripcion);
			});
	});

	$("#tipos").change(function(){
      var valor=$(this).val();
      $('#tipProd').html('');
		  var cadena2=new Array();
		  cadena2=devolverTipos(arreglo12[1],valor);
		  for (var i = 0; i<cadena2.length; i++) {
			 	$("#tipProd").append('<option value="'+cadena2[i].nombre+'">'+cadena2[i].nombre+'</option>');
		  }
	});

	function encontrarCerezas(fruta) { 
	    return fruta.observacion === 'MANTECAS';
	}
	function devolverTipos(cadena,tipo){
		var arrTipos=new Array();
		$.each(cadena,function(c,v){
			if(v.observacion==tipo){
				arrTipos.push(v);
			}
	    });
	    return(arrTipos);
	}
	function devolverProducto(cadena,productos){
		var arrProductos=new Array();
		$.each(cadena,function(c,v){
				if(v.nombre==productos){
					arrProductos.push(v);
				}
	    });
	    return(arrProductos);
	}
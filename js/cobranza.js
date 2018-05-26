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
  $.getJSON("../php/operacionget.php",{ope: "buscar"})
    .done(function(resp) {
    $('#cliente').typeahead({
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
  $('#cliente').bind('typeahead:select', function(ev, suggestion) {
    //console.log(suggestion);
    $.getJSON("../php/opcobranzas.php", {ope: "t-cobranza",nombre:suggestion})
        .done(function(respuesta) {
          var sum=0;
          for (var i = 0 ;i<Object.keys(respuesta).length; i++) {
             sum=sum+parseFloat(respuesta[i].saldo);
          }
          //console.log(respuesta);
          if (respuesta==null){
          $('#mensaje-cobranza').html("El Cliente No Tiene Deudas Pendientes");
          }else{
          $("#totalcob").html(""+sum);
          $(".oculto").show();
          $('#tab-cobranza').bootstrapTable('destroy');
          $('#tab-cobranza').bootstrapTable({
              columns: [{
                  field: 'tipo',
                  title: 'TIPO'  
              }, {
                  field: 'numero',
                  title: 'NUMERO'
              }, {
                  field: 'vendedor',
                  title: 'VENDEDOR'
              }, {
                  field: 'emitido',
                  title: 'EMITIDO'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }, {
                  field: 'pago',
                  title: 'PAGO'
              }, {
                  field: 'saldo',
                  title: 'SALDO'
              }, {
                  field: 'dias',
                  title: 'DIAS'
              }, {
                  field: 'boliviano',
                  title: 'BOLIVIANOS',
                  events: evento1,
                  formatter: formato1
              }],
              data: respuesta
          });
          $('#tab-cobranza').bootstrapTable('hideColumn', 'vendedor');
          }
        });
  });
  $('#reg-cobranza').on('click',function(e){
    e.preventDefault();
    var datos=$('#table').bootstrapTable('getData');
    var nrecibo=$('#n-recibo').val();
    var cliente=$('#cliente').val();
    var saldo=$('#saldorecibo').text();
    var vendedor=$('#ven').text();
    var cadena={recibo:nrecibo,cliente:cliente,saldo:saldo,vendedor:vendedor}
    //console.log(+",{} "+nrecibo+" "+cliente+" "+saldo)
    //console.log(cadena);
      $.ajax({
        url: "../php/operacion.php",
        method: "POST",
        data: {ope:'reg-recibo',dato:datos,cad:cadena},
        beforeSend:function(){
          $('.invi').show();
        }
      }).done(function(mensaje){
          console.log(mensaje);
          if(mensaje=='insertado'){
            $("#resultado").html("Pago Registrado");
          }else{
            $("#resultado").html("Error NO se Registro...");
          }
          $("#newpago").show();
          $("#reg-cobranza").hide();
          $('.invi').hide();
      }).fail(function() {
          console.log("error");
      });
  });
  /*****************PANEL ADMIN*************************/
  $('#show1').on('click',function(e){
    e.preventDefault();
    var ide=$('#nombre-c').val();
    $.getJSON("../php/opcobranzas.php", {ope: "show-cobranza",ide:ide})
        .done(function(respuesta) {
        $('#dato1').html(respuesta[0]+" Bs");
        $('#dato3').html(respuesta[1]);
        $('#dato2').html(respuesta[2]+" Dias");
        $('#dato4').html(respuesta[3]+" Bs");
        $('#dato5').html(respuesta[4]);
    });
    $.getJSON("../php/opcobranzas.php", {ope: "t-deudas",nombre:ide})
        .done(function(respuesta) {
          $('#deudores').bootstrapTable('destroy');
          $('#deudores').bootstrapTable({
              columns: [/*{
                  field: 'numero',
                  title: 'NUMERO'
              },*/ {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'emitido',
                  title: 'EMITIDO'
              }/*, {
                  field: 'total',
                  title: 'TOTAL'
              }*/, {
                  field: 'dias',
                  title: 'DIAS'
              }],
              data: respuesta
          });
        });
    $.getJSON("../php/opcobranzas.php", {ope: "t-deuda2",nombre:ide})
        .done(function(respuesta) {
          $('#deudores2').bootstrapTable('destroy');
          $('#deudores2').bootstrapTable({
              columns: [{
                  field: 'nombre',
                  title: 'NOMBRE'
              }, {
                  field: 'deuda',
                  title: 'DEUDA'
              }],
              data: respuesta
          });
        });
  });
  $('#btn-cob').on('click',function(e){
    e.preventDefault();
    $.getJSON("../php/opcobranzas.php", {ope: "lis-cobrar"})
        .done(function(respuesta) {
          $('#tab-cobrar').bootstrapTable('destroy');
          $('#tab-cobrar').bootstrapTable({
              columns: [{
                  field: 'fecha',
                  title: 'FECHA'
              }, {
                  field: 'recibo',
                  title: 'RECIBO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'vendedor',
                  title: 'VENDEDOR'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }, {
                  field: 'ver',
                  title: 'VER FACTURAS',
                  events: evento2,
                  formatter: formato2
              }, {
                  field: 'anular',
                  title: 'ANULAR',
                  events: eventoAnular,
                  formatter: formatoAnular
              }, {
                  field: 'estado',
                  title: 'ESTADO',
                  //events: eventoAnular,
                  formatter: formatoestado
              }],
              data: respuesta
          });
        });
  });
  $('#btn-4').on('click',function(e){
    e.preventDefault();
    $.getJSON("../php/opcobranzas.php", {ope: "lista-gral"})
        .done(function(respuesta) {
          $('#tabla8').bootstrapTable('destroy');
          $('#tabla8').bootstrapTable({
              columns: [{
                  field: 'tipo',
                  title: 'TIPO'
              }, {
                  field: 'numero',
                  title: 'NUMERO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'vendedor',
                  title: 'VENDEDOR'
              }, {
                  field: 'emision',
                  title: 'EMISION'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }, {
                  field: 'pagos',
                  title: 'PAGOS'
              }, {
                  field: 'saldo',
                  title: 'SALDO'/*,
                  events: evento2,
                  formatter: formato2*/
              }],
              data: respuesta
          });
        });
  });
  $('#btn-5').on('click',function(e){
    e.preventDefault();
    $.getJSON("../php/opcobranzas.php", {ope: "lista-pers"})
        .done(function(respuesta) {
          $('#tabla9').bootstrapTable('destroy');
          $('#tabla9').bootstrapTable({
              columns: [{
                  field: 'numero',
                  title: 'NUMERO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }],
              data: respuesta
          });
        });
  });
  $('#btn-cob1').on('click',function(e){
    e.preventDefault();
    $.getJSON("../php/opcobranzas.php", {ope: "lis-cobrar1"})
        .done(function(respuesta) {
           $('#totalpagos').html("");
          $('#tab-cobrar1').bootstrapTable('destroy');
          $('#tab-cobrar1').bootstrapTable({
              columns: [{
                  field: 'fecha',
                  title: 'FECHA'
              }, {
                  field: 'recibo',
                  title: 'RECIBO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }, {
                  field: 'anular',
                  title: 'ANULAR',
                  events: eventoAnular,
                  formatter: formatoAnular
              }, {
                  field: 'estado',
                  title: 'ESTADO'/*,
                  events: eventoAnular,
                  formatter: formatoAnular*/
              }],
              data: respuesta
          });
        });
  });
  $('#busxfecha').on('click',function(e){
    e.preventDefault();
    var fecha=$('#fecha').val();
    $.getJSON("../php/opcobranzas.php", {ope: "pagosxfecha",fecha:fecha})
        .done(function(respuesta) {
          //console.log(respuesta);
          $('#tab-cobrar1').bootstrapTable('destroy');
          $('#tab-cobrar1').bootstrapTable({
              columns: [{
                  field: 'fecha',
                  title: 'FECHA'
              }, {
                  field: 'recibo',
                  title: 'RECIBO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }],
              data: respuesta[0]
          });
          $('#totalpagos').html("Total: "+respuesta[1]+" Bs");
        });
  });
  $('#busxven').on('click',function(e){
    e.preventDefault();
    var vendedor=$('#xvendedor').val();
    $.getJSON("../php/opcobranzas.php", {ope: "lisxven",vendedor:vendedor})
        .done(function(respuesta) {
          $('#tab-cobrar').bootstrapTable('destroy');
          $('#tab-cobrar').bootstrapTable({
              columns: [{
                  field: 'fecha',
                  title: 'FECHA'
              }, {
                  field: 'recibo',
                  title: 'RECIBO'
              }, {
                  field: 'cliente',
                  title: 'CLIENTE'
              }, {
                  field: 'vendedor',
                  title: 'VENDEDOR'
              }, {
                  field: 'total',
                  title: 'TOTAL'
              }, {
                  field: 'ver',
                  title: 'VER FACTURAS',
                  events: evento2,
                  formatter: formato2
              }, {
                  field: 'anular',
                  title: 'ANULAR',
                  events: eventoAnular,
                  formatter: formatoAnular
              }],
              data: respuesta
          });
        });
  });
  $('#registrarCob').on('click',function(e){
    e.preventDefault();
    var recibo=$('#numerorec').text();
    $.getJSON("../php/opcobranzas.php", {ope: "changeStado",recibo:recibo})
        .done(function(respuesta) {
          var $table = $('#tab-cobrar');
          $table.bootstrapTable('updateByUniqueId', {
                id: recibo,
                row: {
                    estado: 'Registrado'
                }
          });
          $('.resmensaje').html(""+respuesta);
        });
  });
});
/*------------FUNCIONES---------------------*/
function formato1(value, row, index) {
  return [
      '<a class="like btn btn-info" id="verdatos" href="javascript:void(0)" title="Like">',
      '<i class="glyphicon glyphicon-play" data-toggle="modal" data-target="#modaltabla"> Cobrar</i>',
      '</a>'
  ].join('');
}
function formato2(value, row, index) {
  return [
      '<a class="like btn btn-success" id="" href="javascript:void(0)" title="Like">',
      '<i class="glyphicon glyphicon-play" data-toggle="modal" data-target="#modaltabla"> Ver</i>',
      '</a>'
  ].join('');
}
function formatoAnular(value, row, index) {
   var estado=row.estado;
   if(estado=='Registrado'){
      return [
        ''
      ]
   }else{
      return [
        '<a class="like btn btn-danger" href="javascript:void(0)" title="Anular">',
        '<i class="glyphicon glyphicon-erase"></i>',
        '</a>'
      ].join('');
   } 
}
function formatoestado(value, row, index) {
  if(value=='Registrado'){
    return "<h4><span class='label label-success'>"+value+"</span></h4>";
  }
  if(value=='anulado'){
    return "<h4><span class='label label-default'>"+value+"</span></h4>";
  }
  else{
    return "<h4><span class='label label-danger'>En Espera</span></h4>";  
  }
}
eventoAnular = {
  'click .like': function (e, value, row, index) {
    var recibo=row.recibo;
    swal({
      title: 'Desea Borrar Recibo '+recibo,
      text: "Estas Segur@?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Borrar Recibo!'
    }).then(function () {
      $.getJSON("../php/opcobranzas.php", {ope: "lis-borrar",recibo:recibo})
            .done(function(respuesta) {
              console.log(respuesta);
            if(respuesta=='Se Eliminaron1 Filas exito'){
              swal(
                'Recibo Eliminado!',
                'Borraste el Recibo '+recibo,
                'success'
              )
            }else{
              swal(
                'Ocurrio un error ',
                'Vuelva a intentarlo',
                'error'
              )
            }   
      });
      var $table=$('#tab-cobrar1');
      $table.bootstrapTable('removeByUniqueId', recibo);
    })
  }
};
var trec=0;
var $table = $('#table')
evento1 = {
  'click .like': function (e, value, row, index) {
    var numero=row.numero;
    var saldo=row.saldo;
    var vendedor=row.vendedor;
    var nsaldo=0;
    swal({
      title: 'Bs. '+saldo,
      text: 'Numero '+numero,
      input: 'tel',
      showCancelButton: true,
      inputValidator: function (value) {
        return new Promise(function (resolve, reject) {
          if (parseInt(value)<=parseInt(saldo)) {
            resolve()
          } else {
            reject('El monto no puede ser mayor que el saldo!')
          }
        })
      }
    }).then(function (result) {
      swal({
        type: 'success',
        html: 'Pagaste: ' + result
      });
      nsaldo=saldo-result;
      $table.bootstrapTable('insertRow', {
          index: 0,
          row: {
              id: numero,
              name: result,
              price: nsaldo
          }
      });
      trec=trec+parseFloat(result);
      $('#saldorecibo').html(""+trec);
      $("#tab-cobranza").bootstrapTable('removeByUniqueId', numero);
    })
    $('#ven').html(""+vendedor);
  }
};
evento2 = {
  'click .like': function (e, value, row, index) {
    $('.resmensaje').html("");
    var recibo=row.recibo;
    var cliente=row.cliente;
    var vendedor=row.vendedor;
    var total=row.total;
    $("#numerorec").html(recibo);
    $("#ncliente").html(cliente);
    $("#nvendedor").html(vendedor);
    $("#ntotal").html(total);
    $.getJSON("../php/opcobranzas.php", {ope: "lis-cobrar2",recibo:recibo})
        .done(function(respuesta) {
          $('#mod-cob').bootstrapTable('destroy');
          $('#mod-cob').bootstrapTable({
              columns: [{
                  field: 'factura',
                  title: 'FACTURA'
              }, {
                  field: 'pago',
                  title: 'MONTO'
              }],
              data: respuesta
          });
        });
  }
};
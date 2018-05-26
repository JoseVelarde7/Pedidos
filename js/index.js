$(document).ready(function(){
  $('.mens').hide();
  var working = false;
  var $this = $(this),
  $state = $this.find('button > .state');
  $('.login-form').on('submit', function(e) {
      e.preventDefault();
      var usuario=$('#user').val();
      var pass=$('#pass').val();
            if (working) return;
      $.ajax({
        url: "php/operacion.php",
        method: "POST",
        data: {ope:'login',use:usuario,contra:pass},
        beforeSend:function(){
          $('.mens').show();
        }
      }).done(function(mensaje)  {
          //console.log(mensaje);
          if (mensaje!="error") {
                //console.log(mensaje);
                var m=mensaje;
                $('#mensaje').html('Bienvenido '+m);
                setTimeout(function() {
                  $.getJSON("php/operacionget.php", {ope:'obcargo',name: mensaje})
                   .done(function(respuesta){
                    console.log(respuesta);
                     if (respuesta=='admin') {
                        $(location).attr('href','html/admin.php');
                     }
                     if(respuesta=='vendedor'){
                        $(location).attr('href','html/notapedido.php');
                     }
                     if(respuesta=='cochabamba'){
                        $(location).attr('href','html/cochabamba/admincocha.php');
                     }
                     if(respuesta=='oruro'){
                        $(location).attr('href','html/oruro/adminoruro.php');
                     }
                   });
                  
                }, 100);
          }else{
            $('#mensaje').html('Contraseña o Usuario Incorrecto');
            $(".mens").hide();
          }
      }).fail(function() {
          console.log("error");
      })
  });
})

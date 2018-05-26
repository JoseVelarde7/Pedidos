<?PHP
ini_set('max_execution_time', 300);
header("Content-Type: text/html;charset=ISO-8859-1");
require_once("crud.php");
$op=new operacion();
$tipo = $_FILES['archivo']['type']; 
$tamanio = $_FILES['archivo']['size'];
$archivotmp = $_FILES['archivo']['tmp_name'];
$lineas = file($archivotmp);
$i=0;
foreach ($lineas as $linea_num => $linea){ 
   if($i>=0) {
       $datos = explode(";",$linea);
       $codigo= trim($datos[0]);
       $nombre = trim($datos[1]);
       $direccion = trim($datos[2]);
       $celular = trim($datos[3]);
       switch (trim($datos[4])) {
            case "WILLIAM VARGAS":
                $vendedor=10;
                break;
            case "MACARIO VILLANUEVA":
                $vendedor=11;
                break;
            case "RODRIGO SEQUEIROS":
                $vendedor=14;
                break;
            case "BERTHA BLANCO":
                $vendedor=20;
                break;
            case "MARCELO HUANCA":
                $vendedor=21;
                break;
            case "JHOANA VARGAS":
                $vendedor=22;
                break;
            case "SANDRA CAPRILES":
                $vendedor=24;
                break;
            case "PROVINCIAS":
                $vendedor=40;
                break;
            case "PERCY MOLINA":
                $vendedor=32;
                break;
            default:
                $vendedor=9;
       }
       //echo $codigo." ".$nombre." ".$direccion." ".$celular." ".$vendedor.'<br>';
       $cadena='nombre="'.$nombre.'",dir_cli="'.$direccion.'",celular='.$celular;
       $json=$op->actualizar('cliente2','codigo',"$codigo",$cadena);
       if($json=='no se modificaron ninguna fila'){
          $columnas=['codigo'];
          $json=$op->buscolid('cliente2',$columnas,'codigo',$codigo);
          if($json){
            echo "cliente existe";
          }else{
            $cadena=array(0,"'$codigo'","'$nombre'","''","''","'$direccion'",$celular,$vendedor);
            $respuesta=$op->registrar($cadena,'cliente2');
            echo $respuesta;
          }
       }else{
          echo "si se modifico";
       }
   }
   $i++;
}

  /*$nombre="MARIA PEREZ ALGO MAS";
  $direccion="DIRECCION DE PRUEBA 5.0";
  $celular=7777777;
  $codigo=50000;
  $vendedor=11;

   $cadena='nombre="'.$nombre.'",dir_cli="'.$direccion.'",celular='.$celular;
   $json=$op->actualizar('cliente2','codigo',"$codigo",$cadena);
   if($json=='no se modificaron ninguna fila'){
      $columnas=['codigo'];
      $json=$op->buscolid('cliente2',$columnas,'codigo',$codigo);
      if($json){
        echo "cliente existe";
      }else{
        $cadena=array(0,"'$codigo'","'$nombre'","''","''","'$direccion'",$celular,$vendedor);
        $respuesta=$op->registrar($cadena,'cliente2');
        echo $respuesta;
      }
   }else{
      echo "si se modifico";
   }*/
?>
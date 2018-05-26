<?PHP
//obtenemos el archivo .csv
//header('Content-Type: text/html; charset=ISO-8859-1');
require_once("crud.php");
$op=new operacion();

$json2=$op->borrarconsola('delete from cuentasxcobrar');
$tipo = $_FILES['archivo']['type']; 
$tamanio = $_FILES['archivo']['size'];
$archivotmp = $_FILES['archivo']['tmp_name'];
//cargamos el archivo
$lineas = file($archivotmp);
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;
//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea){ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i>=0) { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ;*/
       $datos = explode(";",$linea);
       //Almacenamos los datos que vamos leyendo en una variable
       $tipo= trim($datos[0]);
       $numero = trim($datos[1]);
       $nombre = trim($datos[2]);
       //$vendedor = trim($datos[3]);
       switch ($datos[3]) {
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
            case "CAROS ENCINAS":
                $vendedor=25;
                break;
            case "LUIS ANTONIO MENDOZA":
                $vendedor=29;
                break;
            default:
                $vendedor=9;
       }
       $fecha = str_replace(",", ".", trim($datos[4]));
       $total = str_replace(",", ".", trim($datos[5]));
       if($datos[6]==""){
          $pagos=0;
       }else{
          $pagos=str_replace(",", ".", trim($datos[6]));
       }
       $saldo = str_replace(",", ".", trim($datos[7]));
      
       //echo $tipo." ".$numero." ".$nombre." ".$vendedor." ".$fecha." ".$total." ".$pagos." ".$saldo;
       //guardamos en base de datos la línea leida
       //echo $tipo." ".$numero." ".$nombre." ".$vendedor." ".$fecha." ".$total." ".$pagos." ".$saldo;
       $cadena1=array("'$tipo'","'$numero'","'$nombre'",$vendedor,"'$fecha'",$total,$pagos,$saldo);
       //echo json_encode($cadena1);
       $resp=$op->registrar($cadena1,'cuentasxcobrar');
       //cerramos condición
   }
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}

  echo $resp;
  echo "<a href='../html/listacobranza.php' class='btn btn-success'>Regresar...</a>";
?>
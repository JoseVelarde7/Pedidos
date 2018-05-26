<?PHP
header('Content-Type: text/html; charset=ISO-8859-1');
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
       $precio = trim($datos[2]);
       $cantidad = trim($datos[3]);
       $cadena='uni_almacen='.$cantidad.',precio='.$precio.'';
       $json=$op->actualizar('productos','codigo',"$codigo",$cadena);
       echo $json." <br> ".$i;
   }
   $i++;
}
?>
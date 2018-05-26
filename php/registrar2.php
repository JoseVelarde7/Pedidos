<?php 
require_once("crud.php");
	$op=new operacion();
	$operacion=$_POST['operacion'];
	date_default_timezone_set("America/La_Paz");
	if($operacion=='registrar'){
		$codigo=$_POST['pcodigo'];
		$nombre=$_POST['pnombre'];
		$unidad=$_POST['unxcaja'];
		$precio=$_POST['precio'];
		$obs=$_POST['obs'];
		$cadena=array(0,$codigo,"'$nombre'","'$unidad'",$precio,"'$obs'");
		$respuesta=$op->registrar($cadena,'productos');
		echo $respuesta;
	}

	if($operacion=='regpedido'){
		$nombre=$_POST['names'];
		$direccion=$_POST['dir'];
		$nombrenit=$_POST['nombre_nit'];
		$vendedor=$_POST['vendedor'];
		$celular=$_POST['celular'];
		$codigocli=$_POST['codcli'];
		$nit=$_POST['nit'];
		$observacion=$_POST['obs'];
		$fecha=date("Y-m-d");
		$hora=date("g:i a");
		$tot=$_POST['total'];
		$cadena=array(0,"'$nombre'","'$direccion'",$celular,"'$nombrenit'","'$nit'","'$codigocli'",$vendedor,"'$fecha'","'$hora'",$tot,"'$observacion'","''","''");
		$respuesta=$op->registrar($cadena,'pedido');
		echo $respuesta;
	}
	if($operacion=='change-reg'){
		$nombre1=$_POST['name1'];
		$cantidad1=$_POST['cantidad1'];
		$precio1=$_POST['precio1'];
		$nombre2=$_POST['name2'];
		$cantidad2=$_POST['cantidad2'];
		$precio2=$_POST['precio2'];
		$nombre3=$_POST['name3'];
		$cantidad3=$_POST['cantidad3'];
		$precio3=$_POST['precio3'];
		$cods=$_POST['ide'];
		$totales=0;
		$resp="";
		if($nombre1!="" and $cantidad1>0){
			$cadena1=array(0,$cods,"'$nombre1'",$cantidad1,$precio1);
			$resp=$resp.$op->registrar($cadena1,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre1,$cantidad1);
			if ($resp=="exito") {
				$resp="";
			}
			$totales=$totales+($precio1*$cantidad1);
		}
		if($nombre2!="" and $cantidad2>0){
			$cadena2=array(0,$cods,"'$nombre2'",$cantidad2,$precio2);
			$resp=$resp.$op->registrar($cadena2,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre2,$cantidad2);
			if ($resp=="exito") {
				$resp="";
			}
			$totales=$totales+($precio2*$cantidad2);
		}
		if($nombre3!="" and $cantidad3>0){
			$cadena3=array(0,$cods,"'$nombre3'",$cantidad3,$precio3);
			$resp=$resp.$op->registrar($cadena3,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre3,$cantidad3);
			if ($resp=="exito") {
				$resp="";
			}
			$totales=$totales+($precio3*$cantidad3);
		}
		$ca='total = TRUNCATE((total+'.$totales.') ,2)';
		$js=$op->actualizar('pedido','pedido_id',$cods,$ca);
		echo $resp;
	}

	/*if($operacion=='regpedido-ar'){
		$nombre=$_POST['names-one'];
		$direccion=$_POST['dir1'];
		$nombrenit=$_POST['nombrenit1'];
		$vendedor=$_POST['vendedor1'];
		$celular=$_POST['celular1'];
		$codigocli=$_POST['codcli1'];
		$nit=$_POST['nit1'];
		$observacion=$_POST['obsa'];
		$fecha=date("Y-m-d");
		$hora=date("g:i a");
		$nombre1=$_POST['name1a'];
		$cantidad1=$_POST['cantidad1a'];
		$precio1=$_POST['precio1a'];
		$nombre2=$_POST['name2a'];
		$cantidad2=$_POST['cantidad2a'];
		$precio2=$_POST['precio2a'];
		$nombre3=$_POST['name3a'];
		$cantidad3=$_POST['cantidad3a'];
		$precio3=$_POST['precio3a'];
		$nombre4=$_POST['name4a'];
		$cantidad4=$_POST['cantidad4a'];
		$precio4=$_POST['precio4a'];
		$nombre5=$_POST['name5a'];
		$cantidad5=$_POST['cantidad5a'];
		$precio5=$_POST['precio5a'];
		$nombre6=$_POST['name6a'];
		$cantidad6=$_POST['cantidad6a'];
		$precio6=$_POST['precio6a'];
		$nombre7=$_POST['name7a'];
		$cantidad7=$_POST['cantidad7a'];
		$precio7=$_POST['precio7a'];
		$nombre8=$_POST['name8a'];
		$cantidad8=$_POST['cantidad8a'];
		$precio8=$_POST['precio8a'];
		$nombre9=$_POST['name9a'];
		$cantidad9=$_POST['cantidad9a'];
		$precio9=$_POST['precio9a'];
		$nombre10=$_POST['name10a'];
		$cantidad10=$_POST['cantidad10a'];
		$precio10=$_POST['precio10a'];
		$nombre11=$_POST['name11a'];
		$cantidad11=$_POST['cantidad11a'];
		$precio11=$_POST['precio11a'];
		$tot=$_POST['total'];
		$cadena=array(0,"'$nombre'","'$direccion'",$celular,"'$nombrenit'","'$nit'","'$codigocli'",$vendedor,"'$fecha'","'$hora'",$tot,"'$observacion'","''","''");
		$respuesta=$op->registrar($cadena,'pedido');
		$ide=$op->ultimovalor('pedido','pedido_id');
		$resp="";
		if($nombre1!="" and $cantidad1>0){
			$cadena1=array(0,$ide,"'$nombre1'",$cantidad1,$precio1);
			$resp=$resp.$op->registrar($cadena1,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre1,$cantidad1);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre2!="" and $cantidad2>0){
			$cadena2=array(0,$ide,"'$nombre2'",$cantidad2,$precio2);
			$resp=$resp.$op->registrar($cadena2,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre2,$cantidad2);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre3!="" and $cantidad3>0){
			$cadena3=array(0,$ide,"'$nombre3'",$cantidad3,$precio3);
			$resp=$resp.$op->registrar($cadena3,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre3,$cantidad3);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre4!="" and $cantidad4>0){
			$cadena4=array(0,$ide,"'$nombre4'",$cantidad4,$precio4);
			$resp=$resp.$op->registrar($cadena4,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre4,$cantidad4);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre5!="" and $cantidad5>0){
			$cadena5=array(0,$ide,"'$nombre5'",$cantidad5,$precio5);
			$resp=$resp.$op->registrar($cadena5,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre5,$cantidad5);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre6!="" and $cantidad6>0){
			$cadena6=array(0,$ide,"'$nombre6'",$cantidad6,$precio6);
			$resp=$resp.$op->registrar($cadena6,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre6,$cantidad6);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre7!="" and $cantidad7>0){
			$cadena7=array(0,$ide,"'$nombre7'",$cantidad7,$precio7);
			$resp=$resp.$op->registrar($cadena7,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre7,$cantidad7);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre8!="" and $cantidad8>0){
			$cadena8=array(0,$ide,"'$nombre8'",$cantidad8,$precio8);
			$resp=$resp.$op->registrar($cadena8,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre8,$cantidad8);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre9!="" and $cantidad9>0){
			$cadena9=array(0,$ide,"'$nombre9'",$cantidad9,$precio9);
			$resp=$resp.$op->registrar($cadena9,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre9,$cantidad9);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre10!="" and $cantidad10>0){
			$cadena10=array(0,$ide,"'$nombre10'",$cantidad10,$precio10);
			$resp=$resp.$op->registrar($cadena10,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre10,$cantidad10);
			if ($resp=="exito") {
				$resp="";
			}
		}
		if($nombre11!="" and $cantidad11>0){
			$cadena11=array(0,$ide,"'$nombre11'",$cantidad11,$precio11);
			$resp=$resp.$op->registrar($cadena11,'pedidos');
			if ($resp=="insertado") {
				$resp="";
			}
			$resp=$resp.$op->actprodmenos($nombre11,$cantidad11);
			if ($resp=="exito") {
				$resp="";
			}
		}
		echo $respuesta;
	}*/
	if($operacion=='regpedido-ar'){
		$nombre=$_POST['names-one'];
		$direccion=$_POST['dir1'];
		$nombrenit=$_POST['nombrenit1'];
		$vendedor=$_POST['vendedor1'];
		$celular=$_POST['celular1'];
		$codigocli=$_POST['codcli1'];
		$nit=$_POST['nit1'];
		$observacion=$_POST['obsa'];
		$fecha=date("Y-m-d");
		$hora=date("g:i a");
		//$da=$_POST['dprod'];
		$tot=$_POST['total'];
		$cadena=array(0,"'$nombre'","'$direccion'",$celular,"'$nombrenit'","'$nit'","'$codigocli'",$vendedor,"'$fecha'","'$hora'",$tot,"'$observacion'","''","''");
		$respuesta=$op->registrar($cadena,'pedido');
		echo $respuesta;
	}
	if ($operacion=='regArcher') {
		$datos=$_POST['datos'];
		$resp="";
		foreach ($datos as $key => $value) {
			foreach ($value as $key1 => $value1) {
				$ar2[]=$value1;
			}
			$ide=$op->ultimovalor('pedido','pedido_id');
			$cadena1=array(0,$ide,'"'.$ar2[0].'"',$ar2[1],$ar2[2]);
			$resp=$op->registrar($cadena1,'pedidos');
			$resp1=$op->actprodmenos($ar2[0],$ar2[1]);
			unset($ar2);
		}
		echo $resp." ".$resp1;
	}

	/*para mantecas y otros*/
	if($operacion=='regpedido-man'){
		$nombre=$_POST['names'];
		$direccion=$_POST['dir'];
		$nombrenit=$_POST['nombre_nit'];
		$vendedor=$_POST['vendedor'];
		$celular=$_POST['celular'];
		$codigocli=$_POST['codcli'];
		$nit=$_POST['nit'];
		$observacion=$_POST['obs'];
		$fecha=date("Y-m-d");
		$hora=date("g:i a");
		//$da=$_POST['dprod'];
		$tot=$_POST['total'];
		$cadena=array(0,"'$nombre'","'$direccion'",$celular,"'$nombrenit'","'$nit'","'$codigocli'",$vendedor,"'$fecha'","'$hora'",$tot,"'$observacion'","''","''");
		$respuesta=$op->registrar($cadena,'pedido');
		echo $respuesta;
	}
	if ($operacion=='regManteca') {
		$datos=$_POST['datos'];
		$resp="";
		foreach ($datos as $key => $value) {
			foreach ($value as $key1 => $value1) {
				$ar2[]=$value1;
			}
			$ide=$op->ultimovalor('pedido','pedido_id');
			$cadena1=array(0,$ide,'"'.$ar2[0].'"',$ar2[1],$ar2[2]);
			$resp=$op->registrar($cadena1,'pedidos');
			$resp1=$op->actprodmenos($ar2[0],$ar2[1]);

			$ca='cochabamba=cochabamba-'.$ar2[1];
			$js=$op->actualizar('almacen','nombre_prod','"'.$ar2[0].'"',$ca);

			unset($ar2);
		}
		echo $resp." ".$resp1;
	}
	/*oruro*/
	if ($operacion=='regMantecaor') {
		$datos=$_POST['datos'];
		$resp="";
		foreach ($datos as $key => $value) {
			foreach ($value as $key1 => $value1) {
				$ar2[]=$value1;
			}
			$ide=$op->ultimovalor('pedido','pedido_id');
			$cadena1=array(0,$ide,'"'.$ar2[0].'"',$ar2[1],$ar2[2]);
			$resp=$op->registrar($cadena1,'pedidos');
			$resp1=$op->actprodmenos($ar2[0],$ar2[1]);

			$ca='oruro=oruro-'.$ar2[1];
			$js=$op->actualizar('almacen','nombre_prod','"'.$ar2[0].'"',$ca);

			unset($ar2);
		}
		echo $resp." ".$resp1;
	}
 ?>
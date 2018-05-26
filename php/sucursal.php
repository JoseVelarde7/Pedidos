<?php 
require_once("crud.php");
session_start();
$nombre=$_SESSION['admin'];
	$op=new operacion();
	$ope=$_GET['ope'];
	//$ope='archerTipo';
	$datos62=[];
	$json1=$op->consulta('select cod_ven from vendedor where nombre="'.$nombre.'"');
	$decode1=json_decode($json1, true);
	foreach ($decode1 as $key) {
		$datos62[]=$key['cod_ven'];
	}
	$codigo52=$datos62[0];

	if($ope=='prod-cochabamba'){
		$columnas=['codigo','nombre_prod','unidad','cochabamba','precio','observacion'];
		$json=$op->buscolid('almacen',$columnas,'tipo','1');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre_prod"=>$json[$i++],"unidad"=>$json[$i++],"uni_almacen"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}
	if($ope=='listaManteca'){
		$json=$op->consulta('select nombre_prod from almacen where tipo=1 order by nombre_prod');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}
	if($ope=='getStock'){
		$nombre=$_GET['nombre'];
		$json=$op->consulta('select codigo,cochabamba from almacen WHERE nombre_prod="'.$nombre.'"');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['codigo'];
			$datos[]=$key['cochabamba'];
		}
		echo json_encode($datos);
	}
	if($ope=='agregarStock'){
		$codigo=$_GET['codigo'];
		$stock=$_GET['stock'];
		$ca='cochabamba=cochabamba+'.$stock;
		$js=$op->actualizar('almacen','codigo',$codigo,$ca);
		echo json_encode($js);
	}

	/*---------ORURO---------*/
	if($ope=='prod-oruro'){
		$columnas=['codigo','nombre_prod','unidad','oruro','precio','observacion'];
		$json=$op->buscolid('almacen',$columnas,'tipo','1');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre_prod"=>$json[$i++],"unidad"=>$json[$i++],"uni_almacen"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}
	if($ope=='listaManteca2'){
		$json=$op->consulta('select nombre_prod from almacen where tipo=1 order by nombre_prod');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}
	if($ope=='getStock2'){
		$nombre=$_GET['nombre'];
		$json=$op->consulta('select codigo,oruro from almacen WHERE nombre_prod="'.$nombre.'"');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['codigo'];
			$datos[]=$key['oruro'];
		}
		echo json_encode($datos);
	}if($ope=='agregarStock2'){
		$codigo=$_GET['codigo'];
		$stock=$_GET['stock'];
		$ca='oruro=oruro+'.$stock;
		$js=$op->actualizar('almacen','codigo',$codigo,$ca);
		echo json_encode($js);
	}

 ?>
<?php
require_once("crud.php");
	$op=new operacion();
	$ope=$_POST['ope'];
	//$ope='login';
	if($ope=='login'){
		$usuario=$_POST['use'];
		$contrase=$_POST['contra'];
		/*$usuario="macario";
		$contrase="1234";*/
		$json=$op->validar($usuario,$contrase);
		if($json!=""){
			session_start();
			$usuario=$json;
			$_SESSION['admin']=$usuario;
		}else{
			$json="error";
		}
		echo($json);
	}

	if($ope=='reg-pedido'){
		$codigo=$_POST['codigo'];
		$nombre=$_POST['nombre'];
		$nombrenit=$_POST['nombrenit'];
		$nit=$_POST['nit'];
		$direccion=$_POST['direccion'];
		$celular=$_POST['celular'];
		$vendedor=$_POST['vendedor'];
		$cadena=array(0,"'$codigo'","'$nombre'","'$nombrenit'","'$nit'","'$direccion'",$celular,$vendedor);
		$respuesta=$op->registrar($cadena,'cliente2');
		echo $respuesta;
	}

	if($ope=='actualizar'){
		$codigo=$_POST['showcodigo'];
		$nombre=$_POST['shownombre'];
		$nombrenit=$_POST['shownomnit'];
		$nit=$_POST['shownit'];
		$direccion=$_POST['showdir'];
		$celular=$_POST['showcel'];
		$vendedor=$_POST['showven'];
		switch ($vendedor) {
			case 'BERTHA LUCY BLANCO TANCARA':
				$vendedor=20;
				break;
			case 'MACARIO VILLANUEVA TANCARA':
				$vendedor=11;
				break;
			case 'RODRIGO SEQUEIROS':
				$vendedor=14;
				break;
			case 'MARCELO HUANCA':
				$vendedor=21;
				break;
			case 'JHOANA VARGAS COPA':
				$vendedor=22;
				break;
			case 'WILLIAM VARGAS':
				$vendedor=10;
				break;
			case 'SANDRA CAPRILES':
				$vendedor=24;
				break;
			case 'COCHABAMBA':
				$vendedor=40;
				break;
			case 'CAROS ENCINAS':
				$vendedor=25;
				break;
			case 'LUIS ANTONIO MENDOZA':
				$vendedor=29;
				break;
			default:
				$vendedor=9;
		}
		$cadena='codigo="'.$nombre.'",nombre="'.$codigo.'",nombre_nit="'.$nombrenit.'",nit="'.$nit.'",dir_cli="'.$direccion.'",celular='.$celular.',cod_ven='.$vendedor.'';
		$json=$op->actualizar('cliente2','codigo',"'$nombre'",$cadena);
		echo ($json);
	}

	if($ope=='reg-producto'){
		$codigo=$_POST['codigop'];
		$nombre=$_POST['nombrep'];
		$unidad=$_POST['unidadp'];
		$almacen=$_POST['almacenp'];
		$precio=$_POST['preciop'];
		$tip=$_POST['tipo'];
		$obs=$_POST['obsp'];
		$cadena=array(0,$codigo,"'$nombre'",$tip,"'$unidad'",$almacen,$precio,"'$obs'");
		$respuesta=$op->registrar($cadena,'productos');
		echo $respuesta;
	}

	if($ope=='actualizar-prod'){
		$codigo=$_POST['showcod'];
		$nombre=$_POST['showprod'];
		$unidad=$_POST['showunidad'];
		$almacen=$_POST['showalm'];
		$precio=$_POST['showprecio'];
		$observacion=$_POST['showobs'];
		$cadena='codigo='.$nombre.',nombre_prod="'.$codigo.'",unidad="'.$unidad.'",uni_almacen='.$almacen.',precio='.$precio.',observacion="'.$observacion.'"';
		$json=$op->actualizar('productos','codigo',''.$nombre.'',$cadena);
		echo ($json);
	}

	if($ope=='reg-recibo'){
		$datos=$_POST['dato'];
		$cadena=$_POST['cad'];
		$fecha=date("Y-m-d");
		$ar=[];
		foreach ($cadena as $key => $value) {
			$ar[]=$value;
		}
		$array=array(0,"'$fecha'",$ar[0],"'$ar[1]'","'$ar[3]'","'$ar[2]'","''");
		$respuesta=$op->registrar($array,'recibo');
		$ar2=[];
		foreach ($datos as $key => $value) {
			foreach ($value as $key1 => $value1) {
				$ar2[]=$value1;
			}
			$array1=array(0,$ar[0],$ar2[0],$ar2[1]);
			$respuesta1=$op->registrar($array1,'recibos');
			$cadenap='pagos=pagos+'.$ar2[1].',saldo=saldo-'.$ar2[1].'';
			$jsonp=$op->actualizar('cuentasxcobrar','numdoc',$ar2[0],$cadenap);
			unset($ar2);
		}
		echo $respuesta1;
	}

	/*ORURO*/
	if($ope=='actualizar-or'){
		$codigo=$_POST['showcodigo'];
		$nombre=$_POST['shownombre'];
		$nombrenit=$_POST['shownomnit'];
		$nit=$_POST['shownit'];
		$direccion=$_POST['showdir'];
		$celular=$_POST['showcel'];
		$vendedor=32;
		$cadena='codigo="'.$nombre.'",nombre="'.$codigo.'",nombre_nit="'.$nombrenit.'",nit="'.$nit.'",dir_cli="'.$direccion.'",celular='.$celular.',cod_ven='.$vendedor.'';
		$json=$op->actualizar('cliente2','codigo',"'$nombre'",$cadena);
		echo ($json);
	}
 ?>
<?php 
require_once("crud.php");
session_start();
$nombre=$_SESSION['admin'];
	$op=new operacion();
	$ope=$_GET['ope'];
	//$ope='exdatos';
	$datos62=[];
	$json1=$op->consulta('select cod_ven from vendedor where nombre="'.$nombre.'"');
	$decode1=json_decode($json1, true);
	foreach ($decode1 as $key) {
		$datos62[]=$key['cod_ven'];
	}
	$codigo52=$datos62[0];

	if($ope=='buscar'){
		if($codigo52=='7'){
			$json=$op->consulta('select nombre from cliente2 order by nombre');
		}else{
			$json=$op->consulta('select nombre from cliente2 where cod_ven="'.$codigo52.'" order by nombre');
		}
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre'];
		}
		echo json_encode($datos);
	}

	if($ope=='buscarpro'){
		/*$json=$op->listarcolumna('productos','nombre_prod');
		echo json_encode($json);*/
		$json=$op->consulta('select nombre_prod from productos where tipo=1 order by nombre_prod');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}

	if($ope=='buscarproco'){
		/*$json=$op->listarcolumna('productos','nombre_prod');
		echo json_encode($json);*/
		$json=$op->consulta('select nombre_prod from almacen where tipo=1 order by nombre_prod');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}

	if($ope=='buscarproar'){
		$json=$op->consulta('select nombre_prod from productos where tipo=0 order by nombre_prod');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}

	if($ope=='buscarprecio'){
		$nombrep=$_GET['nom'];
		$json=$op->consulta("select precio,uni_almacen from productos where nombre_prod='".$nombrep."'");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['precio'];
			$datos[]=$key['uni_almacen'];
		}
		echo json_encode($datos);
	}

	if($ope=='busprod'){
		$json=$op->listarcolumna('productos','nombre_prod');
		echo json_encode($json);
	}

	if($ope=='mostrar'){
		$valor=$_GET['nom'];
		$json=$op->buscar('cliente2','nombre','"'.$valor.'"');
		echo json_encode($json);
	}

	if($ope=='mostpro'){
		$valor=$_GET['nom'];
		$json=$op->buscar('productos','nombre_prod','"'.$valor.'"');
		echo json_encode($json);
	}	

	if($ope=='listartodo'){
		$columnas=['codigo','nombre','dir_cli','celular','nombre_nit','nit'];
		$json=$op->buscolid('cliente2',$columnas,'cod_ven',$codigo52);
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"celular"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i]);
		}
		echo json_encode($datos);
	}
	if($ope=='listartodoco'){
		$columnas=['codigo','nombre','dir_cli','celular','nombre_nit','nit'];
		$json=$op->buscolid('cliente2',$columnas,'cod_ven','40');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"celular"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='listartodo2'){
		$columnas=['codigo','nombre','dir_cli','celular','nombre_nit','nit'];
		//$json=$op->buscolid('cliente2',$columnas,'cod_ven',$codigo52);
		$json=$op->listarcolumnas('cliente2',$columnas);
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"celular"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='listarpro'){
		$columnas=['codigo','nombre_prod','unidad','precio','observacion'];
		$json=$op->listarcolumnas('productos',$columnas);
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre"=>$json[$i++],"unidad"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='actprod'){
		$nombre=$_GET['nombre'];
		$codigo=$_GET['cod'];
		$unidad=$_GET['nnit'];
		$precio=$_GET['nit'];
		$observacion=$_GET['dir'];
		$cadena='codigo='.$codigo.',nombre_prod="'.$nombre.'",unidad="'.$unidad.'",precio='.$precio.',observacion="'.$observacion.'"';
		$json=$op->actualizar('productos','codigo',''.$codigo.'',$cadena);
		echo ($json);
	}

	if($ope=='showpedido'){
		$columnas=['nombre_c','fecha','hora','codigo','dir_c','cod_ven','obs_c','nit','nombrenit'];
		$json=$op->listarcolumnas('pedido',$columnas);
		$contar=count($json);
		echo json_encode($json);
	}

	if($ope=='listarprod'){
		$columnas=['codigo','nombre_prod','unidad','uni_almacen','precio','observacion'];
		$json=$op->listarcolumnas('productos',$columnas);
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre_prod"=>$json[$i++],"unidad"=>$json[$i++],"uni_almacen"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='listarprodco'){
		$columnas=['codigo','nombre_prod','unidad','cochabamba','precio','observacion'];
		//$json=$op->listarcolumnas('almacen',$columnas);
		$json=$op->buscolid('almacen',$columnas,'tipo','1');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre_prod"=>$json[$i++],"unidad"=>$json[$i++],"cochabamba"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='mostrar-prod'){
		$valor=$_GET['nom'];
		$json=$op->buscar('productos','nombre_prod','"'.$valor.'"');
		echo json_encode($json);
	}

	if($ope=='listarpedidos'){
		/*$columnas=['pedido_id','fecha','hora','nombre_c','dir_c','telf_c','nombrenit','nit','factura','estado'];
		$json=$op->liscoldescid('pedido',$columnas,'pedido_id',$codigo52);
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("pedidoid"=>$json[$i++],"fecha"=>$json[$i++],"hora"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"telf_c"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i++],"boton"=>"","factura"=>$json[$i++],"estado"=>$json[$i]);
		}*/
		$json=$op->consulta("select pedido_id,fecha,hora,nombre_c,dir_c,telf_c,nombrenit,nit,factura,estado from pedido WHERE cod_ven=".$codigo52." ORDER BY pedido_id DESC limit 30");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("pedidoid"=>$key['pedido_id'],"fecha"=>$key['fecha'],"hora"=>$key['hora'],"nombre"=>$key['nombre_c'],"direccion"=>$key['dir_c'],"telf_c"=>$key['telf_c'],"nombrenit"=>$key['nombrenit'],"nit"=>$key['nit'],"boton"=>"","factura"=>$key['factura'],"estado"=>$key['estado']);
		}
		echo json_encode($datos);
	}

	if($ope=='listarpedidosco'){
		$columnas=['pedido_id','fecha','hora','nombre_c','dir_c','telf_c','nombrenit','nit','factura','estado'];
		$json=$op->liscoldescid('pedido',$columnas,'pedido_id','40');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("pedidoid"=>$json[$i++],"fecha"=>$json[$i++],"hora"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"telf_c"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i++],"boton"=>"","factura"=>$json[$i++],"estado"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='listar-dos'){
		$json=$op->consulta("select pedido_id,fecha,hora,nombre_c,cod_ven,dir_c,telf_c,nombrenit,nit,factura,estado,codigo,obs_c from pedido WHERE cod_ven!=40 ORDER BY pedido_id DESC limit 100");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("pedidoid"=>$key['pedido_id'],"fecha"=>$key['fecha'],"hora"=>$key['hora'],"nombre"=>$key['nombre_c'],"vendedor"=>$key['cod_ven'],"direccion"=>$key['dir_c'],"telf_c"=>$key['telf_c'],"nombrenit"=>$key['nombrenit'],"nit"=>$key['nit'],"boton"=>"","factura"=>$key['factura'],"estado"=>$key['estado'],"codigo"=>$key['codigo'],"observacion"=>$key['obs_c']);
		}
		echo json_encode($datos);
	}

	if($ope=='listar-pedi2'){
		$clave=$_GET['ide'];
		//$clave=51;
		$columnas=['nombre_prod','cantidad_pro','precio_pro'];
		$json=$op->buscolid('pedidos',$columnas,'pedido_id',$clave);
		$contar=count($json);
		$e=0;
		$datos=[];
		$columnas=['codigo'];
		for ($i=0; $i < $contar; $i++) {	
			$json3=$op->buscolid('productos',$columnas,'nombre_prod',"'".$json[$i]."'");
			$datos[]=(object)array("codigo"=>$json3[0],"producto"=>$json[$i++],"cantidad1"=>$json[$i],"cantidad"=>$json[$i++],"precio1"=>$json[$i],"precio"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='update-state'){
		$ide=$_GET['ide'];
		//$ide=72;
		$cadena='estado="entregado"';
		$json=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		echo json_encode($json);


	}

	if($ope=='delete-state'){
		$ide=$_GET['ide'];
		//$ide=74;
		$cadena='estado="anulado"';
		$json=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		$json2=$op->consulta("select nombre_prod,cantidad_pro from pedidos where pedido_id=".$ide."");
		$decode=json_decode($json2, true);
		foreach ($decode as $key) {
			$json3=$op->actprodmas($key['nombre_prod'],$key['cantidad_pro']);
		}
		echo json_encode($json);
	}

	if($ope=='validarstock'){
		$nombrep=$_GET['nom'];
		$json=$op->consulta("select uni_almacen FROM productos WHERE nombre_prod='".$nombrep."'");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['uni_almacen'];
		}
		echo json_encode($datos);
	}

	if($ope=='obcargo'){
		$name=$_GET['name'];
		//$name='JUAN JOSE HUANCA VELARDE';
		//$datos=[];
		$json5=$op->consulta("select cargo FROM vendedor WHERE nombre='".$nombre."'");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['cargo'];
		}
		echo json_encode($datos[0]);
		//echo json_encode($json5." ".$nombre);
	}
	if($ope=='add-invoice'){
		$ide=$_GET['ide'];
		$nf=$_GET['numfac'];
		//$ide=72;
		$cadena='factura="'.$nf.'"';
		$json=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		echo json_encode($json);
	}
	if($ope=='anular-columna'){
		$ide=$_GET['ide'];
		$item=$_GET['producto'];
		$cantidad=$_GET['cantidad'];
		$precio=$_GET['precio'];
		$json=$op->eliminar2param('pedidos','pedido_id',$ide,'nombre_prod',"'".$item."'");
		$json3=$op->actprodmas($item,$cantidad);
		$cadena='total = TRUNCATE((total-'.$precio.') ,2)';
		$json4=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		echo json_encode($json." ".$json3." ".$json4);
	}
	if($ope=='cambiar-columna'){
		$ide=$_GET['ide'];
		$item=$_GET['producto'];
		$cantidad=$_GET['cantidad'];
		$precio=$_GET['precio'];
		$cantidadan=$_GET['can1'];
		$precio1=$_GET['precio1'];
		$nuevo=$cantidad*$precio;
		$antiguo=$cantidadan*$precio1;
		$cadena='cantidad_pro='.$cantidad.',precio_pro='.$precio;
		$json4=$op->actualizar2param('pedidos','pedido_id',$ide,'nombre_prod','"'.$item.'"',$cadena);
		if ($cantidad>$cantidadan) {
			$resu=$cantidad-$cantidadan;
			$totales=$nuevo-$antiguo;
			$json3=$op->actprodmenos($item,$resu);
			$cadena='total = TRUNCATE((total+'.$totales.') ,2)';
			$json0=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		}else{
			$resu=$cantidadan-$cantidad;
			$totales=$antiguo-$nuevo;
			$json3=$op->actprodmas($item,$resu);
			$cadena='total = TRUNCATE((total-'.$totales.') ,2)';
			$json0=$op->actualizar('pedido','pedido_id',$ide,$cadena);
		}
		echo json_encode($json4);
	}
	if($ope=='archerTipo'){
		$datos=[];
		$json5=$op->consulta("select DISTINCT observacion FROM productos WHERE tipo=0");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['observacion'];
		}
		echo json_encode($datos);
	}
	if($ope=='mantecaTipo'){
		$datos=[];
		$json5=$op->consulta("select DISTINCT observacion FROM productos WHERE tipo=1");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['observacion'];
		}
		echo json_encode($datos);
	}
	if($ope=='archerTipo2'){
		$valor=$_GET['valor'];
		$datos=[];
		$json5=$op->consulta("select nombre_prod,uni_almacen,precio FROM productos WHERE observacion='".$valor."'");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['nombre_prod'];
		}
		echo json_encode($datos);
	}
	if($ope=='archerTipo3'){
		$valor=$_GET['valor'];
		$datos=[];
		$json5=$op->consulta("select cochabamba,precio from almacen WHERE nombre_prod='".$valor."'");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['cochabamba'];
			$datos[]=$key['precio'];
		}
		echo json_encode($datos);
	}
	if($ope=='archerTipo4'){
		$valor=$_GET['valor'];
		$datos=[];
		$json5=$op->consulta("select uni_almacen,precio from productos WHERE nombre_prod='".$valor."'");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['uni_almacen'];
			$datos[]=$key['precio'];
		}
		echo json_encode($datos);
	}

	/*ORURO*/
	if($ope=='listartodoor'){
		$columnas=['codigo','nombre','dir_cli','celular','nombre_nit','nit'];
		$json=$op->buscolid('cliente2',$columnas,'cod_ven','32');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"celular"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i]);
		}
		echo json_encode($datos);
	}
	if($ope=='listarprodor'){
		$columnas=['codigo','nombre_prod','unidad','oruro','precio','observacion'];
		//$json=$op->listarcolumnas('almacen',$columnas);
		$json=$op->buscolid('almacen',$columnas,'tipo','1');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("codigo"=>$json[$i++],"nombre_prod"=>$json[$i++],"unidad"=>$json[$i++],"oruro"=>$json[$i++],"precio"=>$json[$i++],"observacion"=>$json[$i]);
		}
		echo json_encode($datos);
	}
	if($ope=='archerTipo5'){
		$valor=$_GET['valor'];
		$datos=[];
		$json5=$op->consulta("select oruro,precio from almacen WHERE nombre_prod='".$valor."'");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$datos[]=$key['oruro'];
			$datos[]=$key['precio'];
		}
		echo json_encode($datos);
	}
	if($ope=='listarpedidosor'){
		$columnas=['pedido_id','fecha','hora','nombre_c','dir_c','telf_c','nombrenit','nit','factura','estado'];
		$json=$op->liscoldescid('pedido',$columnas,'pedido_id','32');
		$contar=count($json);
		$e=0;
		$datos=[];
		for ($i=0; $i < $contar; $i++) {
			$datos[]=(object)array("pedidoid"=>$json[$i++],"fecha"=>$json[$i++],"hora"=>$json[$i++],"nombre"=>$json[$i++],"direccion"=>$json[$i++],"telf_c"=>$json[$i++],"nombrenit"=>$json[$i++],"nit"=>$json[$i++],"boton"=>"","factura"=>$json[$i++],"estado"=>$json[$i]);
		}
		echo json_encode($datos);
	}

	if($ope=='exdatos'){
		$tipos=[];
		$productos=[];
		$json5=$op->consulta("select codigo,nombre_prod,uni_almacen,precio,observacion from productos where tipo=1");
		$decode3=json_decode($json5, true);
		foreach ($decode3 as $key) {
			$productos[]=(object)array("codigo"=>$key['codigo'],"nombre"=>$key['nombre_prod'],"unidades"=>$key['uni_almacen'],"precio"=>$key['precio'],"observacion"=>$key['observacion']);
			$tipos[]=$key['observacion'];
		}
		$todo[]=$tipos;
		$todo[]=$productos;
		echo json_encode($todo);
	}
 ?>
<?php 
require_once("crud.php");
session_start();
$nombre=$_SESSION['admin'];
	$op=new operacion();
	$ope=$_GET['ope'];
	//$ope='lis-borrar';
	$datos62=[];
	$json1=$op->consulta('select cod_ven from vendedor where nombre="'.$nombre.'"');
	$decode1=json_decode($json1, true);
	foreach ($decode1 as $key) {
		$datos62[]=$key['cod_ven'];
	}
	$codigo52=$datos62[0];
	if($ope=='t-cobranza'){
		$nombre=$_GET['nombre'];
		//$nombre='ADELA GONZALES';
		$datos=[];
		$json=$op->consulta("select tipo,numdoc,cliente,cod_ven,emision,total,pagos,saldo,DATEDIFF(CURDATE(),emision)from cuentasxcobrar where cliente='$nombre'");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("tipo"=>$key['tipo'],"numero"=>$key['numdoc'],"cliente"=>$key['cliente'],"vendedor"=>$key['cod_ven'],"emitido"=>$key['emision'],"total"=>$key['total'],"pago"=>$key['pagos'],"saldo"=>$key['saldo'],"dias"=>$key['DATEDIFF(CURDATE(),emision)']);
		}
		echo json_encode($datos);
	}
	if($ope=='show-cobranza'){
		$ide=$_GET['ide'];
		//$ide=11;
		$datos=[];
		$json=$op->consulta("select sum(total) from cuentasxcobrar where cod_ven=".$ide."");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=number_format($key['sum(total)'],2,".",",");
		}
		$json=$op->consulta("select cliente,DATEDIFF(CURDATE(),emision) from cuentasxcobrar where cod_ven=".$ide." ORDER BY emision ASC limit 0,1");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['cliente'];
			$datos[]=$key['DATEDIFF(CURDATE(),emision)'];
		}
		$json=$op->consulta("select sum(total),cliente from cuentasxcobrar where cod_ven=".$ide." GROUP BY cliente ORDER BY sum(total) DESC LIMIT 0,1");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]= number_format($key['sum(total)'],2,".",",");
			$datos[]=$key['cliente'];
		}
		echo json_encode($datos);
	}
	if($ope=='t-deudas'){
		$nombre=$_GET['nombre'];
		$json=$op->consulta("select numdoc,cliente,emision,total,DATEDIFF(CURDATE(),emision) FROM cuentasxcobrar where cod_ven=".$nombre." group by emision ASC LIMIT 0,10");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("numero"=>$key['numdoc'],"cliente"=>$key['cliente'],"emitido"=>$key['emision'],"total"=>$key['total'],"dias"=>$key['DATEDIFF(CURDATE(),emision)']);
		}
		echo json_encode($datos);
	}
	if($ope=='t-deuda2'){
		$nombre=$_GET['nombre'];
		$datos=[];
		$json=$op->consulta("select sum(saldo),cliente from cuentasxcobrar where cod_ven=".$nombre." GROUP BY cliente ORDER BY sum(total) DESC limit 0,10");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("nombre"=>$key['cliente'],"deuda"=>$key['sum(saldo)']);
		}
		echo json_encode($datos);
	}
	if($ope=='lis-cobrar'){
		$json=$op->consulta("select fecharecibo,numrecibo,cliente,cod_ven,total,estado from recibo order by id_recibo desc");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("fecha"=>$key['fecharecibo'],"recibo"=>$key['numrecibo'],"cliente"=>$key['cliente'],"vendedor"=>$key['cod_ven'],"total"=>$key['total'],"estado"=>$key['estado']);
		}
		echo json_encode($datos);
	}
	if($ope=='lis-cobrar2'){
		$recibo=$_GET['recibo'];
		$json=$op->consulta("select numfac,pago from recibos where numrecibo=".$recibo."");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("factura"=>$key['numfac'],"pago"=>$key['pago']);
		}
		echo json_encode($datos);
	}
	if($ope=='lista-gral'){
		$json=$op->consulta("select tipo,numdoc,cliente,cod_ven,emision,total,pagos,saldo from cuentasxcobrar ORDER BY emision DESC");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("tipo"=>$key['tipo'],"numero"=>$key['numdoc'],"cliente"=>$key['cliente'],"vendedor"=>$key['cod_ven'],"emision"=>$key['emision'],"total"=>$key['total'],"pagos"=>$key['pagos'],"saldo"=>$key['saldo']);
		}
		echo json_encode($datos);
	}
	if($ope=='lista-pers'){
		$json=$op->consulta("select numdoc,cliente,total from cuentasxcobrar WHERE cod_ven=".$codigo52." ORDER BY emision DESC");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("numero"=>$key['numdoc'],"cliente"=>$key['cliente'],"total"=>$key['total']);
		}
		echo json_encode($datos);
	}
	if($ope=='lis-cobrar1'){
		$json=$op->consulta("select fecharecibo,numrecibo,cliente,total,estado from recibo WHERE cod_ven=".$codigo52." order by id_recibo desc");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("fecha"=>$key['fecharecibo'],"recibo"=>$key['numrecibo'],"cliente"=>$key['cliente'],"total"=>$key['total'],"estado"=>$key['estado']);
		}
		echo json_encode($datos);
	}
	if($ope=='estado1'){
		$datos=[];
		$json=$op->consulta("select sum(total) from cuentasxcobrar where cod_ven=".$codigo52."");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=number_format($key['sum(total)'],2,".",",");
		}
		$json=$op->consulta("select cliente,DATEDIFF(CURDATE(),emision) from cuentasxcobrar where cod_ven=".$codigo52." ORDER BY emision ASC limit 0,1");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=$key['cliente'];
			$datos[]=$key['DATEDIFF(CURDATE(),emision)'];
		}
		$json=$op->consulta("select sum(total),cliente from cuentasxcobrar where cod_ven=".$codigo52." GROUP BY cliente ORDER BY sum(total) DESC LIMIT 0,1");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]= number_format($key['sum(total)'],2,".",",");
			$datos[]=$key['cliente'];
		}
		echo json_encode($datos);
	}
	if($ope=='estado2'){
		$json=$op->consulta("select numdoc,cliente,emision,total,DATEDIFF(CURDATE(),emision) FROM cuentasxcobrar where cod_ven=".$codigo52." group by emision ASC LIMIT 0,10");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("numero"=>$key['numdoc'],"cliente"=>$key['cliente'],"emitido"=>$key['emision'],"total"=>$key['total'],"dias"=>$key['DATEDIFF(CURDATE(),emision)']);
		}
		echo json_encode($datos);
	}
	if($ope=='estado3'){
		$json=$op->consulta("select sum(saldo),cliente from cuentasxcobrar where cod_ven=".$codigo52." GROUP BY cliente ORDER BY sum(total) DESC limit 0,10");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("nombre"=>$key['cliente'],"deuda"=>$key['sum(saldo)']);
		}
		echo json_encode($datos);
	}
	if($ope=='pagosxfecha'){
		$fecha=$_GET['fecha'];
		$paquete=[];
		$total=0;
		$json=$op->consulta("select fecharecibo,numrecibo,cliente,total from recibo where cod_ven=".$codigo52." and fecharecibo='".$fecha."'");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$total=$total+$key['total'];
			$datos[]=(object)array("fecha"=>$key['fecharecibo'],"recibo"=>$key['numrecibo'],"cliente"=>$key['cliente'],"total"=>$key['total']);
		}
		$paquete[]=$datos;
		$paquete[]=$total;
		echo json_encode($paquete);
	}
	if($ope=='lis-borrar'){
		$recibo=$_GET['recibo'];
		$json2=$op->consulta("select numfac,pago from recibos where numrecibo=".$recibo."");
		$decode=json_decode($json2, true);
		$json3="";
		foreach ($decode as $key) {
			$cadena='saldo=saldo+'.$key['pago'].'';
			$json3=$op->actualizar('cuentasxcobrar','numdoc',$key['numfac'],$cadena);
		}
		$json=$op->eliminar('recibos','numrecibo',$recibo);
		$json1=$op->eliminar('recibo','numrecibo',$recibo);
		echo json_encode($json1." ".$json3);
	}
	if($ope=='lisxven'){
		$vendedor=$_GET['vendedor'];
		$json=$op->consulta("select fecharecibo,numrecibo,cliente,cod_ven,total from recibo where cod_ven=".$vendedor." order by id_recibo desc");
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("fecha"=>$key['fecharecibo'],"recibo"=>$key['numrecibo'],"cliente"=>$key['cliente'],"vendedor"=>$key['cod_ven'],"total"=>$key['total']);
		}
		echo json_encode($datos);
	}
	if($ope=='changeStado'){
		$recibo=$_GET['recibo'];
		$cadena="estado='Registrado'";
		$json=$op->actualizar('recibo','numrecibo',$recibo,$cadena);
		echo json_encode($json);
	}
	if($ope=='avisoDeuda'){
		$nombre=$_GET['nom'];
		$json=$op->consulta('select numdoc,emision,total,DATEDIFF(CURDATE(),emision) FROM cuentasxcobrar WHERE cliente="'.$nombre.'" group by emision ASC LIMIT 0,1');
		$decode=json_decode($json, true);
		foreach ($decode as $key) {
			$datos[]=(object)array("numero"=>$key['numdoc'],"emitido"=>$key['emision'],"total"=>$key['total'],"dias"=>$key['DATEDIFF(CURDATE(),emision)']);
		}
		echo json_encode($datos);
	}
 ?>
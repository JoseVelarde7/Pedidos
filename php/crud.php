<?php
/**
* crud con pdo 
* @author  <juan></jose>
*/
class operacion{

	private $pdo;
	function __construct(){
		/*try {
		  $this->pdo = new PDO('mysql:host=localhost;dbname=faturacion', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		} catch(PDOException $ex) {
		  echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
		}*/

		try {
		  $this->pdo = new PDO('mysql:host=localhost;dbname=baesacom_pedidos', 'baesacom_jose', 'juanjose-2017',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		  $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  //echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
		} catch(PDOException $ex) {
		  echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
		}
	}
    
	function registrar($reg,$tabla){
		try {
			$insert2 = $this->pdo->prepare("insert into ".$tabla." VALUES (".implode(",", $reg).")");
			$insert2->execute();	
			return 'insertado';
		}catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function listar($tabla){
		$cad=array();
		try {
			$lista=$this->pdo->prepare("SHOW COLUMNS FROM ".$tabla);
			$lista->execute();
			foreach($lista->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $cad[]= $r->Field;
            }
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
		$can=count($cad);
		$vector=[];
		$cha='id_ven';
		$cha2='nombre';
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}

	function listarcolumna($tabla,$columna){
		$i=0;
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".$columna." from ".$tabla." order by ".$columna." asc");
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				if ($nombre=$key->$columna) {
					$vector[]=$nombre;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}

	function buscar($tabla,$nom,$valor){
		$cad=array();
		try {
			$lista=$this->pdo->prepare("SHOW COLUMNS FROM ".$tabla);
			$lista->execute();
			foreach($lista->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $cad[]= $r->Field;
            }
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
		$can=count($cad);
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla." where ".$nom."=".$valor);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
		return ($vector);
	}

	function eliminar($tabla,$id,$valor){
		try {
			$eliminar=$this->pdo->prepare("delete from ".$tabla." where ".$id."=".$valor);
			$eliminar->execute();
			$cuenta = $eliminar->rowCount();
			if($eliminar->rowCount()>0){
				return "Se Eliminaron".$cuenta." Filas";
			}else{
				return ("no se elimino nada");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function eliminar2param($tabla,$id,$valor,$id1,$valor1){
		try {
			$eliminar=$this->pdo->prepare("delete from ".$tabla." where ".$id."=".$valor." and ".$id1."=".$valor1);
			$eliminar->execute();
			$cuenta = $eliminar->rowCount();
			if($eliminar->rowCount()>0){
				return "Se Eliminaron".$cuenta." Filas";
			}else{
				return ("no se elimino nada");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function borrarconsola($sql){
		try {
			$eliminar=$this->pdo->prepare($sql);
			$eliminar->execute();
			$cuenta = $eliminar->rowCount();
			if($eliminar->rowCount()>0){
				return "Se Eliminaron".$cuenta." Filas";
			}else{
				return ("no se elimino nada");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}	

	function actualizar($tabla,$id,$valor,$cadena){
		try {
			$update=$this->pdo->prepare("UPDATE ".$tabla." SET ".$cadena." WHERE ".$id."=".$valor);
			$update->execute();
			if ($update->rowCount() > 0){
				return("exito");
			}
			else{
				return ("no se modificaron ninguna fila");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function actualizar2param($tabla,$id,$valor,$id1,$valor1,$cadena){
		try {
			$update=$this->pdo->prepare("UPDATE ".$tabla." SET ".$cadena." WHERE ".$id."=".$valor." and ".$id1."=".$valor1);
			$update->execute();
			if ($update->rowCount() > 0){
				return("exito");
			}
			else{
				return ("no se modificaron ninguna fila");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function actprodmenos($nombre,$cantidad){
		try {
			$update=$this->pdo->prepare("update productos set uni_almacen=uni_almacen-".$cantidad." where nombre_prod='".$nombre."'");
			$update->execute();
			if ($update->rowCount() > 0){
				return("exito");
			}
			else{
				return ("no se modificaron ninguna fila");
			}
			
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function actprodmas($nombre,$cantidad){
		try {
			$update=$this->pdo->prepare("update productos set uni_almacen=uni_almacen+".$cantidad." where nombre_prod='".$nombre."'");
			$update->execute();
			if ($update->rowCount() > 0){
				return("exito");
			}
			else{
				return ("no se modificaron ninguna fila");
			}
		} catch (PDOException $e) {
			return die($e->getMessage());
		}
	}

	function listarcolumnas($tabla,$cad){
		$can=count($cad);
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}

	function liscoldescid($tabla,$cad,$id,$cod){
		$can=count($cad);
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla." where cod_ven='".$cod."' ORDER BY ".$id." DESC");
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}

	function buscolid($tabla,$cad,$id,$valor){
		$can=count($cad);
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla." where ".$id."= ".$valor);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}

	function numfilas($tabla){
		$numero;
		try {
			$lis=$this->pdo->prepare("select count(*) from".$tabla);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_ASSOC) as $key) {
				$numero= $key['count(*)'];
			}
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
		return $numero;
	}

	function ultimovalor($tabla,$columna){
		$numero;
		try {
			$lis=$this->pdo->prepare("select ".$columna." FROM ".$tabla." ORDER BY ".$columna." DESC LIMIT 0,1");
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_ASSOC) as $key) {
				$numero= $key[$columna];
			}
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
		return $numero;
	}

	function solopedido($tabla,$cad){
		$can=count($cad);
		$vector=[];
		try {
			$lis=$this->pdo->prepare("select ".implode(",", $cad)." from ".$tabla);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				for ($i=0; $i < $can; $i++) { 
					$chad=$cad[$i];
					$vector[]=$key->$chad;
				}
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return $vector;
	}
    
	function validar($usuario,$pass){
		$vector="";
		try {
			$lis=$this->pdo->prepare("select nombre from vendedor where usuario='".$usuario."' and pass='".$pass."'");
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				$vector=$key->nombre;
			}
		} catch (PDOException $e) {
			die($e->getMessage());	
		}
		return ($vector);
	}

	function consulta($sql){
		$vector=[];
		try {
			$lis=$this->pdo->prepare($sql);
			$lis->execute();
			foreach ($lis-> fetchAll(PDO::FETCH_OBJ) as $key) {
				$vector[]=$key;
			}
		} catch (PDOException $e) {
			return die($e->getMessage());	
		}
		return json_encode($vector);
	}

}

 ?>
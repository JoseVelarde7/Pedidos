<?php 
	
	/*try {
	  $db = new PDO('mysql:host=localhost;dbname=faturacion', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	  echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	} catch(PDOException $ex) {
	  echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
	}

	
	----------para conectar con el servidor real--------------*/
	try {
	  $db = new PDO('mysql:host=localhost;dbname=baesa_facturacion', 'baesa_juanprueba', 'pepevelarde7*',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	  echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	} catch(PDOException $ex) {
	  echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
	}




	
	 /*try {
		$pd=$db->prepare("insert into vendedor values(13,'jose',123456784)");
        $pd->execute();
        echo "registro insertado";
     } catch (Exception $e) {
         die($e->getMessage());
     }
	*/
     try {
		$query=$db->prepare("select * from cliente2");
        $query->execute();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) AS $value) {
        	$vec[]=$value->nombre;
        }
     } catch (Exception $e) {
         die($e->getMessage());
     }
     echo json_encode($vec);

    /*
	echo json_encode(utf8ize($vec)); // ESTA FUNCION ES PARA CODIFICAR TODO EN UTF-8
    function utf8ize($d) {
	    if (is_array($d)) 
	        foreach ($d as $k => $v) 
	            $d[$k] = utf8ize($v);
	     else if(is_object($d))
	        foreach ($d as $k => $v) 
	            $d->$k = utf8ize($v);
	     else 
	        return utf8_encode($d);
	    return $d;
	}*/

     /*$id=12;
     try {
            $elim = $db->prepare("delete from vendedor WHERE id_ven = ?");
            $elim->bindParam(1, $id);                    
            $elim->execute();
            echo "eliminado";
     } catch (Exception $e){
            die($e->getMessage());
     }*/
    /*$nombre="jose";
    try{
	    $lista = $db->prepare("SELECT * FROM vendedor where nombre = ?");
		if ($lista->execute(array($nombre))) {
		  foreach ($lista->fetchAll(PDO::FETCH_OBJ) AS $val) {
	        	echo $val->id_ven;
	        	echo $val->nombre;
	        	echo $val->celular;
	       }
		}	
    }catch (Exception $e){
        die($e->getMessage());
    }*/
    
    /*try{
	    $inser = $db->prepare("INSERT INTO vendedor VALUES (?,?,?)");
		$inser->bindParam(1, $id);
		$inser->bindParam(2, $nombre);
		$inser->bindParam(3, $celular);

		// insertar una fila
		$id = 16;
		$nombre = "maria";
		$celular=77245214;
		$inser->execute();
		echo "registro insertado";

		// insertar otra fila con diferentes valores
		$id = 17;
		$nombre = "pedro";
		$celular=772453214;
		$inser->execute();	
		echo "registro insertado";
    }catch(Exception $e){
    	die($e->getMessage());
    }*/
	
	/*try {
		$insert2 = $db->prepare("INSERT INTO vendedor VALUES (:ide, :nombre,:celular)");
		$insert2->bindParam(':ide', $ide);
		$insert2->bindParam(':nombre', $nombre);
		$insert2->bindParam(':celular', $cel);

		// insertar una fila
		$ide = 21;
		$nombre = "marcos";
		$cel=78454145;
		$insert2->execute();

		$ide = 22;
		$nombre = "misael";
		$cel=22222222;
		$insert2->execute();	
		echo "registro insertado";
	} catch (Exception $e) {
		die($e->getMessage());
	}*/
    

 ?>
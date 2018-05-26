<?PHP
	require_once("crud.php");
	session_start();
	$usuario=$_POST['user'];
	$_SESSION['admin']=$usuario;
?>
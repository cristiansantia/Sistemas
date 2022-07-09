<?php  
	date_default_timezone_set("America/El_Salvador");
	include ("conexion.php");
	$user = $_POST['user'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM usuario WHERE nombreusuario='$user' AND contrasena='$password'";
	$consulta = mysqli_query($conexion, $sql);
	$count = mysqli_num_rows($consulta);
	$row = mysqli_fetch_array($consulta);
	if ($count == 1) {
		session_start();

		$time = time();
		$_SESSION['sesion'] = date("d-m-Y (H:i:s)", $time);
		$_SESSION['name'] = utf8_encode(strtok($row[1], " ") . " " . strtok($row[2], " "));
		$_SESSION['logged'] = true;
		header("location: ../home.php?alert=1");
	} else {
		header("location: ../index.php?alert=1");
	} 
?>
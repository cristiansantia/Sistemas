<?php  
	include ("conexion.php");

	$var = md5("admin");

	$consulta = mysqli_query($conexion, "UPDATE usuario SET contrasena='$var' WHERE idusuario=1");
?>
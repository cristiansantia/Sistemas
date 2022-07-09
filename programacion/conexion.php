<?php  
	$conexion = new mysqli("localhost","root","","siconip");
	
	if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
	} else {}
?>
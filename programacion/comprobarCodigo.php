<?php  
	include ("conexion.php");

	$codigoBuscar = $_POST['valorBusqueda'];

	$sql = "SELECT * FROM 
				mobiliario
			WHERE
				codigomobiliario='$codigoBuscar';
	";

	$consulta = mysqli_query($conexion, $sql);

	if(mysqli_num_rows($consulta) >= 1) {
		echo 1;
	} else {
		echo 2;
	}
?>
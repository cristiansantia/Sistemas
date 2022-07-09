<?php  
	include ("conexion.php");

	$tipo = $_POST['codigotipo'];

	$sql = "SELECT * FROM 
				tipos
			WHERE
				codigotipo='$tipo';
	";

	$consulta = mysqli_query($conexion, $sql);

	if(mysqli_num_rows($consulta) >= 1) {
		echo 1;
	} else {
		echo 2;
	}
?>
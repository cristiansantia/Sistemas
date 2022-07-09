<?php  
	include("conexion.php");

	$codigo = $_POST['codigoDescargo'];

	$sql = "UPDATE mobiliario SET activo=0 WHERE codigomobiliario='$codigo'";
	$consulta = mysqli_query($conexion, $sql);

	if ($consulta) {
		//Si 
		echo 1;
	} else {
		//No
		echo 2;
	}

?>
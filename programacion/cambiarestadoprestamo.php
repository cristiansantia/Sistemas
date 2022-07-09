<?php  
	include("conexion.php");

	echo $codigotipo = $_GET['id'];
	echo $estado = $_GET['estado'];

	if ($estado == 1) {
		$sql = "UPDATE tipos SET estadotipo=0 WHERE codigotipo='$codigotipo'";
	} else if($estado == 0) {
		$sql = "UPDATE tipos SET estadotipo=1 WHERE codigotipo='$codigotipo'";
	}

	$consulta = mysqli_query($conexion, $sql);
	header("Location: ../tipos.php");
?>
<?php  
	include("conexion.php");

	$id = $_GET['id'];

	$sql = "DELETE FROM tipos WHERE codigotipo='$id'";
	$consulta = mysqli_query($conexion, $sql);

	if ($consulta) {
		header("Location: ../tipos.php?status=1");
	} else {
		header("Location: ../tipos.php?status=2");
	}
?>
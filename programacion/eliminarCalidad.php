<?php  
	include("conexion.php");

	$id = $_GET['id'];

	$sql = "DELETE FROM calidades WHERE idcalidad='$id'";
	$consulta = mysqli_query($conexion, $sql);

	if ($consulta) {
		header("Location: ../calidades.php?status=1");
	} else {
		header("Location: ../calidades.php?status=2");
	}
?>
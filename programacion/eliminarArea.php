<?php  
	include("conexion.php");

	$id = $_GET['id'];

	$sql = "DELETE FROM areas WHERE idarea='$id'";
	$consulta = mysqli_query($conexion, $sql);

	if ($consulta) {
		header("Location: ../areas.php?status=1");
	} else {
		header("Location: ../areas.php?status=2");
	}
?>
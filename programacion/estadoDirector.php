<?php  
	include("conexion.php");

	echo $escalafon = $_GET['id'];
	echo $estado = $_GET['estado'];

	$reset = mysqli_query($conexion, "UPDATE director SET estado=0");

	if ($estado == 1) {
		$sql = "UPDATE director SET estado=0 WHERE nescalafon='$escalafon'";
	} else if($estado == 0) {
		$sql = "UPDATE director SET estado=1 WHERE nescalafon='$escalafon'";
	}

	$consulta = mysqli_query($conexion, $sql);
	header("Location: ../datosDirector.php");
?>
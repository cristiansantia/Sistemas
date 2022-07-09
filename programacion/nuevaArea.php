<?php  
	include ("conexion.php");

	$nombreArea = ucfirst(utf8_decode($_POST['nombreArea']));
	$descripcionArea = ucfirst(utf8_decode($_POST['descripcionArea']));

	if (!empty($nombreArea) && !empty($descripcionArea)) {
		$sqlComprobar = "SELECT * FROM areas WHERE nombrearea='$nombreArea'";
		$consultaComprobar = mysqli_query($conexion, $sqlComprobar);
		
		if (mysqli_num_rows($consultaComprobar) == 0) {
			$sql = "INSERT INTO areas(
						nombrearea,
						descripcionarea
					) VALUES(
						'$nombreArea',
						'$descripcionArea'
					)
			";

			$consulta = mysqli_query($conexion, $sql);
			if ($consulta) {
				echo 1;
			} else {
				echo 2;
			}
		} else {
			echo 4;
		}
	} else {
		echo 3;
	}
?>
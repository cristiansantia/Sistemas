<?php  
	include ("conexion.php");

	$nombreCalidad = ucfirst(utf8_decode($_POST['nombreCalidad']));
	$descripcionCalidad = ucfirst(utf8_decode($_POST['descripcionCalidad']));

	if (!empty($nombreCalidad) && !empty($descripcionCalidad)) {
		$sqlComprobar = "SELECT * FROM calidades WHERE nombrecalidad='$nombreCalidad'";
		$consultaComprobar = mysqli_query($conexion, $sqlComprobar);
		
		if (mysqli_num_rows($consultaComprobar) == 0) {
			$sql = "INSERT INTO calidades(
						nombrecalidad,
						descripcioncalidad
					) VALUES(
						'$nombreCalidad',
						'$descripcionCalidad'
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
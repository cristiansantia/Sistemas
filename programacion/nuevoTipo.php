<?php  
	include ("conexion.php");
	$codigotipo=$_POST['codigotipo'];
	$nombreTipo = ucfirst(utf8_decode($_POST['nombreTipo']));
	$descripcionTipo = ucfirst(utf8_decode($_POST['descripcionTipo']));

	if (!empty($nombreTipo) && !empty($descripcionTipo) && !empty($codigotipo)) {
		$sqlComprobar = "SELECT * FROM tipos WHERE codigotipo='$codigotipo'";
		$consultaComprobar = mysqli_query($conexion, $sqlComprobar);
		
		if (mysqli_num_rows($consultaComprobar) == 0) {
			$sql = "INSERT INTO tipos(
						codigotipo,
						nombretipo,
						descripciontipo
					) VALUES(
						'$codigotipo',
						'$nombreTipo',
						'$descripcionTipo'
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
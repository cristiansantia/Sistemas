<?php  
	include("conexion.php");

	$nombreTabla = $_POST['nombreTabla'];
	$idRegistro = $_POST['idRegistro'];
	$nombre = ucwords(utf8_decode($_POST['nombre']));
	$descripcion = ucfirst(utf8_decode($_POST['descripcion']));
 
	if (!empty($nombreTabla) && !empty($idRegistro)) {
		if (!empty($nombre) && !empty($descripcion)) {
			if ($nombreTabla == "areas") {
				$sql = "UPDATE areas SET nombrearea='$nombre', descripcionarea='$descripcion' WHERE idarea='$idRegistro'";
			} else if ($nombreTabla == "calidades") {
				$sql = "UPDATE calidades SET nombrecalidad='$nombre', descripcioncalidad='$descripcion' WHERE idcalidad='$idRegistro'";
			} else if ($nombreTabla == "tipos") {
				$sql = "UPDATE tipos SET nombretipo='$nombre', descripciontipo='$descripcion' WHERE codigotipo='$idRegistro'";
			}

			$consulta = mysqli_query($conexion, $sql);
			if ($consulta) {
				//Si se actualiza
				echo 3;
			} else {
				//Si no se actualiza
				echo 4;
			}
		} else {
			//Si los campos requeridos están vacíos
			echo 2;
		}
	} else {
		//Si faltan datos para la consulta
		echo 1;
	}
?>
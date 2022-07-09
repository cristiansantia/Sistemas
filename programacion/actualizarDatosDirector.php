<?php  
	include ("conexion.php");

	$escalafon = utf8_decode($_POST['escalafonE']);
	$nombre = ucwords(utf8_decode($_POST['nombreE']));
	$telefono = utf8_decode($_POST['telefonoE']);
	$email = utf8_decode($_POST['emailE']);
	$fechaI = utf8_decode($_POST['fechaIE']);
	$fechaF = utf8_decode($_POST['fechaFE']);

	if (!empty($escalafon) && !empty($nombre) && !empty($fechaI)) {
		if (preg_match("/^[a-zA-Z áéíóúAÉÍÓÚÑñ ]+$/",utf8_encode($nombre))) {
			$sql = "UPDATE
					director
				SET 
					nombredirector = '$nombre',
					telefono = '$telefono',
					email = '$email',
					fechanombramiento= '$fechaI',
					fechafinalizacion = '$fechaF'
				WHERE
					nescalafon = '$escalafon'
				";

			$consulta = mysqli_query($conexion, $sql);
			if ($consulta) {
				echo 1;
			} else {
				echo 2;
			}
		} else {
			//Si el nombre contiene caracteres no válidos
			echo 4;
		}
	} else {
		//Si campos obligatorios faltan
		echo 3;
	}
?>
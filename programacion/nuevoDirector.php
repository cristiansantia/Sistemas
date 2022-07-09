<?php  
	include ("conexion.php");

	$escalafon = utf8_decode($_POST['escalafon']);
	$nombre = ucwords(utf8_decode($_POST['nombre']));
	$telefono = utf8_decode($_POST['telefono']);
	$email = utf8_decode($_POST['email']);
	$fechaI = $_POST['fechaI'];
	$fechaF = $_POST['fechaF'];

	if (!empty($escalafon) && !empty($nombre) && !empty($fechaI)) {
		if (preg_match("/^[1234567890-]+$/", $escalafon)) {
			if (preg_match("/^[a-zA-Z áéíóúAÉÍÓÚÑñ ]+$/",utf8_encode($nombre))) {
				$sql = "INSERT INTO director(
						nescalafon,
						nombredirector,
						telefono,
						email,
						fechanombramiento,
						fechafinalizacion,
						estado
					) VALUES( 
						'$escalafon',
						'$nombre',
						'$telefono',
						'$email',
						'$fechaI',
						'$fechaF',
						0
					)";

				$consulta = mysqli_query($conexion, $sql);
				if ($consulta) {
					echo 1;
				} else {
					echo 2;
				}
			} else {
				//Si el nombre contiene caracteres no válidos
				echo 5;
			}
		} else {
			//Si en el N° de Escalafón contiene caracteres no validos
			echo 4;
		}
	} else {
		//Si campos obligatorios están vacíos
		echo 3;
	}
?>
<?php  
	include ("conexion.php");

	$id = $_POST['idU'];
	$nombre = ucwords(utf8_decode($_POST['nombreU']));
	$apellido = ucwords(utf8_decode($_POST['apellidoU']));
	$nombreUsuario = utf8_decode($_POST['nombreUsuarioU']);
	$contrasenaA = md5(utf8_decode($_POST['contrasenaAc']));
	$contrasenaN = md5(utf8_decode($_POST['contrasenaNu']));

	if (!empty($nombre) && !empty($apellido) && !empty($nombreUsuario) && !empty($contrasenaA) && !empty($contrasenaN)) {
		$sqlComprobar = "SELECT * FROM 
							usuario 
						WHERE 
							idusuario='$id'
						AND
							contrasena='$contrasenaA'
						";

		$consultarComprobar = mysqli_query($conexion, $sqlComprobar);
		if (mysqli_num_rows($consultarComprobar) >= 1) {
			$sql = "UPDATE
						usuario
					SET 
						nombre = '$nombre',
						apellido = '$apellido',
						nombreusuario = '$nombreUsuario',
						contrasena = '$contrasenaN'
					WHERE 
						idusuario='$id'
					";

			$consulta = mysqli_query($conexion, $sql);
			if ($consulta) {
				echo 1;
			} else {
				echo 2;
			}
		} else {
			//Si la contraseña actual es erronea
			echo 4;
		}
	} else {
		//Si faltan campos
		echo 3;
	}
?>
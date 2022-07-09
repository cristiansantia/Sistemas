<?php  
	include ("conexion.php");

	$codigo = utf8_decode($_POST['codigo']);
	$nombre = ucwords(utf8_decode($_POST['nombre']));
	$direccion = ucfirst(utf8_decode($_POST['direccion']));
	if (!empty($codigo) && !empty($nombre) && !empty($direccion)) {
		$sql = "UPDATE
					institucion 
				SET 
					codigoinst = '$codigo',
					nombreinst = '$nombre',
					direccioninst = '$direccion'
		";

		$consulta = mysqli_query($conexion, $sql);
		if ($consulta) {
			echo 1;
		} else {
			echo 2;
		}
	} else {
		echo 3;
	}
?>
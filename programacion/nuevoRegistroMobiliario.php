<?php  
	include ("conexion.php");
	$tipo = $_POST['tipo'];
	$codigo = $_POST['codigo'];
	$descripcion = ucfirst(utf8_decode($_POST['descripcion']));
	$marca = $_POST['marca'];
	$modelo = ucfirst(utf8_decode($_POST['modelo']));
	$serie = utf8_decode($_POST['serie']);
	$fechaAdquisicion = $_POST['fechaAdquisicion'];
	$calidad = $_POST['calidad'];
	$tamano = $_POST['tamano'];
	$color = utf8_decode($_POST['color']);
	$precio = $_POST['precio'];
	$areaAsignada = $_POST['areaAsignada'];
	$estado = $_POST['estado'];
	$nRecibo = $_POST['nRecibo'];
	$origen = $_POST['origen'];

	if (!empty($tipo) &&  !empty($codigo) && !empty($descripcion) && !empty($fechaAdquisicion) && !empty($calidad) && !empty($color)  && !empty($areaAsignada) && !empty($estado) && !empty($marca) && !empty($origen)) {

		$comprobandoSerie = "SELECT * FROM mobiliario WHERE serie='$serie'";
		$consultaSerie = mysqli_query($conexion, $comprobandoSerie);

		if (mysqli_num_rows($consultaSerie) == 0 || (mysqli_num_rows($consultaSerie) > 0 && $serie == "")) {
			if (preg_match("/^[. 1234567890]+$/", $precio)) {
				//Si todos los datos son válidos 
				$sql = "INSERT INTO mobiliario(
							codigomobiliario,
							descripcion,
							marca,
							modelo,
							serie,
							fechaadquisicion,
							idcalidad,
							tamano,
							color,
							precio,
							codigotipo,
							idarea,
							idestado,
							activo, 
							numerorecibo,
							origen
						) VALUES(
							'$codigo',
							'$descripcion',
							'$marca',
							'$modelo',
							'$serie',
							'$fechaAdquisicion',
							'$calidad',
							'$tamano',
							'$color',
							'$precio',
							'$tipo',
							'$areaAsignada',
							'$estado',
							1,
							'$nRecibo',
							'$origen'
						)
				";

				$consulta = mysqli_query($conexion, $sql);
				if ($consulta) {
					echo 1;
				} else {
					echo 2;
				}
			} else {
				//Si el precio contiene caracteres no válidos
				echo 4;
			}
		} else {
			//Si el número de serie ya existe
			echo 5;
		}
		
	} else {
		//Si faltan campos obligatorios
		echo 3;
	}
?>
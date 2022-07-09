<?php  
	include ("conexion.php");

	$oldCode = $_POST['codigoOLD'];
	$codigo = $_POST['codigoE'];
	$descripcion = ucfirst(utf8_decode($_POST['descripcionE']));
	$marca = $_POST['marcaE'];
	$modelo = ucfirst(utf8_decode($_POST['modeloE']));
	$serie = utf8_decode($_POST['serieE']);
	$fechaAdquisicion = $_POST['fechaAdquisicionE'];
	$calidad = $_POST['calidadE'];
	$tamano = $_POST['tamanoE'];
	$color = utf8_decode($_POST['colorE']);
	$precio = $_POST['precioE'];
	$tipo = $_POST['tipoE'];
	$areaAsignada = $_POST['areaAsignadaE'];
	$estado = $_POST['estadoE'];
	$nRecibo = $_POST['nReciboE'];
	$origen = $_POST['origenE'];

	if (!empty($codigo) && !empty($descripcion) && !empty($fechaAdquisicion) && !empty($calidad) && !empty($color) && !empty($tipo) && !empty($areaAsignada) && !empty($estado) && !empty($marca) && !empty($origen)) {

		$comprobandoSerie = "SELECT * FROM mobiliario WHERE serie='$serie'";
		$consultaSerie = mysqli_query($conexion, $comprobandoSerie);
		$rows = mysqli_num_rows($consultaSerie);
		if ($rows == 1) {
			$comprobandoSerie2 = "SELECT * FROM mobiliario WHERE serie='$serie' AND codigomobiliario='$oldCode'";
			$consultaSerie2 = mysqli_query($conexion, $comprobandoSerie2);
			if (mysqli_num_rows($consultaSerie2) == 1) {
				if (preg_match("/^[. 1234567890]+$/", $precio)) {
					//Si todos los datos son válidos 
					$sql = "UPDATE 
								mobiliario
							SET
								codigomobiliario = '$codigo',
								descripcion = '$descripcion',
								marca = '$marca',
								modelo = '$modelo',
								serie = '$serie',
								fechaadquisicion = '$fechaAdquisicion',
								idcalidad = '$calidad',
								tamano = '$tamano',
								color = '$color',
								precio = '$precio',
								codigotipo = '$tipo',
								idarea = '$areaAsignada',
								idestado = '$estado',
								activo = 1,
								numerorecibo = '$nRecibo',
								origen = '$origen'
							WHERE 
								codigomobiliario = '$oldCode'
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
				echo 6;
			}	
		} else if($rows == 0) {
			if (preg_match("/^[. 1234567890]+$/", $precio)) {
				//Si todos los datos son válidos 
				$sql = "UPDATE 
							mobiliario
						SET
								codigomobiliario = '$codigo',
								descripcion = '$descripcion',
								marca = '$marca',
								modelo = '$modelo',
								serie = '$serie',
								fechaadquisicion = '$fechaAdquisicion',
								idcalidad = '$calidad',
								tamano = '$tamano',
								color = '$color',
								precio = '$precio',
								codigotipo = '$tipo',
								idarea = '$areaAsignada',
								idestado = '$estado',
								activo = 1,
								numerorecibo = '$nRecibo',
								origen = '$origen'
						WHERE 
								codigomobiliario = '$oldCode'
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
			echo 5;
		}
	} else {
		//Si faltan campos obligatorios
		echo 3;
	}
?>


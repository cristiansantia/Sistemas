<?php 
require_once 'conexion.php';

$codigotipo=$_POST['codigotipo'];



	$sql="SELECT codigomobiliario,
			 marca, modelo
		from mobiliario 
		where codigotipo='$codigotipo' AND idestado = 1 AND activo = 1";

	$result=mysqli_query($conexion,$sql);
	
	$cadena="
			
			<label for='Equipo'>Equipos Disponibles(*):</label> 
			<select id='codigomobiliario' class='form-control' name='codigomobiliario' required>"
			;

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>Código: '.utf8_encode($ver[0]).' Marca: '.utf8_encode($ver[1]).' Modelo: '.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>
<?php  
	include ("conexion.php");
	date_default_timezone_set("America/El_Salvador");
	$nombre = ucfirst(utf8_decode($_POST['nombre']));
	$apellido = ucfirst(utf8_decode($_POST['apellido']));
	$typedocumento=$_POST['typedocumento'];
	$documento = $_POST['numdocumento'];
	$equipo = $_POST['codigomobiliario'];
	$fechap = $_POST['fechap'];
	$horap = $_POST['horap'];
	$fechad = $_POST['fechad'];
	$horad = $_POST['horad'];

	$dia=date("D",strtotime($fechap));
	$actual=date("H:i");
	$hoy=date("Y-m-d");
	

	if (!empty($nombre) && !empty($apellido) && !empty($typedocumento)  && !empty($documento) && !empty($equipo) && !empty($fechap) && !empty($horap) && !empty($fechad) && !empty($horad)) {	
		 $complitename=$nombre.$apellido;
		if (preg_match("/^[a-zA-Z áéíóúAÉÍÓÚÑñ ]+$/",utf8_encode($complitename))){


						if($fechap==$hoy AND $horap<$actual){

							echo 5;

						} // if 3
						else{

							if ($horad < $horap) {
								echo 6;
							}// if 4

							else{
							if(($horap>="07:00" AND $horap<="16:45" ) AND ($horad>="07:00" AND $horad<="17:45") AND($dia!="Sun" AND $dia!="Sat") ){
								$equiporeservado="SELECT horaprestamo, horadevolucion FROM `prestamo` WHERE codigomobiliario='$equipo' AND fechaprestamo='$fechap' AND horaprestamo AND horadevolucion BETWEEN '$horap' AND '$horad'";
									$reservas=mysqli_query($conexion,$equiporeservado);
									if(mysqli_num_rows($reservas) == 0){
											//Si todos los datos son válidos 

											if(($fechap>$hoy)OR($horap>$actual AND $fechap==$hoy)){
												$tipoo=1;
											}else{
												$tipoo=0;
											}
										$consulta="SELECT codigomobiliario FROM mobiliario WHERE codigomobiliario='$equipo' AND idestado = 1 ";
										$realiazar=mysqli_query($conexion, $consulta);
										if (mysqli_num_rows($realiazar) == 1) {
													$prestar = "INSERT INTO prestamo(
													idusuario,
													tipoidentificacion,
													nombreusuario,
													apellidousuario,
													codigomobiliario,
													fechaprestamo,
													horaprestamo,
													fechadevolucion,
													horadevolucion,
													tipo,
													estadoprestamo
												
												) VALUES(
													'$documento',
													'$typedocumento',
													'$nombre',
													'$apellido',
													'$equipo',
													'$fechap',
													'$horap',
													'$fechad',
													'$horad',
													'$tipoo',
													'0'
												)
										";

										$verificar = mysqli_query($conexion, $prestar);
										if ($verificar) {
											echo 1;
										} else {
											echo 2;
										}
										} else{
											echo 4;
										}
									}else{
										echo 9;
									}
					}//condicion prestamo
					else{
						echo 7;
					}
					}// else 4
				} //else 3

		} // if 2
					else{
						echo 8;
		} // else 2

	}//if 1
		
 else {
		//Si faltan campos obligatorios
		echo 3;
	}//else 1
?>
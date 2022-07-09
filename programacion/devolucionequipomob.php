<?php 

include ("conexion.php");
date_default_timezone_set("America/El_Salvador");

 $c = $_POST['equipodevolu'];
if (!empty($c)) {
 $datos="SELECT * FROM `mobiliario`, `prestamo` Where idprestamo='$c' and `mobiliario`.codigomobiliario=`prestamo`.codigomobiliario";
 $consulta=mysqli_query($conexion, $datos);
 $r=mysqli_fetch_array($consulta);

 
 $code=$r['codigomobiliario'];
 $marca=$r['marca'];
 $model=$r['modelo'];
 $dia=date("l d-M",strtotime($r['fechaprestamo']));
 $tipo=$r['tipo'];
 

 $sql1= "UPDATE `mobiliario` SET `idestado` = '1' WHERE `mobiliario`.`codigomobiliario` = '$code'
 ";
 $success1=mysqli_query($conexion, $sql1);

 $sql2= "UPDATE `prestamo` SET `estadoprestamo` = '1' WHERE `prestamo`.`idprestamo` = '$c'
 ";
 $success2=mysqli_query($conexion, $sql2);

 if ($success1 && $success2) {

 	if($tipo==0){
 	$message1 ="Código: ".$code." Marca: ".$marca." Modelo: ".$model;

 	echo $message1;
 	
 	}else{
 	$message2 ="Código: ".$code." Marca: ".$marca." Modelo: ".$model." Para: ".$dia;
 	echo $message2;
 }
 }

}




 ?>
<?php 
	session_start();
	
	include("conexion.php");
	$data = $_SESSION['sesion'];
	$insertarLog = mysqli_query($conexion, "UPDATE usuario SET ultimo='$data'");

	session_destroy();
	header("location: ../index.php?alert=3");
?>
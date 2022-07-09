<?php 
include("conexion.php");
$logo=addslashes(file_get_contents($_FILES['logo']['tmp_name']));
$cambiar=mysqli_query($conexion, "UPDATE institucion SET logoinstitucion='$logo'");

 if ($cambiar) {
  	header("Location:../datosInstitucion.php");
 } 




 ?>
<?php 
require_once 'conexion.php';



    $consultaCodigo = mysqli_query($conexion, "SELECT codigoinst FROM institucion");
    $codigo = mysqli_fetch_array($consultaCodigo);
    $codigotipo=$_POST['codigotipo'];

    $numerodeexistencia=mysqli_query($conexion, "SELECT COUNT(codigotipo) + 1 FROM mobiliario WHERE codigotipo='$codigotipo'");
    $existencia = mysqli_fetch_array($numerodeexistencia);
    $existencia=sprintf("%04d", $existencia[0]);
    if ($codigotipo!=0) {
    $codigocompleto=$codigo['codigoinst']."-".$codigotipo."-".$existencia;
    $cadena="
    
     <label id='codigoBuscado'>Código(*): </label>
     <input  value='".$codigocompleto."' data-mask='".$codigo['codigoinst']."-".$codigotipo."-9999' onkeyup='buscarCodigo();'id='codigoMobiliario' type='text' class='form-control ' name='codigo' >
            ";
    }else {
        $cadena="
     <label id='codigoBuscado'>Código(*): </label>
     <input  value='' data-mask='' onkeyup='buscarCodigo();'id='codigoMobiliario' type='text' class='form-control ' name='codigo' >
            ";
    }
   echo $cadena;
?>
 
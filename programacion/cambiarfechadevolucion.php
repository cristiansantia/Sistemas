<?php
    date_default_timezone_set("America/El_Salvador"); 
    $hoy=date("Y-m-d");
    $fechaselec=$_POST['fechaselec'];
    if ($fechaselec==$hoy OR $fechaselec=="" ) {

    $cadena="
    
            <label for=pwd'>Fecha de Devolución(*):</label>
            <input id='fechad' type='date' class='form-control' name='fechad' max='$hoy' min='$hoy' value='$hoy' required>

    
            ";
    echo $cadena;
    	
    } else {
     $cadena="
            <label for=pwd'>Fecha de Devolución(*):</label>
            <input id='fechad' type='date' class='form-control' name='fechad' max='$fechaselec' min='$fechaselec' value='$fechaselec' required>
            ";
    echo $cadena;

    } 
	
   
?>
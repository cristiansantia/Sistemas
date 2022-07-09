<?php
    date_default_timezone_set("America/El_Salvador");
    $horaactual=date("H:i");
    $horapordefecto=$_POST['horapordefecto'];
    if ($horapordefecto==$horaactual) {
        if ($horaactual>="06:59" AND $horaactual<="11:59" ) {
            $hora="12:00";
        }elseif ($horaactual>="12:00" AND $horaactual <="17:45") {
            $hora="17:30";
        }
    $cadena="
        <label for='pwd'>Hora de Devolución(*):</label>
        <input  data-mask='99:99' id='horad' type='text' class='form-control' max='17:00' min='07:00'  value='$hora' name='horad'>
            ";
    echo $cadena;
    	
    } else {
        if ($horapordefecto>="06:59" AND $horapordefecto<="11:20" ) {
            $hora="12:00";
        }elseif ($horapordefecto>="11:21" AND $horapordefecto<="17:45") {
            $hora="17:30";
        }
    $cadena="
        <label for='pw'>Hora de Devolución(*):</label>
        <input  data-mask='99:99' id='horad' type='text' class='form-control' max='17:00' min='07:00'  value='$hora' name='horad'>
            ";
    echo $cadena;
    
    } 
?>
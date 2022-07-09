<?php 

    $documentoseleccionado=$_POST['documentoseleccionado'];

    if ($documentoseleccionado == 1 ) {

    $cadena="
    
     <label>N°(*): </label>
     <input  data-mask='999999?99' id='numdocumento' type='text' class='form-control' name='numdocumento' required>
    
            ";
    echo $cadena;
    	
    } else if ($documentoseleccionado == 2) {
     $cadena="
    
     <label>N°(*): </label>
     <input  data-mask='99999999-9' id='numdocumento' type='text' class='form-control' name='numdocumento' required>
    
            ";
    echo $cadena;

    } 
	
   
?>
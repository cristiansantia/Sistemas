

<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Préstamos
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Devolución</th>
              <th>Responsable</th>
              <th>Estado</th>
              <th>Opciones</th>
          </tr>
      </thead>
      <tbody >
     <?php  
     include ("conexion.php");
//Este es el código de Prestamos
      date_default_timezone_set("America/El_Salvador");
      $hoy=date("Y-m-d");
      $actual=$_POST['hora'];
      $sql = "SELECT * FROM `mobiliario`, `prestamo` WHERE tipo='0' and estadoprestamo='0' and `mobiliario`.codigomobiliario=`prestamo`.codigomobiliario  ORDER BY horaprestamo ASC";
      $consultadevoluciones = mysqli_query($conexion, $sql);

      $i = 1;
      while ($datos = mysqli_fetch_array($consultadevoluciones)) {
      	$numeroid=utf8_encode($datos['idprestamo']);
      	if(($hoy==$datos['fechadevolucion']) AND ($actual>	$datos['horadevolucion'])){
      		$querypresatamo="UPDATE prestamo SET tipo='3' WHERE idprestamo='$numeroid'";
      		$eject=mysqli_query($conexion, $querypresatamo);
      	}else{
        echo '<tr id='.'tabla'. utf8_encode($datos['idprestamo']) . '>
                <td><b>' . $i . '</b></td>
                <td>' . utf8_encode($datos['codigomobiliario']) . '</td>
                <td>' . utf8_encode($datos['descripcion']) . " " . utf8_encode($datos['marca']) . '</td>
                <td>' .'Today'. $dia=date(" d-M",strtotime($datos['fechadevolucion'])).' Hora: '.$datos['horaprestamo'].' hasta '.$datos['horadevolucion'].'</td>
                <td>' . utf8_encode($datos['nombreusuario']) . " " . utf8_encode($datos['apellidousuario']) . '<br>' . utf8_encode($datos['idusuario']) . '</td>
                <td><span class="label label-success">Prestado</span></td>
                 <td><button id='. utf8_encode($datos['idprestamo']) .' onclick="devolucionequipo(this.id);" class="btn btn-success hvr-grow">Devolver</button>
                 </td>


            
              </tr>'
        ;}

        $i++;
      }
    ?>

  </tbody>
</table>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>

<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Reservaciones
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Reservación</th>
              <th>Responsable</th>
              <th>Estado</th>
              <th>Opciones</th>
          </tr>
      </thead>
      <tbody >
     <?php 
     // Este es el codigo de Reservaciones 
      date_default_timezone_set("America/El_Salvador");
      $hoy=date("Y-m-d");
      $actual=date("H:i");
      $sql = "SELECT * FROM `mobiliario`, `prestamo` WHERE tipo='1' and estadoprestamo='0' and `mobiliario`.codigomobiliario=`prestamo`.codigomobiliario  ORDER BY fechaprestamo ASC";
      $consultadevoluciones = mysqli_query($conexion, $sql);

      $i = 1;
      while ($datos = mysqli_fetch_array($consultadevoluciones)) {
      	$numeroid=utf8_encode($datos['idprestamo']);
      	if(($hoy==$datos['fechaprestamo']) AND ($actual>=$datos['horaprestamo'])){
      		$queryreservacion="UPDATE prestamo SET tipo='0' WHERE idprestamo='$numeroid'";
      		$eject=mysqli_query($conexion, $queryreservacion);
      	} else{
        echo '<tr id='.'tabla'. utf8_encode($datos['idprestamo']) . '>
                <td><b>' . $i . '</b></td>
                <td>' . utf8_encode($datos['codigomobiliario']) . '</td>
                <td>' . utf8_encode($datos['descripcion']) . " " . utf8_encode($datos['marca']) . '</td>
                <td>' . $dia=date("l d-M",strtotime($datos['fechadevolucion'])).' Hora: '.$datos['horaprestamo'].' hasta '.$datos['horadevolucion'].'</td>
                <td>' . utf8_encode($datos['nombreusuario']) . " " . utf8_encode($datos['apellidousuario']) . '<br>' . utf8_encode($datos['idusuario']) . '</td>
                <td><span class="label label-warning">Reservado</span></td>
                 <td><button id='. utf8_encode($datos['idprestamo']) .' onclick="cancelarequipo(this.id);" class="btn btn-danger hvr-grow">Cancelar</button></td>


            
              </tr>'
        ;
    }
        $i++;
      }
    ?>

  </tbody>
</table>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>


<!--- fin reservaciones-->


<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Equipos No Devueltos
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Reservación</th>
              <th>Responsable</th>
              <th>Estado</th>
              <th>Opciones</th>
          </tr>
      </thead>
      <tbody >
     <?php  
     // Este es el codigo de Equipos no devueltos
      date_default_timezone_set("America/El_Salvador");
      $hoy=date("Y-m-d");
      $actual=date("H:i");
      $sql = "SELECT * FROM `mobiliario`, `prestamo` Where  tipo='3'  and  estadoprestamo='0' and `mobiliario`.codigomobiliario=`prestamo`.codigomobiliario  ORDER BY fechaprestamo ASC";
      $consultadevoluciones = mysqli_query($conexion, $sql);

      $i = 1;
      while ($datos = mysqli_fetch_array($consultadevoluciones)) {
        echo '<tr id='.'tabla'. utf8_encode($datos['idprestamo']) . '>
                <td><b>' . $i . '</b></td>
                <td>' . utf8_encode($datos['codigomobiliario']) . '</td>
                <td>' . utf8_encode($datos['descripcion']) . " " . utf8_encode($datos['marca']) . '</td>
                <td>' . $dia=date("l d-M",strtotime($datos['fechadevolucion'])).' Hora: '.$datos['horaprestamo'].' hasta '.$datos['horadevolucion'].'</td>
                <td>' . utf8_encode($datos['nombreusuario']) . " " . utf8_encode($datos['apellidousuario']) . '<br>' . utf8_encode($datos['idusuario']) . '</td>
                <td><span class="label label-danger">Pendiente</span></td>
                 <td><button id='. utf8_encode($datos['idprestamo']) .' onclick="devolucionequipo(this.id);" class="btn btn-success hvr-grow">Devolver</button>


                 
                 </td>


            
              </tr>'
        ;

        $i++;
      }
    ?>

  </tbody>
</table>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>


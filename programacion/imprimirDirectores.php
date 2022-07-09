<?php include ("conexion.php"); ?>
<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Directores 
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
              <th>#</th>
              <th>N° Escalafón</th>
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Nombramiento</th>
              <th>Finalización</th>
              <th><th>Opciones<th></th>
            </thead>
      <tbody>
        <?php  
              $sqlID = "SELECT * FROM director ORDER BY fechanombramiento DESC";
              $consultaID = mysqli_query($conexion, $sqlID);
              $i=1;
                while ($data = mysqli_fetch_array($consultaID)) {
                  if ($data['estado'] == 1) {
                    $action = "Activo";
                    $class = "primary";
                  } else {
                    $action = "Inactivo";
                    $class = "danger";
                  }
                  echo '<tr>
                          <td>' . $i . '</td>
                          <td>' . utf8_encode($data['nescalafon']) . '</td>
                          <td>' . utf8_encode($data['nombredirector']) . '</td>
                          <td>' . utf8_encode($data['telefono']) . '</td>
                          <td>' . utf8_encode($data['fechanombramiento']) . '</td>
                          <td>' . utf8_encode($data['fechafinalizacion']) . '</td>
                          <td>
                            <td>
                            <a href="editarDirector.php?id=' . $data['nescalafon'] . '" class="btn btn-success hvr-grow">Editar &nbsp;<span class="fa fa-edit"></span></a></td>
                            <td><a href="programacion/estadoDirector.php?id=' . $data['nescalafon'] . '&estado=' . $data['estado'] . '" class="btn btn-' . $class . ' hvr-grow">' . $action . '</a><td>
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

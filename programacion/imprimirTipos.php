<?php include ("conexion.php"); ?>
<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Tipos disponibles
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
              <th>#</th>
              <th>Código</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Opciones</th>
              <th>Configuración</th>
            </thead>
            <tbody>
              <?php  
                  $sqlIT = "SELECT * FROM tipos";
                  $consultaIT = mysqli_query($conexion, $sqlIT);
                  $i = 1;
                  while ($data = mysqli_fetch_array($consultaIT)) {
                      if ($data['estadotipo'] == 1) {
                           $action = "Disponible";
                           $class = "primary";
                           } else {
                            $action = "No Disponible";
                            $class = "danger";
                           }
                    echo '<tr>
                            <td><b>' . $i . '</b></td>
                            <td>' . utf8_encode($data['codigotipo']) . '</td>
                            <td>' . utf8_encode($data['nombretipo']) . '</td>
                            <td>' . utf8_encode($data['descripciontipo']) . '</td>
                            <td>

                               <a href="editarCategoria.php?id=' . $data['codigotipo'] . '&categorie=tipo" class="btn btn-success hvr-grow">Editar &nbsp;<span class="fa fa-edit"></span></a>
                              <a href="programacion/eliminarTipo.php?id=' . $data['codigotipo'] . '" class="btn btn-danger hvr-grow">Eliminar &nbsp;<span class="fa fa-trash-o"></span></a>
                              

                            </td>
                            <td>
                            <a href="programacion/cambiarestadoprestamo.php?id=' . $data['codigotipo'] . '&estado=' . $data['estadotipo'] . '" class="btn btn-' . $class . ' hvr-grow">' . $action . '</a>
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

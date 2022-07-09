<?php include ("conexion.php"); ?>




<div  class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
          Áreas Registradas
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
              <th >#</th>
              <th >Nombre</th>
              <th >Descripción</th>
              <th ><th>Opciones</th></th>
            </tr>
            </thead>
      <tbody>
      <?php  
          $sqlIA = "SELECT * FROM areas";
          $consultaIA = mysqli_query($conexion, $sqlIA);

          $i = 1;
          while ($data = mysqli_fetch_array($consultaIA)) {
            if ($data['idarea'] == 1) {
              $exception = "disabled";
            } else {
              $exception = "";
            }
             echo '<tr>
                <td><b>' . $i . '</b></td>
                <td>' . utf8_encode($data['nombrearea']) . '</td>
                <td>' . utf8_encode($data['descripcionarea']) . '</td>
                <td>
                  <td>
                   <a href="editarCategoria.php?id=' . $data['idarea'] . '&categorie=area" class="btn btn-success hvr-grow"' . $exception . '>Editar &nbsp;<span class="fa fa-edit"></span></a>
                  </td>
                  <td>
                  <a href="programacion/eliminarArea.php?id=' . $data['idarea'] . '" class="btn btn-danger hvr-grow"' . $exception . '>Eliminar &nbsp;<span class="fa fa-trash-o"></span></a>
                  </td>

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



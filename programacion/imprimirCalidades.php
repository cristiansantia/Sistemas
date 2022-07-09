<?php include ("conexion.php"); ?>

<div class="chit-chat-layer1">
   <div class="col-md-12 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading">
         Calidades Registradas
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                    <th >#</th>
                    <th >Nombre</th>
                    <th >Descripción</th>
                    <th >Opciones</th>
            </thead>
      <tbody>
        <?php  
      $sqlIC = "SELECT * FROM calidades";
      $consultaIC = mysqli_query($conexion, $sqlIC);

      $i = 1;
      while ($data = mysqli_fetch_array($consultaIC)) {
        echo '<tr>
                <td><b>' . $i . '</b></td>
                <td>' . utf8_encode($data['nombrecalidad']) . '</td>
                <td>' . utf8_encode($data['descripcioncalidad']) . '</td>
                <td>

                <a href="editarCategoria.php?id=' . $data['idcalidad'] . '&categorie=calidad" class="btn btn-success hvr-grow">Editar &nbsp;<span class="fa fa-edit"></span></a>
                  <a href="programacion/eliminarCalidad.php?id=' . $data['idcalidad'] . '" class="btn btn-danger hvr-grow">Eliminar &nbsp;<span class="fa fa-trash-o"></span></a>

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

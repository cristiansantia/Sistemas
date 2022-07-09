<?php  
	include ("conexion.php");

	$valorBusqueda = $_POST['valorBusqueda'];
	$por = $_POST['por'];
	$area = $_POST['area'];
	$activo = $_POST['activo'];

	if ($activo == 1) {
		$exception = '';
	} else if($activo == 0) {
		$exception = 'disabled';
	}

	$mensaje = "";
	if (isset($valorBusqueda)) {
		if ($area == "all") {
			$sql = "SELECT * FROM mobiliario WHERE $por LIKE '%$valorBusqueda%' AND activo='$activo'";
		} else {
			$sql = "SELECT * FROM mobiliario WHERE $por LIKE '%$valorBusqueda%' AND idarea='$area' AND activo='$activo'";
		}
		$consulta = mysqli_query($conexion, $sql);
		$filas = mysqli_num_rows($consulta);
		if ($filas == 0) {
			$mensaje = "<br><br><br><h3 class='text-center'><i class='fa fa-thumbs-down' aria-hidden='true'></i>&nbsp;¡No se encontraron coincidencias!</h3>";
		} else {
			echo "<br>Buscando: <span class='badge'> " . $valorBusqueda . " </span><br>N° de resultados:  <span class='badge'>" . $filas . "</span><hr>";
			?>
			<div class="chit-chat-layer1">
			   <div class="col-md-12 chit-chat-layer1-left">
			     <div class="work-progres">
			        <div class="chit-chat-heading">
			          Resultados de búsqueda
			      </div>
			      <div class="table-responsive">
			        <table class="table table-hover">
			            <thead>
			            <th>#</th>
			            <th>codigo</th>
		                <th>Descripción</th>
		                <th>Serie</th>
		                <th>Opciones</th>
			            </thead>
			      	<tbody>
			         <?php
			         	$i = 1;
						while($resultados = mysqli_fetch_array($consulta)) {
							//Output
							$mensaje .= '
							<tbody>
				              <tr id='.'d'. $resultados['codigomobiliario']. '>
				              	<td>' . $i . '</td>
				              	<td>' . $resultados['codigomobiliario'] . '</td>
				                <td>' . utf8_encode($resultados['descripcion']) . '</td>
				                <td>' . utf8_encode($resultados['serie']) . '</td>
				                <td class="">
				                	<a class="btn btn-success hvr-grow" href="editarMobiliario.php?codigo=' . $resultados['codigomobiliario'] . '" ' . $exception . '>Editar &nbsp;<span class="fa fa-pencil-square-o"></a>
				                	<button id="' . $resultados['codigomobiliario'] . '" type="button" class="btn btn-danger hvr-grow descargarMob" ' . $exception . '>Descargo &nbsp;<span class="fa fa-archive"></button>
				                </td>
				              </tr>
			            	</tbody>';
			           	$i++;
						}
					}
				}
			echo $mensaje;

			?>
			  		</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="clearfix"> </div>
			</div>



<?php 
    include("programacion/security.php");
    include("programacion/conexion.php"); 
    $max = date("Y-m-d");
    $codigoMob = $_GET['codigo'];
    $sqlEdit = "SELECT * FROM mobiliario WHERE codigomobiliario='$codigoMob'";
    $consultaEdit = mysqli_query($conexion, $sqlEdit);
    $datos = mysqli_fetch_array($consultaEdit);
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include("./elementos/header.php"); ?>
</head>
<body>  
    <div class="page-container">    
       <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <?php include("./elementos/barraSuperior.php"); ?>
            <ol class="breadcrumb" style="margin-bottom: 0;">
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li><a href="#">Búsquedas</a></li>
                <li><a href="busquedasMobiliario.php">Buscar Mobiliario</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Editar Mobiliario</li>
            </ol>
            <!--heder end here-->
            <!-- script-for sticky-nav -->
            <script>
              $(document).ready(function() {
                var navoffeset=$(".header-main").offset().top;
                $(window).scroll(function(){
                    var scrollpos=$(window).scrollTop(); 
                    if(scrollpos >=navoffeset){
                     $(".header-main").addClass("fixed");
                 }else{
                     $(".header-main").removeClass("fixed");
                 }
             });

            });
        </script>
        <!-- /script-for sticky-nav -->
        <div class="col-md-12">
            <br><br><br><br>
            <form id="formMobEdit" autocomplete="off" method="" action="">
                <center><span id="resMobEdit"></span></center>
                <input type="hidden" value="<?php echo $datos['codigomobiliario']; ?>" name="codigoOLD">
                <div class="form-group col-md-2">
                    <label id="codigoBuscadoE" for="email">Código(*): </label>
                    <input value="<?php echo $datos['codigomobiliario']; ?>" data-mask="88175-<?php echo $datos['codigotipo']; ?>-9999" onkeyup="buscarCodigo();" id="codigoMobiliarioE" type="text" class="form-control" name="codigoE" readonly="readonly">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Descripción(*):</label>
                    <input value="<?php echo utf8_encode($datos['descripcion']); ?>" type="text" class="form-control" name="descripcionE">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Marca(*):</label>
                    <input value="<?php echo utf8_encode($datos['marca']); ?>" type="text" class="form-control" name="marcaE">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Modelo:</label>
                    <input value="<?php echo utf8_encode($datos['modelo']); ?>" type="text" class="form-control" name="modeloE">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">N° de Serie(*):</label>
                    <input value="<?php echo utf8_encode($datos['serie']); ?>" type="text" class="form-control" name="serieE">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Fecha de Adquisión(*):</label>
                    <input value="<?php echo $datos['fechaadquisicion']; ?>" type="date" class="form-control" name="fechaAdquisicionE" max="<?php echo $max; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Calidad(*):</label>
                    <select class="form-control" name="calidadE" required>
                        <?php 
                            $ca = $datos['idcalidad'];
                            $sqlCalidad = "SELECT * FROM calidades WHERE idcalidad='$ca'";
                            $consultaCalidad = mysqli_query($conexion, $sqlCalidad);
                            $dataCalidad = mysqli_fetch_array($consultaCalidad);
                        ?>
                        <option value="<?php echo $dataCalidad['idcalidad'];?>"><?php echo utf8_encode($dataCalidad['nombrecalidad']); ?></option>
                        <?php  
                            $consultaCalidad = mysqli_query($conexion, "SELECT * FROM calidades");
                            while ($dataC = mysqli_fetch_array($consultaCalidad)) {
                                echo '<option title="' . utf8_encode($dataC['descripcioncalidad']) . '" value="' . $dataC['idcalidad'] . '">' . utf8_encode($dataC['nombrecalidad']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Tamaño:</label>
                    <input value="<?php echo $datos['tamano']; ?>" type="text" class="form-control" name="tamanoE">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Color(*):</label>
                    <input value="<?php echo utf8_encode($datos['color']); ?>" type="text" class="form-control" name="colorE" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Precio($):</label>
                    <input value="<?php echo $datos['precio']; ?>" type="text" class="form-control" name="precioE">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Tipo(*):</label>
                    <select class="form-control" name="tipoE" id="tipoEditar" disabled="true">
                        <?php 
                            $ti = $datos['codigotipo'];
                            $sqlTipos = "SELECT * FROM tipos WHERE codigotipo='$ti'";
                            $consultaTipos = mysqli_query($conexion, $sqlTipos);
                            $dataTipos = mysqli_fetch_array($consultaTipos);
                        ?>
                        <option value="<?php echo $dataTipos['codigotipo'];?>"><?php echo utf8_encode($dataTipos['nombretipo']); ?></option>
                        <?php  
                            $consultaTipos = mysqli_query($conexion, "SELECT * FROM tipos");
                            while ($dataT = mysqli_fetch_array($consultaTipos)) {
                                echo '<option title="' . utf8_encode($dataT['descripciontipo']) . '" value="' . $dataT['codigotipo'] . '">' . utf8_encode($dataT['nombretipo']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Área Asignada(*):</label>
                    <select  class="form-control" name="areaAsignadaE" required>
                        <?php 
                            $ar = $datos['idarea'];
                            $sqlAreas = "SELECT * FROM areas WHERE idarea='$ar'";
                            $consultaAreas = mysqli_query($conexion, $sqlAreas);
                            $dataAreas = mysqli_fetch_array($consultaAreas);
                        ?>
                        <option value="<?php echo $dataAreas['idarea'];?>"><?php echo utf8_encode($dataAreas['nombrearea']); ?></option>
                        <?php  
                            $consultaAreas = mysqli_query($conexion, "SELECT * FROM areas");
                            while ($dataA = mysqli_fetch_array($consultaAreas)) {
                                echo '<option title="' . utf8_encode($dataA['descripcionarea']) . '" value="' . $dataA['idarea'] . '">' . utf8_encode($dataA['nombrearea']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Estado(*):</label>
                    <select  class="form-control" name="estadoE" required>
                        <?php  
                            $consultaEstado = mysqli_query($conexion, "SELECT * FROM estado");
                            while ($dataE = mysqli_fetch_array($consultaEstado)) {
                                if ($dataE['nombreestado'] == "Prestado") {
                                    $exc = "disabled";
                                } else {
                                    $exc = "";
                                }

                                echo '<option title="' . utf8_encode($dataE['descripcionestado']) . '" value="' . $dataE['idestado'] . '"' . $exc . '>' . utf8_encode($dataE['nombreestado']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">N° de Recibo:</label>
                    <input value="<?php echo $datos['numerorecibo']; ?>" type="text" class="form-control" name="nReciboE">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Origen(*):</label>
                    <select type="text" class="form-control" name="origenE">
                        <option value="<?php echo $datos['origen']; ?>"><?php echo $datos['origen']; ?></option>
                        <option value="Comprado">Comprado</option>
                        <option value="Donado">Donado</option>
                    </select>
                </div>
                <center><button type="button" id="GuardarEditar" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
        </div>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>
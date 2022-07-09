<?php 
    include("programacion/security.php"); 
    $max = date("Y-m-d");
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
                <li><a href="home.php">SICONIP</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Nuevo Mobiliario</li>
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
            <br>
            <br><br><br>
            <form id="formMob" autocomplete="off" method="" action="">
                <center><span id="resMobGuardado"></span></center>

                <div class="form-group col-md-3">
                    <label for="pwd">Tipo(*):</label>
                    <select class="form-control" id="selectiontipo" name="tipo" required>
                    <option value='0'>Elige una opción</option>"
                        <?php  
                            $consultaTipos = mysqli_query($conexion, "SELECT * FROM tipos");
                            while ($dataT = mysqli_fetch_array($consultaTipos)) {
                                echo '<option  value="' . $dataT['codigotipo'] . '">' . utf8_encode($dataT['nombretipo']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>

                <div id="codigost" class="form-group col-md-2">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Descripción(*):</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Marca(*):</label>
                    <input type="text" class="form-control" name="marca">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Modelo:</label>
                    <input type="text" class="form-control" name="modelo">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">N° de Serie:</label>
                    <input type="text" class="form-control" name="serie">
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Fecha de Adquisión(*):</label>
                    <input type="date" class="form-control" name="fechaAdquisicion" max="<?php echo $max; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Calidad(*):</label>
                    <select class="form-control" name="calidad" required>
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
                    <input type="text" class="form-control" name="tamano">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Color(*):</label>
                    <input type="text" class="form-control" name="color" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Precio($):</label>
                    <input type="text" class="form-control" name="precio">
                </div>

                <div class="form-group col-md-3">
                    <label for="pwd">Área Asignada(*):</label>
                    <select  class="form-control" name="areaAsignada" required>
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
                    <select  class="form-control" name="estado" required>
                        <?php  
                            $consultaEstado = mysqli_query($conexion, "SELECT * FROM estado");

                            while ($dataE = mysqli_fetch_array($consultaEstado)) {
                                if ($dataE['nombreestado'] == "Prestado") {
                                    $exc = "disabled";
                                } else {
                                    $exc = "";
                                }
                                echo '<option title="' . utf8_encode($dataE['descripcionestado']) . '" value="' . $dataE['idestado'] . '" ' . $exc . '>' . utf8_encode($dataE['nombreestado']) . '</option>';
                            }
                        ?>   
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">N° de Recibo:</label>
                    <input type="text" class="form-control" name="nRecibo">
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Origen(*):</label>
                    <select type="text" class="form-control" name="origen">
                        <option value="">Elige una opción</option>
                        <option value="Comprado">Comprado</option>
                        <option value="Donado">Donado</option>
                    </select>
                </div>
                <center><button type="button" id="GuardarMob" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
        </div>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>       
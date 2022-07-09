<?php include("programacion/security.php"); ?>
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
                <li class=""><a href="#">Reportes</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Reporte de Mobiliario</li>
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
        <br>
        <br>
        <br>
        <div class="col-md-8 col-md-offset-1">
            <div class="col-md-12 text-center">
                <a href="reporteria/reporte_mobiliario_general.php" target="_blank" class="btn btn-warning hvr-grow">Generar PDF de todo el Mobiliario&nbsp;<span class="fa fa-file-pdf-o"></span></a>
            </div>
        </div>
        <div class="col-md-6 ">
            <br><br><br><br>
            <h2>Filtro Avanzado</h2>
            <hr>
            <br>
            <form autocomplete="off" method="POST" action="reporteria/reporte_mobiliario_filtrado.php" target="_blank">
                <div class="form-group col-md-6">
                    <label for="pwd">Fecha Inicial:</label>
                    <input type="date" class="form-control" name="rangoInicial" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Fecha Final:</label>
                    <input type="date" class="form-control" name="rangoFinal" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Área:</label>
                    <select type="text" id="" class="form-control" name="areaR" required>
                        <?php  
                            $consultaAreas = mysqli_query($conexion, "SELECT * FROM areas");
                            while ($dataAreas = mysqli_fetch_array($consultaAreas)) {
                                echo "<option value='" . $dataAreas['idarea'] . "'>" . utf8_encode($dataAreas['nombrearea']) . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Calidad:</label>
                    <select type="text" id="" class="form-control" name="calidadR" required>
                        <?php  
                            $consultaCalidad = mysqli_query($conexion, "SELECT * FROM calidades");
                            while ($dataCalidad = mysqli_fetch_array($consultaCalidad)) {
                                echo "<option value='" . $dataCalidad['idcalidad'] . "'>" . utf8_encode($dataCalidad['nombrecalidad']) . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Tipos:</label>
                    <select type="text" id="" class="form-control" name="tipoR" required>
                        <?php  
                            $consultaTipos = mysqli_query($conexion, "SELECT * FROM tipos");
                            while ($dataTipos = mysqli_fetch_array($consultaTipos)) {
                                echo "<option value='" . $dataTipos['codigotipo'] . "'>" . utf8_encode($dataTipos['nombretipo']) . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-warning hvr-grow">Generar PDF &nbsp;<span class="fa fa-file-pdf-o"></span></button>
                </div>
            </form>
            <hr>
        </div>
        <div class="col-md-6">
            <br><br><br><br>
            <h2>Filtrar por Fechas</h2>
            <hr>
            <br>
            <br>
            <br>
            <br>
            <form autocomplete="off" method="POST" action="reporteria/reporte_mobiliario_filtrado_fechas.php" target="_blank">
                <div class="form-group col-md-6">
                    <label for="pwd">Fecha Inicial:</label>
                    <input type="date" class="form-control" name="fecha1" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Fecha Final:</label>
                    <input type="date" class="form-control" name="fecha2" required>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-warning hvr-grow">Generar PDF &nbsp;<span class="fa fa-file-pdf-o"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>
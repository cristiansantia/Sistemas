<?php 
    include("programacion/security.php"); 
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
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Búscar Mobiliario</li>
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
        <div class="col-md-10 col-md-offset-1">
            <br><br><br>
            <form id="" autocomplete="off" method="" action="">
                <center><span id="resDescargarMob"></span></center>
                <div class="form-group col-md-2">
                    <label for="pwd">Buscar por:</label>
                    <select type="text" id="buscarPor" class="form-control" name="">
                        <option value="codigomobiliario">Código</option>
                        <option value="descripcion">Descripción</option>
                        <option value="serie">N° de Serie</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Área:</label>
                    <select type="text" id="areaBuscar" class="form-control" name="">
                        <?php  
                            $consultaAreas = mysqli_query($conexion, "SELECT * FROM areas");
                            while ($dataAreas = mysqli_fetch_array($consultaAreas)) {
                                echo "<option value='" . $dataAreas['idarea'] . "'>" . utf8_encode($dataAreas['nombrearea']) . "</option>";
                            }
                        ?>
                        <option value="all">Todas</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="pwd">Mobiliario:</label>
                    <select type="text" id="activoBuscar" class="form-control" name="">
                        <option value="1">Activo</option>
                        <option value="0">Descargo</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="pwd">Búsqueda:</label>
                    <input type="text" id="txtBusqueda" onkeyup="buscarMobiliario();" class="form-control" name="" placeholder="Buscar">
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div id="resultadoBusqueda"></div>
        </div>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>       
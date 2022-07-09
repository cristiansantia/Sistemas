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
                <li><a href="home.php">SICONIP</a></li>
                <li class=""><a href="#">Categorías</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Tipos</li>
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
        <div class="col-md-8 col-md-offset-2">
            <br><br>
            <form id="formTipos" action="" method="">
                        <span id="resTipoGuardado"></span>
                       <!-- <?php  
                            if ($_GET['status'] == 1) {
                                echo '<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Hecho!</strong> El Tipo fue eliminado.</div>';
                            } elseif ($_GET['status'] == 2) {
                                echo '<div style="position: fixed; z-index: 1000; margin-left: 100px; width: 500px;" id="divalerta" class="alert alert-danger alert-dismissable"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Error!</strong> Él Tipo no puede ser eliminado porque algunos registros del Mobiliario lo están utilizando.</div>';
                            }
                        ?>-->
                        <div class="form-group col-md-6">
                            
                            <label id="disponibilidadcodigo" for="email">Código Tipo(*): </label>
                            <input data-mask="9999" onkeyup="buscarTipos();" id="tipoBusqueda" type="text" class="form-control" name="codigotipo">

                        </div>

                        <div class="form-group col-md-6">
                            <label for="pwd">Nombre:</label>
                            <input type="text" class="form-control" id="" name="nombreTipo" value="">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="pwd">Descripción:</label>
                            <textarea class="form-control" name="descripcionTipo" id="" rows="2"></textarea>
                        </div>
                
                <button type="button" id="GuardarTipo" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button>
            </form>
        </div>
        <br>
        <br>
        <br>
        <div id="tablaTipos" class="col-md-12">
            <?php include("programacion/imprimirTipos.php"); ?>
        </div>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>
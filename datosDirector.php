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
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li class=""><a href="#">Configuración</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Datos del Director</li>
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
        <div class="col-md-10 col-md-offset-1">
            <br><br>
            <form id="formDatosDirector" action="" method="post" autocomplete="off">
                <center><span id="resDirectorGuardado"></span></center>
                        <div class="form-group col-md-4">
                            <label for="email">DUI(*):</label>
                            <input data-mask="99999999-9" type="text-center" class="form-control" id="" name="escalafon">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="pwd">Nombre(*):</label>
                            <input type="text" class="form-control" id="" name="nombre" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">Teléfono:</label>
                            <input type="text" class="form-control" data-mask="+503 9999-9999" id="" name="telefono">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">E-mail:</label>
                            <input type="text" class="form-control" id="" name="email" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">Fecha de Nombramiento(*):</label>
                            <input type="date" class="form-control" id="" name="fechaI" max="<?php echo $max; ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">Finalizacion de Cargo:</label>
                            <input type="date" class="form-control" id="" name="fechaF" max="<?php echo $max; ?>">
                        </div>
                        <p><b>Nota:</b> El N° de Escalafón no se podrá editar una vez que se haya guardado el nuevo director.</p><br>
                <center><button type="button" id="GuardarDatosDirector" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
        </div>
        <div id="tablaDirectores" class="col-md-12">
            <?php include("programacion/imprimirDirectores.php"); ?>
        </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>
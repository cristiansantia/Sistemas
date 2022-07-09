<?php 
    include("programacion/security.php"); 
    include("programacion/conexion.php");
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
                <li class=""><a href="#">Configuración</a></li>
                <li><a href="datosDirector.php">Datos del Director</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Editar Director</li>
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
            <form id="formEditarDirector" action="" method="post" autocomplete="off">
                <?php  
                    $idDir = $_GET['id'];
                    $sqlRecuperar = "SELECT * FROM director WHERE nescalafon='$idDir'";
                    $consultaRecuperar = mysqli_query($conexion, $sqlRecuperar);
                    $data = mysqli_fetch_array($consultaRecuperar);
                ?>
                <center><span id="resDirectorEditado"></span></center>
                        <div class="form-group col-md-6">
                            <input value="<?php echo $data['nescalafon']; ?>" type="hidden" class="form-control" id="" name="escalafonE">
                            <label for="pwd">Nombre(*):</label>
                            <input value="<?php echo utf8_encode($data['nombredirector']); ?>" type="text" class="form-control" id="" name="nombreE" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">Teléfono:</label>
                            <input value="<?php echo $data['telefono']; ?>" type="text" class="form-control" id="" name="telefonoE">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pwd">E-mail:</label>
                            <input value="<?php echo utf8_encode($data['email']); ?>" type="text" class="form-control" id="" name="emailE" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Fecha de Nombramiento(*):</label>
                            <input value="<?php echo $data['fechanombramiento']; ?>" max="<?php echo $max; ?>" type="date" class="form-control" id="" name="fechaIE">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">Finalizacion de Cargo:</label>
                            <input value="<?php echo $data['fechafinalizacion']; ?>" max="<?php echo $max; ?>" type="date" class="form-control" id="" name="fechaFE">
                        </div>
                <center><button type="button" id="ActualizarDatosDirector" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
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
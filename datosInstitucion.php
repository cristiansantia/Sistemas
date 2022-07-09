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
                <li class=""><a href="#">Configuración</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Datos de la Institución</li>
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
        <div class="col-md-5">
            <br><br>
            <?php  
            $consulta=mysqli_query($conexion, "SELECT logoinstitucion FROM institucion");
            $resultado=mysqli_fetch_array($consulta);
            ?>
            <div style="border: none;" class="thumbnail">
            <center><img height="45%" width="45%" class="" src="data:image/jpg;base64,<?php echo base64_encode($resultado['logoinstitucion']); ?>" alt="" ></center>
            </div>
            <form action="programacion/cargarLogo.php" method="POST" enctype="multipart/form-data">
                <div class="form-group inputSizeC">
                    <label  >Logo(*):</label>
                    <input type="file" class="btn btn-default btn-file" name="logo" accept="image/*" required="">
                </div>
                <center><button type="submit"   class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center> 
            </form> 
        </div>

        <div class="col-md-6">
            <br><br><br>
            <?php  
                $sql = "SELECT * FROM institucion";
                $consulta = mysqli_query($conexion, $sql);
                $data = mysqli_fetch_array($consulta);
            ?>
            <form id="formDatosInstitucion" action="" method="post">
                <center><span id="resDatosGuardados"></span></center>
                <div class="form-group inputSizeC">
                    <label for="email">Código(*):</label>
                    <input data-mask="99999" type="text-center" class="form-control" id="" name="codigo" value="<?php echo utf8_encode($data['codigoinst']) ?>">
                </div>
                <div class="form-group inputSizeC">
                    <label for="pwd">Nombre(*):</label>
                    <input type="text" class="form-control" id="" name="nombre" value="<?php echo utf8_encode($data['nombreinst']) ?>">
                </div>
                <div class="form-group inputSizeC">
                    <label for="pwd">Dirección(*):</label>
                    <textarea type="text" class="form-control" id="" name="direccion" ><?php echo utf8_encode($data['direccioninst']) ?></textarea>
                </div>
                <center><button type="button" id="GuardarDatosInstitucion"  class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
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
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
            <?php include("./elementos/barraSuperior.php") ?>
            <ol class="breadcrumb" style="margin-bottom: 0;">
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Configuración de Usuario</li>
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
            <br><br><br>
            <?php  
                $sql = "SELECT * FROM usuario";
                $consulta = mysqli_query($conexion, $sql);
                $data = mysqli_fetch_array($consulta);
            ?>
            <form id="formDatosUsuario" action="" method="post">
                <center><span id="resUsuarioGuardado"></span></center>
                <div class="form-group col-md-4">
                    <label for="email">Nombre(*):</label>
                    <input type="hidden" value="<?php echo utf8_encode($data['idusuario']) ?>" name="idU">
                    <input type="text-center" class="form-control" id="" name="nombreU" value="<?php echo utf8_encode($data['nombre']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Apellido(*):</label>
                    <input type="text" class="form-control" id="" name="apellidoU" value="<?php echo utf8_encode($data['apellido']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="pwd">Nombre de Usuario(*):</label>
                    <input type="text" class="form-control" id="" name="nombreUsuarioU" value="<?php echo utf8_encode($data['nombreusuario']) ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Contraseña Actual(*):</label>
                    <input type="password" class="form-control removePass" id="passwordActual" name="contrasenaAc">
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Nueva Contraseña(*):</label>
                    <div class="input-group">
                      <input type="password" id="contrasenaI" class="form-control removePass" name="contrasenaNu">
                      <span class="input-group-btn">
                            <button style="border-radius: 0.8em !important;" id="mostrar" title="Mostrar contraseña" class="btn btn-default" type="button"><i style="" id="mostrarIcon" class="fa fa-eye"></i></button>
                      </span>
                    </div>
                </div> 
                <br>
                <center><button type="button" id="GuardarDatosUsuario" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
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
<?php 
    include("programacion/security.php"); 
    include("programacion/conexion.php");

    //Capturar de informacion de Id y Tablas que serán actualizadas
    $idRegistro = $_GET['id'];
    $categoria = $_GET['categorie'];

    //Formar nombre de tabla a ejecutar
    if ($categoria == "area" || $categoria == "tipo") {
        $nombreTabla = $categoria . "s";
    } else if ($categoria == "calidad") {
        $nombreTabla = $categoria . "es";
    }

    //Establecer link de categoria
    if ($categoria == "area") {
        $link = "areas.php";
    } else if ($categoria == "tipo") {
        $link = "tipos.php";
    } else if ($categoria == "calidad") {
        $link = "calidades.php";
    }

    $campoTemporal = "id" . $categoria;
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
                <li class=""><a href="#">Categorías</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Editar Categoría: <div class="badge"><?php echo strtoupper($nombreTabla); ?></div></li>
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
            <?php
                if ($nombreTabla=="tipos") {
                    $sqlRec = "SELECT * FROM $nombreTabla WHERE codigotipo='$idRegistro'";
                }else{
                $sqlRec = "SELECT * FROM $nombreTabla WHERE $campoTemporal='$idRegistro'";
                }
                 
                $consultaRec = mysqli_query($conexion, $sqlRec);
                $data = mysqli_fetch_array($consultaRec);
            ?>
            <form id="formEditarCategoria" action="" method="post">
                <center><span id="resEditarCategoria"></span></center>
                <div class="form-group col-md-12">
                    <input value="<?php echo $nombreTabla; ?>" type="hidden" name="nombreTabla">
                    <input value="<?php echo $idRegistro; ?>" type="hidden" name="idRegistro">
                    <?php if ($nombreTabla=="tipos") {
                        echo "<label id='disponibilidadcodigo' for='email'>Código Tipo(*): </label>
                            <input value='$idRegistro' data-mask='$idRegistro' onkeyup='buscarTipos();'' id='tipoBusqueda' type='text' class='form-control' name='codigotipo'>";
                    } ?>
                    <label for="pwd">Nombre(*):</label>
                    <input value="<?php echo utf8_encode($data['nombre' . $categoria]); ?>" type="text" class="form-control" id="" name="nombre" value="">
                </div>
                <div class="form-group col-md-12">
                    <label for="pwd">Descripción(*):</label>
                    <textarea class="form-control" name="descripcion" id="" rows="2"><?php echo utf8_encode($data['descripcion' . $categoria]); ?></textarea>
                </div>
                <center><button type="button" id="ActualizarCategoria" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button>&nbsp;<a id="revisar" href="<?php echo $link; ?>" class="btn btn-warning" href="">Revisar</a></center>
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
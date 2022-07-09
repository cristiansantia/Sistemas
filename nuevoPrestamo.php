<?php 
    include("programacion/security.php"); 
    date_default_timezone_set("America/El_Salvador");
    $maxF = date("Y-m-d");
    $hoy=date("Y-m-d"); 
    $minF= date("Y-m-d",strtotime($hoy."7 days"));
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include("./elementos/header.php"); ?>
</head>
<body  onLoad="setInterval('actualizarhora()',59000);">  
    <div class="page-container">    
       <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <?php include("./elementos/barraSuperior.php"); ?>
            <ol class="breadcrumb" style="margin-bottom: 0;">
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Préstamos</li>
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
        <div class="col-md-10 col-md-offset-1">
            <br>
            <br>
            <br>
            <form id="solicitud" autocomplete="off" method="" action="">
                <center><span id="respuestas"></span></center>
                <div class="form-group col-md-6">
                    <label id="nombre" for="nombre">Nombres(*):</label>
                    <input  id="nombre" type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group col-md-6">
                    <label id="apellido" for="apellido">Apellidos(*):</label>
                    <input   id="apellido" type="text" class="form-control" name="apellido" required>
                </div>
               
                <div class="form-group col-md-6">
                    <label id="documento" for="documento">Documento(*):</label>
                    <select  id ="typedocumento" class="form-control" name="typedocumento" required>
                    <option value="1">NIE</option>
                    <option value="2">DUI</option>
                    
                    </select>
                </div>

                <div id="documentoselect" class="form-group col-md-6">
                    
                </div>
                
                <div class="form-group col-md-6">
                    <label for="Tipo">Tipo(*):</label>
                    <select   id ="tipo" class="form-control" name="tipo" required>
                    <option value='0'>Elige una opción</option>"
                        <?php  
                            $consultaTipos = mysqli_query($conexion, "SELECT * FROM tipos WHERE estadotipo=1");
                            while ($dataT = mysqli_fetch_array($consultaTipos)) {
                                echo '<option  value="' . $dataT['codigotipo'] . '">' . utf8_encode($dataT['nombretipo']) . '</option>';
                            }
                        ?>   
                    </select>
              </div>
              <div id ="equipos" class="form-group col-md-6">

              </div>



                <div id="recargarfecha" class="form-group col-md-3">
                    <label for="pwd">Fecha de Préstamo(*):</label>
                    <input id="fechap" type="date" class="form-control" name="fechap" max="<?php echo $minF; ?>" min="<?php echo $maxF; ?>" value="<?php echo date("Y-m-d");?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="pwd">Hora de Préstamo(*):</label>
                    <input data-mask="99:99" id="horap" type="text" class="form-control" max="17:00" min="07:00" value=""  onkeyup="cambiarhora();" name="horap" required>
                </div>

                <div id="cambiarfecha" class="form-group col-md-3">
                   
                </div>

                <div id="horapordefecto" class="form-group col-md-3">
                  
                </div>

                <center><button type="button" id="prestar" class="btn btn-primary hvr-grow">Guardar &nbsp;<span class="fa fa-save"></span></button></center>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    
</script>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>

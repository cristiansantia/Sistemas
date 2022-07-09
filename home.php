<?php include("programacion/security.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include("./elementos/header.php"); ?>
</head>
<body onLoad="setInterval('updateprestamo()',3000);"> 

    <div class="page-container">  
     <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <?php include("elementos/barraSuperior.php"); ?>
            
            <ol class="breadcrumb" style="margin-bottom: 0;">
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Inicio</li>
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
        <!--inner block start here-->
     <!--   <?php 
              if ($_GET['alert'] == 1) {
        ?>
                <div id="alertHome" style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable text-center"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>Bienvenido al sistema</strong></div>
        <?php
              }
        ?>
        <?php 
              if ($_GET['alert'] == 2) {
        ?>
                <div id="alertHome" style="position: fixed; z-index: 1000; margin-left: 300px; width: 500px;" id="divalerta" class="alert alert-success alert-dismissable text-center"><button type="button" class="close"data-dismiss="alert">&times;</button><strong>¡Cuidado!</strong> No se ha cerrado la ultima sesión iniciada.</div>
        <?php
              }
        ?>
        <div class="inner-block">-->
            <!--market updates updates-->
            <div class="market-updates">
             <div class="col-md-4 market-update-gd">
                <div class="market-update-block clr-block-1">
                   <div class="col-md-8 market-update-left">
                      <?php 
                        $sql = "SELECT COUNT(*) AS total FROM mobiliario WHERE activo=1";
                        $consulta = mysqli_query($conexion, $sql);
                        $rows = mysqli_fetch_array($consulta);
                      ?>
                      <h3><?php echo $rows['total']; ?></h3>
                      <h4>Mobiliario <br> Activo</h4>
                      <a class="access" href="nuevoRegistro.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar</a>&nbsp;&nbsp;
                      <a class="access" href="busquedasMobiliario.php"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buscar</a>
                  </div>
                  <div class="col-md-4 market-update-right">
                      <i class="fa fa-book" style="color: white; font-size: 70px;"> </i>
                  </div>
                  <div class="clearfix"> </div>
              </div>
          </div>
          <div class="col-md-4 market-update-gd">
            <div class="market-update-block clr-block-2">
               <div class="col-md-8 market-update-left">
                   <?php 
                      $sql = "SELECT COUNT(*) AS total FROM mobiliario WHERE activo=0";
                      $consulta = mysqli_query($conexion, $sql);
                      $rows = mysqli_fetch_array($consulta);
                    ?>
                   <h3><?php echo $rows['total'];  ?></h3>
                   <h4>Mobiliario en Descargo</h4>
                    <a class="access" href="busquedasMobiliario.php"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Buscar</a>
               </div>
               <div class="col-md-4 market-update-right">
                  <i class="fas fa-dolly-flatbed" style="color: white; font-size: 70px;"> </i>
              </div>
              <div class="clearfix"> </div>
          </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
           <div class="col-md-8 market-update-left">
              <?php 
                $sql = "SELECT COUNT(*) AS total FROM prestamo";
                $consulta = mysqli_query($conexion, $sql);
                $rows = mysqli_fetch_array($consulta);
              ?>
              <h3><?php echo $rows['total']; ?></h3>
              <h4>Préstamos ó<br> Reservaciones</h4>
              <a class="access" href="nuevoPrestamo.php"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo</a><br>
          </div>
          <div class="col-md-4 market-update-right">
              <i class="fa fa-laptop" style="color: white; font-size: 70px;"> </i>
          </div>
          <div class="clearfix"> </div>
      </div>
  </div>
  <div class="clearfix"> </div>
</div>
<!--market updates end here-->
<!--mainpage chit-chating-->

<input  id="enviarhora" type="hidden" class="form-control" max="17:00" min="07:00" value="" name="enviarhora" required>
<div id="aquisecargandatosprestamo">
</div>
<!--MENU-->
<?php include("./elementos/footer.php"); ?>
<!--MENU-->
</div>
</div>
<!--MENU-->
<?php include("./elementos/menu.php"); ?>
<!--MENU-->
</body>
</html>    
<?php 
    include("programacion/security.php"); 
    include("programacion/conexion.php"); 

    $total = "SELECT * FROM mobiliario WHERE activo = 1";
    $consultarTotal = mysqli_query($conexion, $total);
    $rows = mysqli_num_rows($consultarTotal);
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
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Estadísticas</li>
                
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
        <h3 class="text-center">Total de Mobiliario Activo: <?php echo $rows; ?></h3>
        <hr>
        <div class="col-md-10 col-md-offset-1">
          <h4>Mobiliario por Áreas:</h4><br>
          <canvas id="graficaAreas" width="300" height="90"></canvas>
          <hr>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <br><h4>Mobiliario por Tipos:</h4><br>
          <canvas id="graficaTipos" width="300" height="90"></canvas>
          <hr>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <br><h4>Mobiliario por Calidad:</h4><br>
          <canvas id="graficaCalidad" width="300" height="90"></canvas>
          <hr>
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
<script>
    //Gráfica Áreas
    //$(document).ready(function() {
      var popCanvas = $("#graficaAreas");

      Chart.defaults.global.legend.display = false;

      var barChart = new Chart(popCanvas, {
        type: 'bar',
        data: {
          labels: [
            <?php  
                $sqlG = "SELECT a.nombrearea, COUNT(m.codigomobiliario) AS mobiliario
                        FROM areas a
                        LEFT JOIN mobiliario m
                        ON a.idarea = m.idarea
                        WHERE m.activo = 1
                        GROUP BY a.nombrearea
                        ";
                $consultaG = mysqli_query($conexion, $sqlG);
                $arreglo = array();
                while($data = mysqli_fetch_array($consultaG)){
                  $arreglo[] = $data["mobiliario"];
            ?>
                '<?php echo utf8_encode($data["nombrearea"]); ?>',
            <?php
                }
            ?>
          ],
          datasets: [{
            label: "MOBILIARIO POR ÁREA",
            data:
            [
              <?php
              $i = 0; 
              while ($i < count($arreglo) ) {
                echo $arreglo[$i] . ",";
                $i++;
              }
              ?>

            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)',
              'rgba(255, 159, 64, 0.6)',
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)'
            ]
          }]
        }
      });
    //});

    //Gráfica Tipos
    //$(document).ready(function() {
      var popCanvas2 = $("#graficaTipos");

      Chart.defaults.global.legend.display = true;

      var barChart2 = new Chart(popCanvas2, {
        type: 'line',
        data: {
          labels: [
            <?php  
                $sqlG = "SELECT t.nombretipo, COUNT(m.codigomobiliario) AS mobiliario
                        FROM tipos t
                        LEFT JOIN mobiliario m
                        ON t.codigotipo = m.codigotipo
                        WHERE m.activo = 1
                        GROUP BY t.nombretipo
                        ";
                $consultaG = mysqli_query($conexion, $sqlG);
                $arreglo = array();
                while($data = mysqli_fetch_array($consultaG)){
                  $arreglo[] = $data["mobiliario"];
            ?>
                '<?php echo utf8_encode($data["nombretipo"]); ?>',
            <?php
                }
            ?>
          ],
          datasets: [{
            label: "MOBILIARIO POR TIPOS",
            data:
            [
              <?php
              $i = 0; 
              while ($i < count($arreglo) ) {
                echo $arreglo[$i] . ",";
                $i++;
              }
              ?>

            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)',
              'rgba(255, 159, 64, 0.6)',
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)'
            ]
          }]
        }
      });
    //});

     //Gráfica Calidades
    //$(document).ready(function() {
      var popCanvas3 = $("#graficaCalidad");

      var barChart3 = new Chart(popCanvas3, {
        type: 'pie',
        data: {
          labels: [
            <?php  
                $sqlG = "SELECT c.nombrecalidad, COUNT(m.codigomobiliario) AS mobiliario
                        FROM calidades c
                        LEFT JOIN mobiliario m
                        ON c.idcalidad = m.idcalidad
                        WHERE m.activo = 1
                        GROUP BY c.nombrecalidad
                        ";
                $consultaG = mysqli_query($conexion, $sqlG);
                $arreglo = array();
                while($data = mysqli_fetch_array($consultaG)){
                  $arreglo[] = $data["mobiliario"];
            ?>
                '<?php echo utf8_encode($data["nombrecalidad"]); ?>',
            <?php
                }
            ?>
          ],
          datasets: [{
            label: "MOBILIARIO POR TIPOS",
            data:
            [
              <?php
              $i = 0; 
              while ($i < count($arreglo) ) {
                echo $arreglo[$i] . ",";
                $i++;
              }
              ?>

            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)',
              'rgba(255, 159, 64, 0.6)',
              'rgba(255, 99, 132, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)',
              'rgba(75, 192, 192, 0.6)',
              'rgba(153, 102, 255, 0.6)'
            ]
          }]
        }
      });
    //});
</script>
</html>
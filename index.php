<?php
    session_start();
    if (isset($_SESSION['logged'])) {
        if ($_SESSION['logged'] == true) {
            header("location: ./home.php?alert=2");
        } else {
           
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php include("./elementos/header.php"); ?>
</head>
<body>  
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br>
                <br>
                <br>
        <?php 
        include("programacion/conexion.php");
        $consulta=mysqli_query($conexion, "SELECT logoinstitucion FROM institucion");
        $resultado=mysqli_fetch_array($consulta);
        ?>
        <div style="border: none;" class="thumbnail">
        <img height="50%" width="50%" class="" src="data:images/jpg;base64,<?php echo base64_encode($resultado['logoinstitucion']); ?>" alt="" >
        </div>
                <br>
                <form autocomplete="off" method="post" action="programacion/validation.php">
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="text" class="form-control" placeholder="Usuario:" name="user" id="email">
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input type="password" class="form-control" placeholder="Contraseña:" name="password" id="email">
                    </div>
                    <button class="btn btn-primary hvr-grow">&nbsp;<span class="fas fa-sign-in-alt"></span> Entrar</button>
                    <br>
                </form>
             <!--   <?php  
                    
                    if ($_GET['alert'] == 1) {
                        echo '<div style="z-index: 1000; position: fixed; margin-left: -60px; width: 500px;" id="alertas" class="alert alert-danger alert-dismissable">
                          <strong>¡Cuidado!</strong> El Usuario o la Contraseña son incorrectos.
                        </div>';
                    } elseif ($_GET['alert'] == 2) {
                        echo '<div style="z-index: 1000; position: fixed; margin-left: -60px; width: 500px;" id="alertas" class="alert alert-warning alert-dismissable">
                          <strong>¡Cuidado!</strong> Debes iniciar sesión.
                        </div>';
                    } elseif ($_GET['alert'] == 3) {
                        echo '<div style="z-index: 1000; position: fixed; margin-left: -60px; width: 500px;" id="alertas" class="alert alert-success alert-dismissable">
                          <strong>¡Hecho!</strong> Se ha cerrado la sesión.
                        </div>';
                    }  
                ?>-->
            </div>
        </div>
    </div>
    <br>
    <br>
    </div>
</div>
<!--FOOTER-->
<?php include("./elementos/footer.php"); ?>
<!--FOOTER-->
</body>
</html>       
<!--slider menu-->
        <div class="sidebar-menu">
    		  	<div class="logo"> 
                    <a title="Ocultar/Mostrar" href="#" style="margin-top: -5px !important;" class="sidebar-icon"><span class="fa fa-bars" ></span></a> 
                    
                </div>		  
    		    <div class="menu">
    		      <ul id="menu" >
                    <hr style="margin-top: -2px;">
    		        <li id="menu-home"><a href="home.php"><i class="fa fa-home"></i><span>&nbsp;&nbsp;INICIO</span></a></li>
    		        <li><a href="busquedasMobiliario.php"><i class="fa fa-search"></i><span>&nbsp;&nbsp;BÚSQUEDAS</span></span></a>
                    </li>
    		        <li id="menu-comunicacao" ><a href="nuevoRegistro.php"><i class="fa fa-book nav_icon"></i><span>&nbsp;&nbsp;NUEVO MOBILIARIO</span></a></li>
                    <li><a href="#"><i class="fa fa-list-ol"></i><span>&nbsp;&nbsp;CATEGORÍAS</span></a>
                        <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="areas.php">ÁREAS</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="calidades.php">CALIDADES</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="tipos.php">TIPOS</a></li>
                        </ul>
                    </li>
                     <li><a href="nuevoPrestamo.php"><i class="fa fa-laptop nav_icon"></i><span>&nbsp;&nbsp;PRÉSTAMOS</span></a>
                    </li>
                    
                    <li id="menu-comunicacao" ><a href="estadisticas.php"><i class="fa fa-pie-chart"></i><span>&nbsp;&nbsp;ESTADÍSTICAS</span></a></li>
                    <li id="menu-comunicacao" ><a href="reportesMobiliario.php"><i class="fa fa-file-text"></i><span>&nbsp;&nbsp;REPORTES</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i><span>&nbsp;&nbsp;CONFIGURACIÓN</span></a>
                        <ul id="menu-academico-sub" >
                                <li id="menu-academico-avaliacoes" ><a href="datosInstitucion.php">DATOS DE LA INSTITUCIÓN</a></li>
                                <li id="menu-academico-avaliacoes" ><a href="datosDirector.php">DATOS DEL DIRECTOR</a></li>
                        </ul>
                    </li>
                    <hr>
                    <li id="" class="text-center" ><a title="Universidad Luterana Salvadoreña, Centro Universitario Regional de Cabañas" target="_blank" href="https://teposcolula.tecnm.mx/"><i class="fa fa-pie-chrt"></i><span><b>&nbsp;&nbsp;ISC - 2022</b></span></a></li>
    		      </ul>
    		    </div>
    	 </div>
    	<div class="clearfix"> </div>
    </div>
    <script>
        var toggle = true;
                    
        $(".sidebar-icon").click(function() {                
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({"position":"absolute"});
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({"position":"relative"});
                }, 400);
            }               
            
            toggle = !toggle;
        });
    </script>
    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
    <script src="js/bootstrap.js"> </script>
    <!-- mother grid end here-->
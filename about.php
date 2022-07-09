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
            <br>
            <br>
            <br>
            <ol class="breadcrumb" style="margin-bottom: 0; border-radius: 0;" >
                <li><a href="home.php">TECNOLOGICO</a></li>
                <li class="active"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Desarrolladores</li>
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
        <div class="inner-block">
            <!--market updates updates-->
            <div class="market-updates">
             <div class="col-md-6 market-update-gd">
                <div class="market-update-block clr-block-1" style="height: 300px !important;">
                   <div class="col-md-8 market-update-left">
                      <h4 class="text-center"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Carlos Agusto</h4>
					  <h5 class="text-center info">Estudiante 8° Ingeneria en sistemas computacionales</h5>
                      <br><br>
                      <div class="info">
                      	<center>CONTACTO:</center>
                      	<b><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;E-mail:</b> carlosma@gmail.com
                      </div>
                  </div>
                  <div class="col-md-4 market-update-right">
                      <img class="development-img img-rounded" src="images/dev1.jpg" alt="desarrollador">
                  </div>
                  <div class="clearfix"> </div>
              </div>
          </div>
          <div class="col-md-6 market-update-gd">
            <div class="market-update-block clr-block-1" style="height: 300px !important;">
               	<div class="col-md-8 market-update-left">
                   	<h4 class="text-center"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Lucia</h4>
					<h5 class="text-center info">Estudiante 8° Ingeneria En Sistemas Computacionales</h5>
                    <br><br>
                    <div class="info">
                    	<center>CONTACTO:</center>
                      	<b><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;E-mail:</b> nohe.aczta1906@gmail.com
                    </div>
               	</div>
               	<div class="col-md-4 market-update-right">
                  <img class="development-img img-circl" src="images/dev4.jpg" alt="desarrollador">
              	</div>
              <div class="clearfix"> </div>
          </div>
      </div>
      <div class="col-md-6 market-update-gd" style="margin-top: 40px;">
        <div class="market-update-block clr-block-1" style="height: 300px !important;">
           <div class="col-md-8 market-update-left">
             	<h4 class="text-center"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Cristian</h4>
				<h5 class="text-center info">Estudiante 8° Ingeneria En Sistemas Computacionales</h5>
                <br><br>
                <div class="info">
                    <center>CONTACTO:</center>
                    <b><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;E-mail:</b> cristianluisgarcia19@gmail.com
                </div>
          </div>
          <div class="col-md-4 market-update-right">
              <img class="development-img img-circl" src="images/dev2.jpg" alt="desarrollador">
          </div>
          <div class="clearfix"> </div>
      </div>
  </div>
  <div class="col-md-6 market-update-gd" style="margin-top: 40px;">
        <div class="market-update-block clr-block-1" style="height: 300px !important;">
           <div class="col-md-8 market-update-left">
             	<h4 class="text-center"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Bertin</h4>
				<h5 class="text-center info">Estudiante 8° Ingeneria En Sistemas Compuatcionales</h5>
                <br><br>
                <div class="info">
                    <center>CONTACTO:</center>
                    <b><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;E-mail:</b> developmentcarlosma@gmail.com
                </div>
          </div>
          <div class="col-md-4 market-update-right">
              <img class="development-img img-circl" src="images/dev3.jpg" alt="desarrollador">
          </div>
          <div class="clearfix"> </div>
      </div>
  </div>
  <div class="clearfix"> </div>
</div>
</div>
</div>
</div>
<div class="sidebar-menu">
    		  	<div class="logo"> 
                    <a href="#" style="margin-top: -5px !important;" class="sidebar-icon"><span class="fa fa-bars" ></span></a>      
                </div>		  
    		    <div class="menu">
    		      <ul id="menu" >
                    <hr style="margin-top: -2px;">
    		        <li id="menu-home"><a href="home.php"><i class="fa fa-reply-all"></i><span>&nbsp;&nbsp;Regresar</span></a></li>
    		        <li id="menu-home" title="Universidad Luterana Salvadoreña"><a target="_blank" href="https://teposcolula.tecnm.mx/"><i class="fa fa-university"></i><span>&nbsp;&nbsp;ISC</span></a></li>
    		        <li id="menu-home" title="Creative Commons 3.0"><a target="_blank" href="https://teposcolula.tecnm.mx/"><i class="fa fa-cc"></i><span>&nbsp;&nbsp;Licencia</span></a></li>
                <hr>
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
</body>
</html>    
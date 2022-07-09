<div class="header-main" style="height: 65px;">
   <div class="header-left">
<!--search-box-->
<div class="clearfix"> </div>
</div>
<div class="header-right">
 <div class="profile_details_left pull-left"><!--notifications of menu start -->
    <ul class="nofitications-dropdown">
      <li class="dropdown head-dpdn">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i style="margin-left: 190px !important;" class="fa fa-tachometer pull-right" aria-hidden="true" title="Estado General del Sistema"></i><span class="blue1"></span></a>
        <ul class="dropdown-menu">
          <li>
            <div class="notification_header">
              <h3>Estado General del Sistema</h3>
            </div>
          </li>
          <li><a href="#">
            <div class="task-info">
              <?php  
                $sqlNArticulos = "SELECT COUNT(*) total FROM mobiliario";
                $consultaNArticulos = mysqli_query($conexion, $sqlNArticulos);
                $data = mysqli_fetch_array($consultaNArticulos);

                $logo = mysqli_query($conexion, "SELECT * FROM institucion");
                $logo = mysqli_fetch_array($logo);
              ?>
              <span class="task-desc"><b><i class="fa fa-database" aria-hidden="true"></i>&nbsp;Artículos Guardados:</b></span><span class="percentage"><?php echo $data['total']; ?></span>
              <div class="clearfix"></div>	
            </div>
          </a></li>
          <hr>
          <li><a href="#">
            <div class="task-info">
              <?php  
                $sqlSesion = "SELECT * FROM usuario";
                $consultaSesion = mysqli_query($conexion, $sqlSesion);
                $data = mysqli_fetch_array($consultaSesion);
              ?>
              <span class="task-desc"><b><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;Último Inicio de Sesión:</b></span><span class="percentage"><?php echo $data['ultimo']; ?></span>
              <div class="clearfix"></div>	
            </div>
          </a></li>
          <hr>
        </ul>
      </li>	
</ul>
<div class="clearfix"> </div>
</div>
<!--notification menu end -->
<div class="profile_details">		
    <ul>
       <li class="dropdown profile_details_drop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
             <div class="profile_img">	
                <div class="user-name">
                   <p><i class="fa fa-user" style="color: #6F6F6F;"></i>&nbsp;&nbsp;<?php echo $_SESSION['name']; ?></p>
                   <span>Administrador</span>
               </div>
               <i class="fa fa-angle-down lnr"></i>
               <i class="fa fa-angle-up lnr"></i>
               <div class="clearfix"></div>	
           </div>	
       </a>
       <ul class="dropdown-menu drp-mnu">
         <center><span class="prfil-img"><img src="data:image/jpg;base64,<?php echo base64_encode($logo['logoinstitucion']); ?>"  width="100px"> </span></center>
         <li> <a href="configuracionUsuario.php"><i class="fa fa-cog"></i> Configuración</a> </li> 
         <li> <a href="programacion/destroy.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a> </li>
     </ul>
 </li>
</ul> 
</div>
<div class="clearfix"> </div>				
</div>
<div class="clearfix"> </div>	
</div>
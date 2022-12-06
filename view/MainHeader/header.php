
    <?php
    include_once("../../models/Semestre.php");
      $sem = new Semestre();
  $semestre=$sem->get_nombre_semestre(); ?>
<header class="site-header">
    <div class="container-fluid">
        <a href="../Home/index.php" class="site-logo">
            <img class="hidden-md-down" src="../../public/img/logo-2.png" alt="">
            <img class="hidden-lg-up" src="../../public/img/logo-2-mob.png" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>

        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown ">
                    <div class="dropdown dropdown-notification notif">
                        <a href="../MntNotificacion/" class="header-alarm">
                            <i class="font-icon-alarm"></i>
                        </a>
                    </div>
                    
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../../public/<?php echo $_SESSION["rol_id"] ?>.jpg" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="../MntPerfil/"><span class="font-icon glyphicon glyphicon-user"></span>Cambiar Contraseña</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Logout/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesion</a>
                        </div>
                    </div>
                </div>
                
                <div class="mobile-menu-right-overlay"></div>
              

                <input type="hidden" id="user_idx" value="<?php echo $_SESSION["usu_id"] ?>"><!-- ID del Usuario-->
                <input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"] ?>"><!-- Rol del Usuario-->
                <div class="col-lg-5">
                    <a>
                        <span class="fa fa-user"></span>
                        <span class="lblcontactonomx" style="font-size: 13px;"><?php echo "Usuario: ".$_SESSION["usu_nom"] ?> <?php echo $_SESSION["usu_ape"] ?></span>
            
                    </a>
                </div>

                <div class="col-lg-sm">
                    <a>
                        <span class="fa fa-calendar"></span>
                        <span class="lblsemestre" style="font-size: 12px;"><?php echo "Semestre: ".$semestre ?></span>
                    </a>
                </div>
                
    
            </div>
        </div>
    </div>
</header>
<?php
  require_once("../../config/conexion.php"); 
  if(isset($_SESSION["usu_id"])and $_SESSION["rol_id"]==3){ 
    echo $_SESSION["usu_id"];
?>
<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
<title>Panel Admin</title>
</head>

<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

    <!-- Contenido -->
    <div class="page-content">
        <div class="container-fluid">

            <header class="section-header">
                <div class="tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <h3>Copia de Seguridad</h3>
                            <ol class="breadcrumb breadcrumb-simple">
                                <li><a href="#">Admin</a></li>
                                <li class="active">Backup BD</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </header>

            <div class="box-typical box-typical-padding">
                <form method="GET" action="./bd.php">
                    <div class="row" id="viewuser">
                        <div class="col-lg-3">
                            <fieldset class="form-group">
                                <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre backup" required>
                            </fieldset>
                        </div>

                        <div class="col-lg-2">
                            <fieldset class="form-group">
                                <label class="form-label" for="btntodo">&nbsp;</label>
                                <button class="btn btn-rounded btn-primary btn-block" id="btntodo">Descargar</button>
                            </fieldset>
                        </div>

                    </div>
                </form>

            </div>
        </div>
        <!-- Contenido -->
        <?php require_once("../MainJs/js.php");?>

        <script type="text/javascript" src="../notificacion.js"></script>
</body>

</html>
<?php
  } else {
    echo $_SESSION["usu_id"];
    header("Location:".Conectar::ruta()."public/noacceso.php");
  }
?>
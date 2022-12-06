<!DOCTYPE html>
<html>
    <?php require_once("../MainHead/head.php");?>
	<title>HelpDesk UTC</>::Nuevo Ticket</title>
</head>
<body class="with-side-menu"  >

    <?php require_once("../MainHeader/header.php");?>

    <div class="mobile-menu-left-overlay"></div>

    <?php require_once("../MainNav/nav.php");?>

	<!-- Contenido -->
	<div class="page-content" >
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>FORMULARIO DE TICKETS CERRADO</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Nuevo Ticket - Cerrado</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					SOLO PUEDE INGRESAR TICKETS DE LUNES A VIERNES ENTRE 8:00 AM Y 17:00 PM
				</p>
				<h5 class="m-t-lg with-border">Vuelve mas tarde</h5>

				<img src="../../public/img/CERRADO.PNG" alt="" class="img-fluid" style="display:block;margin:auto;">

				<div class="row">
					<form method="post" id="ticket_form">

						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

				</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- Contenido -->

	<?php require_once("../MainJs/js.php");?>

	<script type="text/javascript" src="nuevoticket.js"></script>

</body>
</html>


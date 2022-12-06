<?php
switch ($_SESSION["rol_id"]){
    case 2: ?>
<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="blue-dirty">
            <a href="..\Home\">
                <span class="glyphicon glyphicon-home"></span>
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <li class="blue-dirty">
            <a href="..\NuevoTicket\">
                <span class="glyphicon glyphicon-plus"></span>
                <span class="lbl">Registrar votos</span>
            </a>
        </li>

        <li class="blue-dirty">
            <a href="..\MntJRV\">
                <span class="glyphicon glyphicon-plus"></span>
                <span class="lbl">Registrar Juntas RV</span>
            </a>
        </li>

    </ul>
</nav>
<?php
    break;
    case 1:?>
<nav class="side-menu">


    <ul class="side-menu-list">

        <li class="red">
            <a href="..\Home\">
                <span class="glyphicon glyphicon-home"></span>
                <span class="lbl">Inicio</span>
            </a>
        </li>
        <li class="red">
            <a href="..\ConsultarTicket\">
                <span class="glyphicon glyphicon-search"></span>
                <span class="lbl">Registrar Votos</span>
            </a>
        </li>
        <ul class="side-menu-list">
        <li class="blue-dirty">

            <a href="..\AdminPanel\">
                    <span class="font-icon glyphicon glyphicon glyphicon-cog"></span>
                    <span class="lbl">Backup database </span>
            </a>
        </li>
    </ul>


    

<?php
    break;
    default:
    header("Location:".Conectar::ruta()."index.php");
    break;  
}
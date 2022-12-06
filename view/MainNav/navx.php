<?php
if ($_SESSION["rol_id"] == 1) {
?>
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
                <span class="lbl">Nuevo Ticket</span>
            </a>
        </li>

        <li class="blue-dirty">
            <a href="..\ConsultarTicket\">
                <span class="glyphicon glyphicon-search"></span>
                <span class="lbl">Consultar Ticket</span>
            </a>
        </li>
    </ul>
</nav>
<?php
} else {
?>

<nav class="side-menu">


    <ul class="side-menu-list">

        <li class="red">
            <a href="..\Home\">
                <span class="glyphicon glyphicon-home"></span>
                <span class="lbl">Inicio</span>
            </a>
        </li>

        <li class="red">
            <a href="..\NuevoTicket\">
                <span class="glyphicon glyphicon-plus"></span>
                <span class="lbl">Nuevo Ticket</span>
            </a>
        </li>
        <li class="red">
            <a href="..\ConsultarTicket\">
                <span class="glyphicon glyphicon-search"></span>
                <span class="lbl">Atender Tickets </span>
            </a>
        </li>

        



        <!-- Default dropend button -->


      
        <li class="red with-sub">
            <span>
                <i class="font-icon glyphicon glyphicon glyphicon-cog"></i>
                <span class="lbl">Configurar</span>
            </span>
            <ul>

            <li class="red">
            <a href="..\MntUsuario\">
                <span class="glyphicon glyphicon-wrench"></span>
                <span class="lbl">&nbsp; &nbsp; &nbsp; &nbsp;Usuarios</span>
            </a>
        </li>
            <li class="red">
                    <a href="..\MntCategoria\">
                        <span class="glyphicon glyphicon-wrench"></span>
                        <span class="lbl">&nbsp; &nbsp; &nbsp; &nbsp;Categorías</span>
                    </a>
                </li>
                <li class="red">
                    <a href="..\MntSubCategoria\">
                        <span class="glyphicon glyphicon-wrench"></span>
                        <span class="lbl">&nbsp; &nbsp; &nbsp; &nbsp;SubCategorías</span>
                    </a>
                </li>
                <li class="red">
                    <a href="..\MntPrioridad\">
                        <span class="glyphicon glyphicon-wrench"></span>
                        <span class="lbl">&nbsp; &nbsp; &nbsp; &nbsp;Niveles de Prioridad</span>
                    </a>
                </li>


            </ul>
        </li>

    </ul>


    </ul>
</nav>
<?php
}
?>
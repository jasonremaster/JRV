<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo Categoria */
    require_once("../models/Admin.php");
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo cat_id esta vacio */
        case "backupdp":
            /* TODO:Actualizar si el campo cat_id tiene informacion */ 
                $admin->get_db;
                break;
   }
?>
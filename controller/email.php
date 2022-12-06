<?php
    /* llamada a las clases necesarias */
    require_once("../config/conexion.php");
    require_once("../models/Email.php");
    $email = new Email();

    /* opciones del controlador */
    switch ($_GET["op"]) {
        /*  enviar ticket abierto con el ID */
        case "ticket_abierto":
            $result=$email->ticket_abierto($_POST["tick_id"]);
            echo json_encode($result);
            break;

        case "ticket_cerrado":
            $email->ticket_cerrado($_POST["tick_id"]);
            break;

        case "ticket_asignado":
            $email->ticket_asignado($_POST["tick_id"]);
            break;

        case "usuario_creado":
            $email->usuario_creado($_POST["usu_telf"]);
            echo json_encode($result);
            break;
    }
?>

<?php
    require_once("../config/conexion.php");
    require_once("../models/Jrv.php");
    require_once("../models/Usuario.php");
    $usuario = new Usuario();
    $jrv = new Jrv();

  

    switch($_GET["op"]){
        case "guardaryeditar":
            if(empty($_POST["jrv_id"])){
                $lid= $_POST["jrv_id"];
                //variable para contar errores
                //verificamos cedula
                $nombre = $jrv->get_jrv_nombre($_POST["jrv_nom"]);
                if(count($nombre)==0){
                    
                    $nom =true;
                }else{
                    $messages[] = "Junta receptora del voto ya ingresada  - "; 
                    $nom =false;
                }
                //verificamos correo
                

                if($nom ==true){

                $jrv->insert_jrv($_POST["jrv_nom"],$_POST["jrv_cant"],$_POST["jrv_usu"]);
                $messages="JRV REGISTRADA CORRECTAMENTE";
                echo json_encode(array("success" => true, "messages" => $messages, "jrv_nom"=>$_POST["jrv_nom"]));
                }
                else{
                    echo json_encode(array("success"=> false, "messages"=> $messages));
                }
               
            }
            else {
                $jrv->update_jrv($_POST["jrv_nom"],$_POST["jrv_cant"],$_POST["jrv_usu"],$_POST["sex_id"],$_POST["jrv_id"]);
                $messages="JRV ACTUALIZADA CORRECTAMENTE";

                echo json_encode(array("success"=> true, "messages"=> $messages));
            }
            break;

        case "listar":
            $datos=$jrv->get_juntas();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["jrv_nom"];
                $sub_array[] = $row["jrv_cant"];
                $sub_array[] = $usuario->get_name_x_id($row["jrv_usu"]);
                $sub_array[] =($row["jrv_sexo"] == "1") ? "Femenino" : "Masculino";
            
                $sub_array[] = '<button type="button" onClick="editar('.$row["jrv_id"].');"  id="'.$row["jrv_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["jrv_id"].');"  id="'.$row["jrv_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "eliminar":
            $usuario->delete_usuario($_POST["jrv_id"]);
            break;

        case "mostrar";
            $datos=$jrv->get_junta_x_id($_POST["jrv_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["jrv_id"] = $row["jrv_id"];
                    $output["jrv_nom"] = $row["jrv_nom"];
                    $output["jrv_cant"] = $row["jrv_cant"];
                    $output["jrv_usu"] = $row["jrv_usu"];
                    $output["sex_id"] = $row["jrv_sexo"];
                }
                echo json_encode($output);
            }
            break;

        case "total";
            $datos=$usuario->get_usuario_total_x_id($_POST["jrv_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

        case "totalabierto";
            $datos=$usuario->get_usuario_totalabierto_x_id($_POST["jrv_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

        case "totalcerrado";
            $datos=$usuario->get_usuario_totalcerrado_x_id($_POST["jrv_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
            break;

        case "grafico";
            $datos=$usuario->get_usuario_grafico($_POST["jrv_id"]);
            echo json_encode($datos);
            break;

        case "combo";
            $datos = $usuario->get_usuario_x_rol();
            if(is_array($datos)==true and count($datos)>0){
              //  $html.= "<option label='Seleccionar'></option>";
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['jrv_id']."'>".$row['jrv_nom']."</option>";
                }
                echo $html;
            }
            break;
        /* Controller para actualizar contraseña */
        case "password":
            $usuario->update_usuario_pass($_POST["jrv_id"],$_POST["usu_pass"]);
            break;

    }
?>

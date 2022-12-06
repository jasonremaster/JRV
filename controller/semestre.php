<?php
    /* TODO:Cadena de Conexion */
    require_once("../config/conexion.php");
    /* TODO:Modelo Semestre */
    require_once("../models/Semestre.php");
    $semestre = new Semestre();

    /*TODO: opciones del controlador Semestre*/
    switch($_GET["op"]){
        /* TODO: Guardar y editar, guardar si el campo sem_id esta vacio */
        case "guardaryeditar":
            /* TODO:Actualizar si el campo sem_id tiene informacion */
            if(empty($_POST["sem_id"]))
            {    
                if($_POST["activo"]=="1"){   
                    $activo = 1;
                    $semestre->set_semestre_all();
                }else{
                $activo = 0;
                }

                $semestre->insert_semestre($_POST["sem_nom"],$activo);  
            }
            else
            {
                $semestre->update_semestre($_POST["sem_id"],$_POST["sem_nom"]);
                if($_POST["activo"]=="1"){
                $semestre->set_semestre_all();
                $semestre->set_semestre_act($_POST["sem_id"]);
                }
                else
                {
                $semestre->set_semestre_inact($_POST["sem_id"]);
                }
            }
            break;

        /* TODO: Listado de semestre segun formato json para el datatable */
        case "listar":
            $datos=$semestre->get_semestre();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["sem_nom"];
                $sub_array[] = $row["activo"] == 1 ? '<span class="badge badge-success">Si</span>' : '<span class="badge badge-danger">No</span>';
                $sub_array[] = '<button type="button" onClick="editar('.$row["sem_id"].');"  id="'.$row["sem_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["sem_id"].');"  id="'.$row["sem_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);

            echo json_encode($results);
            break;

        /* TODO: Actualizar estado a 0 segun id de semestre */
        case "eliminar":
            $semestre->delete_semestre($_POST["sem_id"]);
            break;

        /* TODO: Mostrar en formato JSON segun sem_id */
        case "mostrar";
            $datos=$semestre->get_semestre_x_id($_POST["sem_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["sem_id"] = $row["sem_id"];
                    $output["sem_nom"] = $row["sem_nom"];
                    
                }
                echo json_encode($output);
            }
            break;
            case "radio":
                $datos = $semestre->get_activo($_POST["sem_id"]);
                if($datos=='1'){
                   $estat1="checked";
                   $estat2="unchecked";
                    //$html.="<input type='radio' name='activo' id='activo' value='1' checked> Activadoss";
                }else{
                    $estat1="unchecked";
                    $estat2="checked";
                    //$html.="<input type='radio' name='activo' id='activo' value='0' checked> Inactivo";
                }
                echo json_encode(array("estat1" => $estat1, "estat2" => $estat2));
                break;
    
    
        /* TODO: Formato para llenar combo en formato HTML */
        case "combo":
            $datos = $semestre->get_semestre();
            $html="";
            $html.="<option label='Seleccionar'></option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['sem_id']."'>".$row['sem_nom']."</option>";
                }
                echo $html;
            }
            break;
       
    }

?>
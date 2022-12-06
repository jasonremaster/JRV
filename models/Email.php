<?php
/* librerias necesarias para que el proyecto pueda enviar emails */
use PHPMailer\PHPMailer\PHPMailer;
//use phpmailer;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
/* llamada de las clases necesarias que se usaran en el envio del mail */
require_once("../config/conexion.php");
require_once("../models/Ticket.php");
require_once("../models/Usuario.php");

class Email extends PHPMailer{

    //variable que contiene el correo del destinatario
    protected $gCorreo = 'notificacion@online.secretarialm.com';
    protected $gContrasena = 'Admin1234.';
    protected $admin= 'remastervideo@gmail.com';
    //variable que contiene la contraseña del destinatario

    public function ticket_abierto($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $usu2= $row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }
        $nom=$usu." ".$usu2;
        //IGual//
        $this->IsSMTP();
   	$this->SMTPDebug = 0;
        $this->Host = 'smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl';
        $this->FromName = $this->tu_nombre = "Ticket Abierto ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($this->admin);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Abierto";
        //Igual//
        $cuerpo = file_get_contents('../public/NuevoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $nom, $cuerpo);
        $cuerpo = str_replace("lblTitulo", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        //$cuerpo = str_replace("soporte",$this->admin, $cuerpo);
    

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Abierto");
        return $this->Send();
    if (!$this->send()) {
       echo 'Mailer Error: ' . $this-> ErrorInfo;
       return 'No enviado' . $this-> ErrorInfo;
   } else {
       echo 'The email message was sent.';
       return 'The email message was sent.';
   }
    }

    public function ticket_cerrado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $usu2= $row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }
        //IGual//
        $nom=$usu." ".$usu2;
        $this->IsSMTP();
        $this->Host = 'smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl';
        $this->FromName = $this->tu_nombre = "Ticket Cerrado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($this->admin);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Cerrado";
        //Igual//
        $cuerpo = file_get_contents('../public/CerradoTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $nom, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        //$cuerpo = str_replace("soporte",$this->admin, $cuerpo);

        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Cerrado");
        return $this->Send();
        if (!$this->send()) {
       echo 'Mailer Error: ' . $this-> ErrorInfo;
       return 'No enviado' . $this-> ErrorInfo;
   } else {
       echo 'The email message was sent.';
       return 'The email message was sent.';
   }
    }

    public function ticket_asignado($tick_id){
        $ticket = new Ticket();
        $datos = $ticket->listar_ticket_x_id($tick_id);
        foreach ($datos as $row){
            $id = $row["tick_id"];
            $usu = $row["usu_nom"];
            $usu2= $row["usu_ape"];
            $titulo = $row["tick_titulo"];
            $categoria = $row["cat_nom"];
            $correo = $row["usu_correo"];
        }
        $nom=$usu." ".$usu2;

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl';
        $this->FromName = $this->tu_nombre = "Ticket Asignado ".$id;
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->addAddress($this->admin);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Ticket Asignado";
        //Igual//
        $cuerpo = file_get_contents('../public/AsignarTicket.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("xnroticket", $id, $cuerpo);
        $cuerpo = str_replace("lblNomUsu", $nom, $cuerpo);
        $cuerpo = str_replace("lblTitu", $titulo, $cuerpo);
        $cuerpo = str_replace("lblCate", $categoria, $cuerpo);
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Ticket Asignado");
        return $this->Send();
        if (!$this->send()) {
            echo 'Mailer Error: ' . $this-> ErrorInfo;
            return 'No enviado' . $this-> ErrorInfo;
        } else {
            echo 'The email message was sent.';
            return 'The email message was sent.';
        }
    }

    public function usuario_creado($usu_telf){
        $usuario = new Usuario();
        $datos = $usuario->get_usu_data($usu_telf);
        foreach ($datos as $row){
            $usu = $row["usu_nom"];
            $usu2= $row["usu_ape"];
            $correo = $row["usu_correo"];
            $pass= $row["usu_pass"];
        }
        $nom=$usu." ".$usu2;
        $password='123456';

        //IGual//
        $this->IsSMTP();
        $this->Host = 'smtp.hostinger.com';//Aqui el server
        $this->Port = 465;//Aqui el puerto
        $this->SMTPAuth = true;
        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasena;
        $this->From = $this->gCorreo;
        $this->SMTPSecure = 'ssl';
        $this->FromName = 'Credenciales de Acceso - Secretaría HelpDesk';
        $this->CharSet = 'UTF8';
        $this->addAddress($correo);
        $this->WordWrap = 50;
        $this->IsHTML(true);
        $this->Subject = "Credenciales de Acceso";
        //Igual//
        $cuerpo = file_get_contents('../public/UsuarioCreado.html'); /* Ruta del template en formato HTML */
        /* parametros del template a remplazar */
        $cuerpo = str_replace("lblNomUsu", $nom, $cuerpo);
        $cuerpo = str_replace("lblCorreo", $correo, $cuerpo);
        $cuerpo = str_replace("lblPassword", $password, $cuerpo);
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Credenciales de Acceso");
        return $this->Send();
        if (!$this->send()) {
            echo 'Mailer Error: ' . $this-> ErrorInfo;
            return 'No enviado' . $this-> ErrorInfo;
        } else {
            echo 'The email message was sent.';
            return 'The email message was sent.';
        }
    }
}

?>

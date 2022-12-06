<?php
use PHPMailer\PHPMailer\PHPMailer;
//use phpmailer;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
   $admin='remastervideo@gmail.com';
   $correo='notificacion@online.secretarialm.com';
   $pass='Admin1234.';
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.hostinger.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = $correo;
   $mail->Password = $pass;
   $mail->setFrom($correo, 'Hostinger Test');
   $mail->addReplyTo($correo, 'Hostinger Test');
   $mail->addAddress($admin);
   $mail->Subject = 'Testing PHPMailer';
   //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = 'This is a plain text message body';
   //$mail->addAttachment('test.txt');
   if (!$mail->send()) {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
       echo 'The email message was sent.';
   }
?>

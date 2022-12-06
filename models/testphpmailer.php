<?php
   require 'vendor/autoload.php';
 
   use PHPMailer\PHPMailer\PHPMailer;
   
   $mail = new PHPMailer;
   $mail->isSMTP();
   $mail->SMTPDebug = 2;
   $mail->Host = 'smtp.hostinger.com';
   $mail->Port = 587;
   $mail->SMTPAuth = true;
   $mail->Username = 'notificacion@online.secretarialm.com';
   $mail->Password = 'Admin1234.';
   $mail->setFrom('notificacion@online.secretarialm.com', 'Hostinger Test');
   $mail->addReplyTo('notificacion@online.secretarialm.com', 'Hostinger Test');
   $mail->addAddress('remastervideo@gmail.com', 'Tester');
   $mail->Subject = 'Testing PHPMailer';
   $mail->msgHTML(file_get_contents('message.html'), __DIR__);
   $mail->Body = 'This is a plain text message body';
   //$mail->addAttachment('test.txt');
   if (!$mail->send()) {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
   } else {
       echo 'The email message was sent.';
   }
?>
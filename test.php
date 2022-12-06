<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'notificacion@online.secretarialm.com';
$mail->Password = 'Admin1234.';
$mail->setFrom('notificacion@online.secretarialm.com', 'Your Name');
$mail->addReplyTo('notificacion@online.secretarialm.com', 'Your Name');
$mail->addAddress('jason.lozada9853@utc.edu.ec', 'Receiver Name');
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
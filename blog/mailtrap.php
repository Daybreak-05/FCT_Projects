<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ajuste según su método de instalación

$mail = new PHPMailer(true); // Habilitar excepciones

// Configuración SMTP
$mail->isSMTP();
$mail->Host = 'live.smtp.mailtrap.io'; // Su servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = 'smtp@mailtrap.io'; // Su usuario de Mailtrap
$mail->Password = 'c08ea9fd67c7006b40c7899bf604ce3a'; // Su contraseña de Mailtrap
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configuración de remitente y destinatario
$mail->setFrom('hello@demomailtrap.co', 'Nombre Remitente');
$mail->addAddress('pablo999picon@gmail.com', 'Nombre Destinatario');

// Enviando email de texto plano
$mail->isHTML(false); // Establecer formato de email a texto plano
$mail->Subject = 'Dani putero';
$mail->Body    = 'Este es el cuerpo del mensaje en texto plano';

// Enviar el email
if(!$mail->send()){
    echo 'El mensaje no pudo ser enviado. Error de Mailer: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado';
}
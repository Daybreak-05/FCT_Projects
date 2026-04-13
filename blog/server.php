<?php

use Mailtrap\Exception\HttpClientException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php'; // Ajuste la ruta según sea necesario si no está usando Composer

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Enviar usando SMTP
    $mail->Host       = 'live.smtp.mailtrap.io';                     // Configura el servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                   // Habilitar autenticación SMTP
    $mail->Username   = 'smtp@mailtrap.io';               // Usuario SMTP
    $mail->Password   = 'c08ea9fd67c7006b40c7899bf604ce3a';                        // Contraseña SMTP
    $mail->SMTPSecure = 'tls'; // Habilitar encriptación TLS
    $mail->Port       = 587;                                    // Puerto TCP para conectar
    
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}


<?php 
if (session_status() == PHP_SESSION_NONE) session_start();
require_once 'admin/config.php';

require_once 'functions.php';

require_once "views/contact.view.php";

if (isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['texto'])){

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $texto = $_POST['texto'];

    if (empty($texto)) {

    $body = "El cliente '" . $nombre . "' con email '" . $email . "' quiere contactar contigo";

    }else{

        $body = "El cliente '" . $nombre . "' con email '<a href='mailto:$email'>$nombre</a>' quiere contactar contigo . Comentario adjunto: " . $texto;

    }

    email($nombre, $body);
    
}




?>
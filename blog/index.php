<?php 
require_once 'admin/config.php';

require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
    echo "conexion";
}

contar_posts($blog_config['postPpagina'],$conexion);


$post = obtener_post($blog_config['postPpagina'], $conexion);

if (!$post) {
    header("Location: error.php");
}

require_once 'views/index.view.php';
?>
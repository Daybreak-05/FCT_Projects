<?php 
require_once 'admin/config.php';

require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
}

contar_posts($blog_config['postPpagina'],$conexion);


$post = obtener_post($blog_config['postPpagina'], $conexion);


require_once 'views/index.view.php';
?>
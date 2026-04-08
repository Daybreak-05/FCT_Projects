<?php 

require_once "admin/config.php";
require_once "functions.php";

$conexion = conexion();


if ($conexion == false || isset($_GET['id'])) {
    header("Locate: error.php");
}

$id = $_GET['id'];

contar_posts_id($conexion, $id);

$post = obtener_post_id($blog_config['postPpagina'], $conexion, $id);

if (!$post) {
    header("Location: error.php");
}

require_once "views/single.view.php";

?>
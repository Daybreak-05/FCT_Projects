<?php 
require_once 'admin/config.php';
require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Location: error.php");
    echo "conexion";
}

// CHECK FOR PDF REQUEST FIRST - NO OUTPUT BEFORE THIS
if (isset($_POST['pdf'])){
    $page = $_GET['pagina'];
    topdf($page, $blog_config['postPpagina'], $conexion);
    exit; // Stop execution after PDF is sent
}

// NOW OUTPUT HTML FOR REGULAR PAGE VIEW
contar_posts($blog_config['postPpagina'], $conexion);
$post = obtener_post($blog_config['postPpagina'], $conexion);

if (!$post) {
    header("Location: error.php");
}

require_once 'views/index.view.php';
?>
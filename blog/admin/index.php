<?php 
if (session_status() == PHP_SESSION_NONE) session_start();
require_once 'config.php';
require_once '../functions.php';


isAdmin($blog_admin['usuario']);

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
    echo "conexion";
}

if (isset($_GET['logout'])){
    session_destroy();
    header("Location:".RUTA."/login.php");

}else{

    contar_posts($blog_config['postPpagina'],$conexion);
    
    $post = obtener_post($blog_config['postPpagina'], $conexion);
    
    
    require_once "../views/admin_index.view.php";
    
    }





?>
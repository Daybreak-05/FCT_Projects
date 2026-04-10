<?php 

require_once 'admin/config.php';

require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: ../error.php");
    echo "conexion";
}   

$id = $_GET['id'];

if (!isset($_GET['id'])) {

    header("Location: " . RUTA . "/admin");
}

$statement = $conexion->prepare("DELETE FROM articulos WHERE id=?");
$statement->execute([$id]);
header("Location: admin/");

?>
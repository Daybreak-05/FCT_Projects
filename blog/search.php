<?php 

require_once 'admin/config.php';
require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
    header("Locate: error.php");
}

if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])){
    
    $buscar = limpiarDatos($_GET['busqueda']);

    
    $resultado = buscar_post($buscar, $conexion);
    
    require_once "views/search.view.php";

    }else if (!isset($_GET['busqueda']) || empty($_GET['busqueda'])){

        header("Location: index.php");
    
    }



?>
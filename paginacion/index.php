<?php 

if (isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
    if ($pagina<0) {$pagina = 1;}
}else{
    $pagina = 4;
}

$clientesPorPagina= 10;

$inicio = ($pagina>1) ? ($pagina*$clientesPorPagina-$clientesPorPagina) : 0;

try {
    $conexion = new PDO('mysql:host=localhost;dbname=banco;charset=utf8', 'root', 'toor');
} catch (PDOException $e) {
    echo 'No se ha podido establecer conexión con el servidor de bases de datos.<br>';
    die('Error: ' . $e->getMessage());
}

$stmtTotal = $conexion->prepare("SELECT COUNT(*) FROM personas");
$stmtTotal->execute();
$numclientes = (int) $stmtTotal->fetchColumn();
$numpaginas = (int) ceil($numclientes / $clientesPorPagina);

$clientes = $conexion->prepare("SELECT * from personas LIMIT $inicio, $clientesPorPagina");
$clientes->execute();
$clientes = $clientes->fetchAll();

if (!$clientes) {
    header("index.php");
}

require_once "index.view.php";
?>
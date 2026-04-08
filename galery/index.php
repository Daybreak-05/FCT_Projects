<?php 

try {
    $conexion = new PDO('mysql:host=localhost;dbname=galeria;charset=utf8', 'root', 'toor');
} catch (PDOException $e) {
    echo 'No se ha podido establecer conexión con el servidor de bases de datos.<br>';
    die('Error: ' . $e->getMessage());
}

$fotosPpagina=8;

$paginaActual= isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$inicio = ($paginaActual >1) ? $paginaActual * $fotosPpagina - $fotosPpagina : 0;

$statement = $conexion->prepare("SELECT * FROM fotos LIMIT $inicio, $fotosPpagina");
$statement->execute();
$fotos = $statement->fetchAll();

$statement = $conexion->prepare("SELECT COUNT(*) FROM fotos");
$statement->execute();
$numImagenes = $statement->fetchColumn();

$totalPaginas = ceil($numImagenes / $fotosPpagina);


include_once "index.view.php";

?>
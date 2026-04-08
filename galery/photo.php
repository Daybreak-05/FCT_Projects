<?php 

try {
    $conexion = new PDO('mysql:host=localhost;dbname=galeria;charset=utf8', 'root', 'toor');
} catch (PDOException $e) {
    echo 'No se ha podido establecer conexión con el servidor de bases de datos.<br>';
    die('Error: ' . $e->getMessage());
}

if (isset($_GET['image'])){

    $id = $_GET['image'];

    $statement= $conexion->prepare("SELECT * FROM fotos WHERE id = $id");
    $statement->execute();

    $fotos = $statement->fetchAll();


}else{
    header("Location:index.php");
}


require_once "photo.view.php";

?>
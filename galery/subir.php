<?php 

try {
    $conexion = new PDO('mysql:host=localhost;dbname=galeria;charset=utf8', 'root', 'toor');
} catch (PDOException $e) {
    echo 'No se ha podido establecer conexión con el servidor de bases de datos.<br>';
    die('Error: ' . $e->getMessage());
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)){
            //@ no muestra el aviso
    $check = @getimagesize($_FILES['foto']['tmp_name']);
        
        $titulo = $_POST['titulo'];  
        $nombre = $_FILES['foto']['name'];  
        $texto = $_POST['texto'];  

    if ($check !== false) {
        $carpetadestino = "images__galery/";
        $archivosubido = $carpetadestino . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivosubido);


        $statement = $conexion->prepare("INSERT INTO fotos (titulo, imagen, texto) VALUES (?, ?, ?)");

        $statement->execute([$titulo, $nombre, $texto]);

        header("Location: index.php");

    }else{
        echo "El archivo es muy pesado";
    }
    
 }


require_once "subir.view.php";

?>
<?php 

require_once 'admin/config.php';

require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
    echo "conexion";
}   


        if (isset($_POST['titulo'])) {
                
        $titulo = limpiarDatos($_POST['titulo']);
        $extracto = limpiarDatos($_POST['extracto']);
        $texto = limpiarDatos($_POST['texto']);
        
        $archivosubido = $blog_config['carpetaImagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivosubido);
        $thumb = $_FILES['thumb']['name'];
    
        
        $statement = $conexion->prepare("INSERT INTO articulos (titulo, extracto, texto, thumb) VALUES (?,?,?,?)");
        $statement->execute([$titulo, $extracto, $texto, $thumb]);

        header("Location: admin/");

        }

require_once "views/add.view.php";

?>
<?php 

require_once 'admin/config.php';

require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Locate: error.php");
    echo "conexion";
}   


    if (!isset($_GET['id']) && !isset($_POST['id'])){

        header("Location: error.php");
        
        }else{

        if (isset($_POST['id'])) {
                
        $id = limpiarDatos($_POST['id']);
        $titulo = limpiarDatos($_POST['titulo']);
        $extracto = limpiarDatos($_POST['extracto']);
        $texto = limpiarDatos($_POST['texto']);
        $thumb_guardada = limpiarDatos($_POST['thumb-guardada']);   
        
        if (!empty($_FILES['thumb']['name'])) {
            $archivosubido = $blog_config['carpetaImagenes'] . $_FILES['thumb']['name'];
            move_uploaded_file($_FILES['thumb']['tmp_name'], $archivosubido);
            $thumb = $_FILES['thumb']['name'];
        } else {
            $thumb = $thumb_guardada;
        }
        
        $statement = $conexion->prepare("UPDATE articulos SET titulo = ?, extracto= ?, texto = ?, thumb = ? WHERE id = ?;");
        $statement->execute([$titulo, $extracto, $texto, $thumb, $id]);

        header("Location: admin/");

        }

         


        }
        
        $id = $_GET['id'];

    contar_posts_id($id, $conexion);

    $post = obtener_post_id($blog_config['postPpagina'], $conexion, $id);

    if (!$post) {
        header("Location: error.php");
    }

    require_once "views/editar.view.php";

?>
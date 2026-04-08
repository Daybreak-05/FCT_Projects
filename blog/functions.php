<?php 


function conexion(){

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'toor');

        return $conexion;

    } catch (PDOException $e) {
        
        return false;
    }
}


$blog_config = array (
    "postPpagina" => "2",
    'carpetaImagenes' => 'img/'
);

$blog_admin = array(
    'usuario' => 'kosma',
    "password" => "123"
);

function paginaActual(){
    return isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
}

function obtener_post($postPpagina, $conexion){
    $inicio = (paginaActual() > 1) ? paginaActual() * $postPpagina - $postPpagina : 0;
    $statement = $conexion->prepare("SELECT * FROM articulos LIMIT $inicio, $postPpagina");
    $statement->execute();
    return $statement->fetchAll();
}

function obtener_post_id($postPpagina, $conexion, $id){
    $inicio = (paginaActual() > 1) ? paginaActual() * $postPpagina - $postPpagina : 0;
    $statement = $conexion->prepare("SELECT * FROM articulos WHERE id = $id");
    $statement->execute();
    return $statement->fetchAll();
}

function contar_posts($postPpagina, $conexion){
if (paginaActual() >= 0) {
    header("Location: error.php");
}
$inicio = (paginaActual() > 1) ? paginaActual() * $postPpagina - $postPpagina : 0;
$stmtTotal = $conexion->prepare("SELECT COUNT(*) FROM articulos LIMIT $inicio, $postPpagina");
$stmtTotal->execute();
$total = (int) $stmtTotal->fetchColumn();

    if ($total==0) {
    
        header("Location:error.php");
    
    }else{

        return $total; 
    }

}

function contar_posts_id($id,$conexion){
$stmtTotal = $conexion->prepare("SELECT COUNT(*) FROM articulos WHERE id = $id");
$stmtTotal->execute();
$total = (int) $stmtTotal->fetchColumn();

    if ($total==0) {
    
        header("Location:error.php");
    
    }else{

        return $total; 
    }
}

function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
}

?>
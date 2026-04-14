<?php 

require_once 'admin/config.php';
require_once 'functions.php';

$conexion = conexion();

if ($conexion == false) {
    header("Location: error.php");
    echo "conexion";
}

$post = obtener_todos($conexion);

if(!empty($post)) {
    $filename = "blog.csv";
    header("Content-Type: application/csv; charset=utf-8");
    header("Content-Disposition: attachment; filename=\"".$filename."\"");

    $columnas = array_keys($post[0]);
    
    // Para cada columna
    foreach($columnas as $columna) {
        if ($columna>=0 && $columna<=6) {
            
            }else{
            // nombre de la columna
            echo $columna;

            
            foreach($post as $p) {

                //usar * al exportar
                echo "*" . $p[$columna];
                }
                echo "\r\n";
                }
    }
} else {
    echo 'No hay datos a exportar';
}
exit;

?>

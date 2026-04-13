<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ajuste según su método de instalación

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

function buscar_post($buscar, $conexion){

    $statement = $conexion->prepare("SELECT * FROM articulos WHERE titulo LIKE ? OR texto LIKE ?");
    //Sentencia para buscar en una parabra especifica:
    $statement->execute(["%{$buscar}%", "%{$buscar}%"]);
    return $statement->fetchAll();
}

function contar_posts($postPpagina, $conexion){
if (paginaActual() <= 0) {
    header("Location: error.php");
    }
$inicio = (paginaActual() > 1) ? paginaActual() * $postPpagina - $postPpagina : 0;
$stmtTotal = $conexion->prepare("SELECT COUNT(*) FROM articulos");
$stmtTotal->execute();
$total = (int) $stmtTotal->fetchColumn();
        
        return $total; 
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

    return $datos;
}

function isAdmin($blog_admin){
if (!isset($_SESSION['admin']) || $_SESSION['admin'] != $blog_admin){
    header('Location:'.RUTA.'/login.php');
}

}


function email($nombre, $body){

    
    $mail = new PHPMailer(true); // Habilitar excepciones
    
    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host = 'live.smtp.mailtrap.io'; // Su servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'smtp@mailtrap.io'; // Su usuario de Mailtrap
    $mail->Password = 'c08ea9fd67c7006b40c7899bf604ce3a'; // Su contraseña de Mailtrap
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    // Configuración de remitente y destinatario
    $mail->setFrom('hello@demomailtrap.co', 'Contacto del blog');
    $mail->addAddress('pablo999picon@gmail.com', 'Nombre Destinatario');
    
    // Enviando email de texto plano
    $mail->isHTML(false); // Establecer formato de email a texto plano
    $mail->Subject = "$nombre quiere contactar contigo";
    $mail->Body    = "$body";
    
    // Enviar el email
    if(!$mail->send()){
        echo 'El mensaje no pudo ser enviado. Error de Mailer: ' . $mail->ErrorInfo;
        } else {
            echo 'El mensaje ha sido enviado';
        }
            
}
?>
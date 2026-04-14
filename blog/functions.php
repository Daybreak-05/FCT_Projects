<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('fpdf186/fpdf.php');


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
    global $blog_config;

    try {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'live.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 587;
        $phpmailer->Username = 'api';
        $phpmailer->Password = '04a3d416150a7fa8a02166089f67b94f';
        
        // Configuración de remitente y destinatario
        $phpmailer->setFrom('hello@demomailtrap.co', 'Contacto del blog');
        $phpmailer->addAddress('pablopicon999@gmail.com', 'Nombre Destinatario');
        
        // Enviando email en formato HTML
        $phpmailer->isHTML(true);
        $phpmailer->Subject = "$nombre quiere contactar contigo";
        
        // Adjuntar imagen embebida
        $imagePath = "img/logo.png";
        if (file_exists($imagePath)) {
            $phpmailer->addEmbeddedImage($imagePath, 'logo', 'logo.png');
        }

        $conexionPdf = conexion();
        if ($conexionPdf !== false) {
            $pdf = generarPdfPosts($blog_config['postPpagina'], $conexionPdf);
            $phpmailer->addStringAttachment($pdf->Output('S'), 'list.pdf', 'base64', 'application/pdf');
        }
        
        // Cuerpo del email con estilos inline
        $phpmailer->Body = "
        <!DOCTYPE html>
        <html lang='es' style='margin:0; padding:0;'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        </head>
        <body style= 'font-size:16px; font-family:\"Open Sans\", sans-serif; background:#ebebeb;'>
            <div style='max-width:1000px; width:90%; margin:0 auto; box-shadow:2px 2px 12px;'>
            
            <div style='text-align:center;'>
            <img src='cid:logo' alt='firma' style='margin:0 auto; vertical-align:top; width: 96%;'>
            </div>
            
                <div style='max-width:1000px; width:90%; margin:auto; background:#fff; box-shadow:0px 0px 5px rgba(0,0,0,0.5); margin-bottom:30px; padding:30px;'>        
                    <h2 style='font-family:\"Oswald\", Arial, Sans-serif; font-weight:normal; color:#000;'>Hola, Pablo</h2>
                    <p style='margin:10px 0;'>En el <a href='".RUTA."' style='text-decoration:none; color:#BB1F35;'>blog</a> has recibido un mensaje</p>
                    <br>
                    <p style='margin:10px 0;'>$body</p>
                    <br><br>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Enviar el email
        $phpmailer->send();
        return true;
        
    } catch (Exception $e) {
        echo 'El mensaje no pudo ser enviado. Error de Mailer: ' . $phpmailer->ErrorInfo;
        return false;
    }
}


class PDF extends FPDF
{

function PutLink($url, $text)
{
    $this->Write(5,$text,$url);
    $this->SetTextColor(0);
}
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        }

    function generarPdfPosts($postPpage, $conexion){
    $post = obtener_post($postPpage,$conexion);
    
    $pdf = new PDF();
    
    $pdf->SetMargins(10,10,15);

    //logo
    $pdf->AliasNbPages();
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    
    //texto
    $pdf->SetFont('Times','',12);
    
    foreach ($post as $p) {
        
        $pdf->AddPage();
        $pdf->Image('img/logo.png',45,6,120);
        $pdf->SetY(100);
        $pdf->SetFont('Arial','B',15);
        
        $pdf->SetTextColor(187, 31, 53);
        
        $pdf->PutLink("/single.php?id=".$p['id'], "Post - " . $p['id']);
        
        $pdf->Image("img/".$p['thumb'],45,90,120);
        
        $pdf->SetY(120);
        $pdf->SetTextColor(116, 116, 116);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,10,"Fecha: ".$p['fecha'],0,1);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(10,$p['extracto']);
        
        }

    return $pdf;
}

function topdf($page, $postPpage, $conexion){
    $pdf = generarPdfPosts($postPpage, $conexion);
        
        $pdf->Output('I', 'list.pdf');
        
        }
        
        
        
        $conexion = conexion();
        $page = 1;
        $postPpage = 2;
        
        
        ?>

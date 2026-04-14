<?php 

require('fpdf186/fpdf.php');


$blog_config = array (
    "postPpagina" => "2",
    'carpetaImagenes' => 'img/'
);

$blog_admin = array(
    'usuario' => 'kosma',
    "password" => "123"
);

function conexion(){

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'toor');

        return $conexion;

    } catch (PDOException $e) {
        
        return false;
    }
}

function obtener_post($postPpagina, $conexion){
    $inicio = (1 > 1) ? 1 * $postPpagina - $postPpagina : 0;
    $statement = $conexion->prepare("SELECT * FROM articulos LIMIT $inicio, $postPpagina");
    $statement->execute();
    return $statement->fetchAll();
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

function topdf($page, $postPpage, $conexion){
    
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
        $pdf->Image('logo.png',45,6,120);
        $pdf->SetY(100);
        $pdf->SetFont('Arial','B',15);
        
        $pdf->SetTextColor(187, 31, 53);
        
        $pdf->PutLink("blog/single.php?id=".$p['id'], "Post - " . $p['id']);
        
        $pdf->Image("blog/img/".$p['thumb'],45,90,120);
        
        $pdf->SetY(120);
        $pdf->SetTextColor(116, 116, 116);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,10,"Fecha: ".$p['fecha'],0,1);
        $pdf->SetTextColor(0);
        $pdf->SetFont('Arial','',12);
        $pdf->Write(10,$p['extracto']);
        
        }
        
        $pdf->Output();
        
        }
        
        
        
        $conexion = conexion();
        $page = 1;
        $postPpage = 2;
        
        topdf($page, $postPpage, $conexion)
        
        
        
        
        
        
        
        ?>
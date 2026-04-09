<?php 

require_once "admin/config.php";
require_once "functions.php";

if (isset($_POST['user']) && isset($_POST['passw'])){

    $user = $_POST['user'];
    $passw = $_POST['passw'];
    
    if (!empty($user) && !empty($passw)) {
    
    if ($user == $blog_admin['usuario'] && $passw == $blog_admin['password']) {
    
        $_SESSION['admin'] = $blog_admin['usuario'];
        header("location:" . RUTA . '/admin');
    }else{
        $error = ' Credenciales invalidas';
    }

    }

}


require_once "views/login.view.php";



?>
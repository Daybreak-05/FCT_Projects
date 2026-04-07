<?php 
try {
    $conexion = new PDO('mysql:host=localhost;dbname=security;charset=utf8', 'root', 'toor');
} catch (PDOException $e) {

    $_SESSION['error'] ='No se ha podido establecer conexión con el servidor de bases de datos.';
    header("Location: login.php");
    }
    
    if(session_status() == PHP_SESSION_NONE) session_start();


    if (isset($_POST['login'])){

        if (!empty($_POST['user']) && !empty($_POST['passw'])){
            
            $name = $_POST['user'];
            $passw = $_POST['passw'];
            
            $password = checkpassw($conexion, $name, $passw);

            }else{
                
                $_SESSION['error'] = "Credenciales no válidas";
                
                 header("Location: login.php");
            }
                
                
                
    }elseif(isset($_POST['register'])){
                        
        if (!empty($_POST['user']) && !empty($_POST['passw'] && !empty($_POST['passw2']))){

            $user = $_POST['user'];
            $passw = $_POST['passw'];
            $passw2 = $_POST['passw2'];

            if(hash("sha512", $passw) == hash("sha512", $passw2)){

                namedupe($conexion, $user, $passw);

            }else{
                $_SESSION['error'] ='Credenciales no válidas';
                header("Location: register.php");
                }
            
            }else{

                $_SESSION['error'] ='Credenciales no válidas';
                header("Location: register.php");
                
        }

    }elseif(!isset($_POST['logout'])){
        
        $_SESSION['login']= false;
        header("Location:login.php");
        
        }else{
        header("Location:login.php");
    }








function checkpassw($conexion, $user, $passw){


    $clientes = $consulta = $conexion->prepare("SELECT password FROM personas WHERE name = ?");
    $clientes->execute([$user]);
    $clientes = $clientes->fetchColumn();

    $password = $clientes;
    
    if($password == hash("sha512", $passw)){

        $_SESSION["login"]=true;
        header("Location: index.php");
    }else{
    
        $_SESSION['error'] ='Contraseña no válida';
        header("Location: login.php");

        echo $password;
        echo('<br>');
        echo hash("sha512", $passw);

    }

}

function namedupe($conexion, $user, $passw){

    $count = $conexion->prepare("SELECT COUNT(*) FROM personas WHERE name = ?");
    $count->execute([$user]);
    $numclientes = (int) $count->fetchColumn();
    
    if($numclientes==0){
        
        inserdb($conexion, $user, $passw);
        
    }else{
        $_SESSION["error"] = "Nombre existente en la base de datos";
        header("Location:register.php");
    }

}

function inserdb($conexion, $user, $passw){

    $passw = hash("sha512",$passw);
    $count = $conexion->prepare("INSERT INTO personas (id, name, password) VALUES (NULL, ?, ?);");
    $count->execute([$user,$passw]);

    $_SESSION["login"]=true;
    header("Location: index.php");

}

?>
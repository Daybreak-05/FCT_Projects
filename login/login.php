<?php 
if(session_status() == PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/557ccbb98e.js" crossorigin="anonymous"></script>
</head>
<body>

    <section class="content">

        <h1>Iniciar sesión</h1>

        <form class="form" action="logic.php"  method="post">
            
        <input type="hidden" name="login">
        <div class="form__user">
            <i class="fa-solid fa-user"></i>
            <label for="user"></label>
            <input type="text" id="user" name="user" placeholder="Usuario">
        </div>

        <div class="form_password">
            <i class="fa-solid fa-lock"></i>
            <label for="passw"></label>
            <input type="text" id="passw" name="passw" placeholder="Contraseña">
            <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
        <?php if (isset($_SESSION['error'])){ echo "<p class='error' style='color: red;'>".$_SESSION['error']."</p>"; $_SESSION['error']=null;}?>

        
    </form>

        <div class="register">
            <p>¿Aún no tienes cuenta?</p>
            <a href="register.php">Resgístrate</a>
        </div>
    </section>
    
</body>
</html>
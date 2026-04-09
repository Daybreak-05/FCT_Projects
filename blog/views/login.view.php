<?php 

require_once "header.php";

?>

    <div class="contenedor"> 
        <article>
            <h2 class="titulo">Iniciar Sesión</h2>
            <form class="formulario" action="" method="post">
                <input type="text" name="user" placeholder="Usuario">
                <input type="text" name="passw" placeholder="Contraseña">
                <?php if (isset($error)){?><h3 style="color: red;">Error:<?= $error ?></h3><?php } ?>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </article>
    </div>
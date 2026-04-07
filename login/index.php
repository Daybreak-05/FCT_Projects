<?php 
    if(session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['login']) || $_SESSION["login"] == false){
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section class="content">
    <h1>Contenido del sitio</h1>

    <article>
        
        <form action="logic.php"><input type="hidden" name="logout"><button  class="logout" type="submit"><a>Cerrar sesión</a></button></form>

    <div class="article__text">
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam beatae tempore quisquam. 

        Corporis corrupti consequatur quod ratione distinctio autem aliquid maxime fuga ut, omnis sequi laudantium officia minus saepe soluta.
    </p>
        
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam consectetur, quis ducimus eos ratione nam!

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam consectetur, quis ducimus eos ratione nam!
    </p>
    
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia aspernatur ipsum qui maxime. Architecto, tempora!

        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque unde distinctio, quas aliquid accusantium laborum magni,
    </p> 
    
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia aspernatur ipsum qui maxime. Architecto, tempora!
        
        eius assumenda totam tempore voluptates ipsa perferendis quam quos fugiat incidunt libero a eum!</p>
    </div>

    </article>
</section>
    
</body>
</html>
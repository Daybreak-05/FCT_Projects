<?php 

require_once "header.php";

?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Añadir un nuevo Artículo</h2>
            
            <form class="formulario" method="post" action="" enctype="multipart/form-data">

                <input type="text" placeholder="Titulo" name="titulo" required>
                <input type="text" placeholder="Resumen" name="extracto" required>
                <textarea name="texto" placeholder="Texto" required></textarea>
                <input type="file" name="thumb" required>

                <input type="submit" value="Añadir Artículo">
            </form>

            <a href="admin/" class="continuar">Volver</a>
            
        </article>
    </div>
</div>
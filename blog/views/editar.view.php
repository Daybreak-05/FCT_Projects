<?php 

require_once "header.php";

foreach ($post as $p) {
?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Editar Artículo</h2>
            
            <form class="formulario" method="post" action="">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">
                <input type="text" name="titulo" value="<?= $p['titulo'] ?>">
                <input type="text" name="extracto" value="<?= $p['extracto'] ?>">
                <textarea name="texto"><?= $p['texto'] ?></textarea>
                <input type="file" name="thumb">
                <input type="hidden" name="thumb-guardada" value="<?= $p['thumb'] ?>">

                <input type="submit" value="Modificar Artículo">
            </form>

            <a href="admin/" class="continuar">Volver</a>
            
        </article>
    </div>
</div>

<?php
}

?>



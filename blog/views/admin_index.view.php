<?php 

require_once "../views/header.php";

?><div class="contenedor"><h2 class="titulo">Panel de Control</h2></div>
  <div class="contenedor"><a class="btn" href="?logout" class="continuar">Nuevo Post</a>
  <a class="btn" href="?logout" class="continuar">Log out</a></div>
<?php

foreach ($post as $p) {
    ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><?= $p['id'] ?> -
            <a href="../single.php?id=<?= $p['id'] ?>"><?= $p['titulo'] ?></a></h2>
            <a href="../editar.php?id=<?= $p['id'] ?>" class="continuar">Editar</a>
            <a href="../single.php?id=<?= $p['id'] ?>" class="continuar">Ver</a>
            <a href="?borrar?id=<?= $p['id'] ?>" class="continuar">Borrar</a>
        </article>
    </div>
</div>

<?php
}
require_once "../paginacion.php";
?>

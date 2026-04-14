<?php 
require_once "header.php";
?>
<div class="contenedor">
        <h2><a href="<?= RUTA ?>/admin">Admin Page</a></h2><br>
    
    </div>
</div>

<?php
foreach ($post as $p) {
?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><a href="single.php?id=<?= $p['id'] ?>"><?= $p['id'] ?> - <?= $p['titulo'] ?></a></h2>
            <p class="fecha"><?= $p['fecha'] ?></p>
            <div class="thumb">
                <a href="single.php?id=<?= $p['id'] ?>">
                    <img src="<?= RUTA; ?>/img/<?= $p['thumb'] ?>" alt="<?= $p['thumb'] ?>"></img>
                </a>
            </div>
            <p class="extracto"><?= $p['extracto'] ?></p>
            <a href="single.php?id=<?= $p['id'] ?>" class="continuar">Continuar leyendo</a>
        </article>
    </div>
</div>

<?php
}
?>


<?php 
require "pdf.php";?>

<div class="contenedor">
    <form action="excel.php" method="post">
        <!-- <input type="hidden" name="pagina" value=""> Descomentar para usar por pagina -->
        <button class="btn" type="submit">Exportar a excel</button>
    </form>
</div>

<?php
require "paginacion.php";
?>
    
</body>
</html>
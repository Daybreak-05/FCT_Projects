<?php
require_once "header.php";
?>
<?php 
foreach ($post as $p) {
?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo"><a href="single.php?id=<?= $p['id'] ?>"><?= $p['titulo'] ?></a></h2>
            <p class="fecha"><?= $p['fecha'] ?></p>
            <div class="thumb">
                <a href="single.php?id=<?= $p['id'] ?>">
                    <img src="<?= RUTA; ?>/img/<?= $p['thumb'] ?>" alt="<?= $p['thumb'] ?>"></img>
                </a>
            </div>
            <p class="extracto"><?= $p['texto'] ?></p>
            <a href="index.php" class="continuar">Volver</a>
            
        </article>
    </div>
</div>

<?php
}

?>



</body>

</html>
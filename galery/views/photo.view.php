<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/557ccbb98e.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <header>
        <div class="contenedor">
            <h1 class="titulo">Mi increible galeria en php</h1>
        </div>
    </header>

    <div class="contenedor">
        <div class="foto">

            <?php 
            
            foreach ($fotos as $f) {
                ?>
                    <h2><?= $f['titulo'] ?></h2>
                <div class="">
                    <img src="images__galery/<?= $f['imagen']?>" alt="<?php echo $f['titulo']?>">
                
                <div class="text">
                    <p><?= $f['texto'] ?></p>
                </div>

                </div>
<br>
                <a href="index.php">Volver</a>
                <?php
            }
            ?>
        </div>
    </div>

</body>
</html>
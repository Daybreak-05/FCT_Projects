<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>Mi Increíble Galería en PHP</title>
	<link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/557ccbb98e.js" crossorigin="anonymous"></script>

    
</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="titulo">Mi Increíble Galería en PHP y MySQL</h1>
		</div>
	</header>

    <section class="fotos w-60%">

        <div class="contenedor">


            <?php 
            
            foreach ($fotos as $f) {
                ?>
                <div class="thumb">
                    <a href="photo.php?image=<?= $f['id']?>">
                    <img class="" src="images__galery/<?= $f['imagen']?>" alt="<?php echo $f['titulo']?>">
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

        <div class="paginacion">
            <?php 
            if ($paginaActual > 1) {
                ?>
            <a href="index.php?pagina=<?= $paginaActual-1?>" class="izquierda"><i class="fa-solid fa-arrow-left"></i> Página anterior</a>
                <?php
            }
            
            if ($paginaActual != $totalPaginas) { ?>
            <a href="index.php?pagina=<?= $paginaActual+1?>" class="derecha">Página siguiente <i class="fa-solid fa-arrow-right"></i></a>
                <?php } ?>
        </div>

        <div class="subir"style="text-align: center;" >
            <a href="subir.php">Subir foto</a>
        </div>

	<footer>
		<p class="copyright">Galeria creada por Carlos Arturo - FalconMasters</p>
	</footer>
</body>
</html>
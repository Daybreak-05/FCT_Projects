<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>My Blog</title>
	<link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/557ccbb98e.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdHv7YsAAAAAKP-D3N0XehgN1fjqDXFdq-IC4J6"></script>

</head>
<body>

    <header>
        <div class="contenedor">
            <div class="logo izquierda">
                <p><a href="index.php?pagina=1">Mi primer blog</a></p>
            </div>

            <div class="derecha">

                <form name="busqueda" class="buscar" action="<?= RUTA; ?>/search.php" method="get">
                    <input type="text" name="busqueda" placeholder="buscar">
                    <button type="submit" class="icono fa fa-search"></button>
                </form>
                
                
                <nav class="menu">
                    <ul>
                        <li><a href="https://x.com/?lang=es"><i class="fa fa-x"></i></a></li>
                        <li><a href="https://facebook.com/?lang=es"><i class="fa fa-facebook"></i></a></li>
                        <li><form action="<?= RUTA; ?>/contact.php" method="post"><input type="hidden" name="pagina" value="<?= paginaActual() ?>"><button class="btn_alt" type="submit">Contacto <i class="fa fa-envelope"></i></button></form></li>
                    </ul>
                </nav>
                
            </div>
                
        </div>

    </header>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Añadir un nuevo Artículo</h2>
            
            <form class="formulario" id="captcha" method="post" action="" enctype="multipart/form-data">

                <input type="text" placeholder="Titulo" name="titulo" required>
                <input type="text" placeholder="Resumen" name="extracto" required>
                <textarea name="texto" placeholder="Texto" required></textarea>
                <input type="file" name="thumb" required>

                <input type="submit" value="Añadir Artículo" class="g-recaptcha" data-sitekey="6LdHv7YsAAAAAKP-D3N0XehgN1fjqDXFdq-IC4J6" 
                data-callback='onSubmit' data-action='submit'>
            </form>

            <a href="admin/" class="continuar">Volver</a>
            
        </article>
    </div>
</div>
</body>

 <script>
   function onSubmit(token) {
     document.getElementById("captcha").submit();
   }
 </script>
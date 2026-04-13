
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

</head>
<body>

    <header>
        <div class="contenedor">
            <div class="logo izquierda">
                <p><a href="index.php?pagina=1">Mi primer blog</a></p>
            </div>

            <div class="derecha">            
                
                <nav class="menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-x"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#">Contacto <i class="fa fa-envelope"></i></a></li>
                    </ul>
                </nav>
                
            </div>
                
        </div>


    </header>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Contacta con un administrador</h2>
            <form class="formulario" method="post" action="" enctype="multipart/form-data">

                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="email" placeholder="email de contacto" name="email" required>
                <textarea name="texto" placeholder="Comentarios adicionales"></textarea>

                <input type="submit" value="Enviar">
            </form>

            <a href="index.php" class="continuar">Volver</a>
            
        </article>
    </div>
</div>
</body>
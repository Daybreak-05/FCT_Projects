<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginacion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.style.css">
</head>
<body>

<div class="contenedor">

    <h1 class="center">Usuarios</h1>

    <section class="articulos">
        
    <ul>
        
       <?php foreach ($clientes as $c): ?>
        <li><?php echo $c['id'] . ' .-' . $c['Nombre']?></li>
        <?php endforeach;?>
    </ul>

    </section>

    <section class="paginacion">
        <ul>
        <!-- class="disabled" style = 'pointer-events: none' -->
            <li class="<?php if($pagina==1){echo "disabled";}?>"><a href="?pagina=1">&laquo;</a></li>
            
            <?php 
            for ($i=$pagina-2; $i <= $pagina+2 ; $i++) { 
                if($i==$pagina){?><li class="active"><a href="?pagina=<?php echo $i;?>"><?php echo $i; ?></a></li><?php }
                else if($i>$numpaginas || $i <= 0){    
                }else{
                    ?><li><a href="?pagina=<?php echo $i;?>"><?php echo $i; ?></a></li><?php                
                }}
            ?>
            <li class="<?php if($pagina==$numpaginas){echo "disabled";}?>"><a href="?pagina=<?php echo $numpaginas;?>">&raquo;</a></li>
        </ul>
    </section>

</div>
    
</body>
</html>
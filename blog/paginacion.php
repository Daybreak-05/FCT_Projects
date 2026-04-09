<?php 
$totalposts = contar_posts($blog_config['postPpagina'], $conexion);
$numpaginas = (int) ceil($totalposts / $blog_config["postPpagina"]);
?>

    <section class="paginacion">
        <ul>
            <li><a href="?pagina=1">&laquo;</a></li>
            
            <?php 
            for ($i=paginaActual()-2; $i <= paginaActual()+2 ; $i++) { 
                if($i==paginaActual()){?><li class=""><a href="?pagina=<?php echo $i;?>"><?php echo $i; ?></a></li><?php }
                else if($i>$numpaginas || $i <= 0){    
                }else{
                    ?><li><a href="?pagina=<?php echo $i;?>"><?php echo $i; ?></a></li><?php                
                }}
            ?>
            <li><a href="?pagina=<?php echo $numpaginas;?>">&raquo;</a></li>
        </ul>
    </section>
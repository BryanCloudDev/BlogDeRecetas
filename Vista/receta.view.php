<?php 
include_once 'rutas.php';
$rutaHeader;
?>

<main class="main index">
    <!-- contenedor para centrar el sitio web -->
    <div class="container">
        <article id="idArticulo" class="post">
            <div class="imgContainer">
                <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
            </div>
            <div class="texto">
                <h2><?= $receta["tituloPost"] ?></h2>
                <p class="date">Creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
                <p>
                    <ol>
                    <?php
                        foreach($pasos as $paso){
                            echo "<li>$paso</li>";
                        };
                    ?>
                    </ol>
                </p>
            </div>
        </article>
    </div>
</main>

<?php 
require_once realpath('Vista/componentes/footer.php');
?>
<?php require("./Vista/componentes/header.php");?>
<!-- contenedor main del index -->
<main class="main index">
    <a href="registrar_receta.php">Crear Post</a>
    <!-- contenedor para centrar el sitio web -->
    <div class="container">
        <!-- ciclo para mandar a llamra los posts de los usuarios -->
        <?php foreach($recetas as $receta): ?>
            <article class="post">
                <div class="imgContainer">
                    <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
                </div>
                <div class="texto">
                    <h2><a href="./post?id="><?= $receta["tituloPost"] ?></a></h2>
                    <p>Publicado el 3 de Diciembre de 2021 </p>
                    <p><?= $receta["pasosPost"] ?></p>
                </div>
            </article>
        <?php endforeach ?>
    </div>
    <!-- paginacion -->
    <section class="paginacion">
        <ul>
            <li><a href="#">&lt;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">&gt;</a></li>
        </ul>
    </section>
</main>

<?php require("./Vista/componentes/footer.php"); ?>
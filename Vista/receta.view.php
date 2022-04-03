<?php require("./Vista/componentes/header.php"); ?>

<main class="main index">
    <!-- contenedor para centrar el sitio web -->
    <div class="container">
        <article class="post">
            <div class="imgContainer">
                <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
            </div>
            <div class="texto">
                <h2><a href="receta.php?id=<?= $receta["idReceta"] ?>"><?= $receta["tituloPost"] ?></a></h2>
                <p class="date">Creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
                <p><?= $receta["pasosPost"] ?></p>
            </div>
        </article>
    </div>
</main>

<?php require("./Vista/componentes/footer.php"); ?>
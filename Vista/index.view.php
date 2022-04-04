<?php require("./Vista/componentes/header.php");?>
<!-- contenedor main del index -->
<main class="main index">
    <!-- contenedor para centrar el sitio web -->
    <div class="container">
        <!-- ciclo para mandar a llamra los posts de los usuarios -->
        <?php foreach($recetas as $receta): ?>
            <article class="post">
                <div class="imgContainer">
                    <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
                </div>
                <div class="texto">
                    <h2><a href="receta.php?id=<?= $receta["idReceta"] ?>"><?= $receta["tituloPost"] ?></a></h2>
                    <p class="date">Creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
                    <p><?= $receta["descripcionPost"] ?></p>
                </div>
                <?php require ("./Vista/share.view.php");?>
            </article>
        <?php endforeach ?>
        <a class="newPost" href="registrar_receta.php">Crear Post <i class="fa fa-plus" aria-hidden="true"></i></a>
    </div>
</main>
<?php require("./Vista/componentes/footer.php"); ?>

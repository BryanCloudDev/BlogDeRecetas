<?php require("./Vista/componentes/header.php"); ?>

<!-- Tu codigo HTML va aca-->
<a href="index.php">Ir al menú principal</a>
<article class="post">
    <div class="imgContainer">
        <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
    </div>
    <div class="texto">
        <h2><?= $receta["tituloPost"] ?></h2>
        <p>Este post fue creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
        <p>Descripción breve: <?= $receta["descripcionPost"] ?></p>
        <p>pasos generales de la receta : <?= $receta["pasosPost"] ?></p>
    </div>
</article>

<?php require("./Vista/componentes/footer.php"); ?>
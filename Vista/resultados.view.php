<?php 
include_once 'rutas.php';
$rutaHeader;
?>
<main class="main">
    <div class="container">
    <?php foreach($recetas as $receta): ?>
    <article class="post">
        <div class="imgContainer">
            <img src="<?php echo $receta["imagenPost"]?>">
        </div>
        <div class="texto">
            <h2><a href="receta.php?id=<?= $receta["idReceta"] ?>"><?= $receta["tituloPost"] ?></a></h2>
            <p class="date">Creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
            <p><?= $receta["descripcionPost"] ?></p>
        </div>
    </article>
<?php endforeach; ?>
    </div>
</main>

<?php 
require_once realpath('Vista/componentes/footer.php');
?>
<?php 
include_once 'rutas.php';
$rutaHeader;
?>

<main class="main crearReceta">
    <div class="container">
        <form name="form" action="actualizar.php" method="post" enctype="multipart/form-data">
            <div class="rowi">
                <h1>Actualizar receta</h1>
            </div>
            <div class="rowi">
                <label for="tituloPost">Titulo de la receta</label>
                <input type="text" name="tituloPost" id="tituloPost" required value="<?= $receta['tituloPost']?>">    
            </div>
            <div class="rowi">
                <label for="descripcionPost">Descripcion de la receta</label>
                <input type="text" name="descripcionPost" id="descripcionPost" required value="<?= $receta['descripcionPost'];?>">
            </div>
            <div class="rowi">
                <label for="pasosPost">Pasos a seguir</label>
                <textarea name="pasosPost" id="pasosPost" required><?= $receta["pasosPost"] ?></textarea>            
            </div>
            <div class="rowi">
                <label for="pasosPost">Foto del platillo</label>
                <img src="<?= $receta["imagenPost"] ?>" alt="Imagen Ingresada" class="tiny_image">
                <input type="file" name="imagenPost">
            </div>
            <input type="hidden" name="actualizarId" value="<?= $_POST["recetaid"] ?>">
            <input type="submit" name="publicar">
        </form>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
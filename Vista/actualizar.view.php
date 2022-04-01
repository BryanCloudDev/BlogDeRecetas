<?php require_once "./Vista/componentes/header.php" ?>

<main class="main crearReceta">
    <div class="container">
        <form name="form" action="registrar_receta.php" method="post" enctype="multipart/form-data">
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
                <textarea name="pasosPost" id="pasosPost" required value="<?= $receta['pasosPost']?>"></textarea>            
            </div>
            <div class="rowi">
                <label for="pasosPost">Foto del platillo</label>
                <input type="file" name="imagenPost">
            </div>
            <input type="submit" name="Publicar" value="Actualizar">
        </form>
    </div>
</main>
<?php require_once "./Vista/componentes/footer.php" ?>
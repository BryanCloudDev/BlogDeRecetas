<?php 
include 'rutas.php';
rutaHeader; 
?>

<main class="main crearReceta">
    <div class="container">
        <form name="form" action="registrar_receta.php" method="post" enctype="multipart/form-data">
            <div class="rowi">
                <h1>Crear receta</h1>
            </div>
            <div class="rowi">
                <label for="tituloPost">Titulo de la receta</label>
                <input type="text" name="tituloPost" id="tituloPost" required>    
            </div>
            <div class="rowi">
                <label for="descripcionPost">Descripcion de la receta</label>
                <input type="text" name="descripcionPost" id="descripcionPost" require>
            </div>
            <div class="rowi">
                <label for="pasosPost">Pasos a seguir</label>
                <textarea name="pasosPost" id="pasosPost" required></textarea>            
            </div>
            <div class="rowi">
                <label for="pasosPost">Foto del platillo</label>
                <input type="file" name="imagenPost">
            </div>
            <input type="submit" name="Publicar">
        </form>
    </div>
</main>
<?php require_once "./Vista/componentes/footer.php" ?>
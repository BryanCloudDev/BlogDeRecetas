<?php?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Receta</title>
</head>
<body>
        <form name="form" action="receta.php" method="post" enctype="multipart/form-data">

            <div class="form-group-2">
                <label for="tituloPost">Titulo de la receta</label>
                <input type="text" name="tituloPost" id="tituloPost" required>    
            </div>
            <div class="form-group-2">
                <label for="descripcionPost">Breve descripcion de la receta</label>
                <input type="text" name="descripcionPost" id="descripcionPost" require>
            </div>
            <div class="form-group-2">
                <label for="pasosPost">Paso a Paso</label>
                <textarea name="pasosPost" id="pasosPost" required></textarea>            
            </div>
            <div class="form-group-2">
                <input type="file" name="imagenPost">
            </div>

                <input type="submit" name="Publicar">

        </form>
</body>
</html>
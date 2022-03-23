<?php

require_once "./config.php";

if(isset($_POST["tituloPost"]) && isset($_POST["descripcionPost"]) && isset($_POST["pasosPost"]) && isset($_FILES["imagenPost"])){

    ["tituloPost" => $tituloPost, 
    "descripcionPost" => $descripcionPost, 
    "pasosPost" => $pasosPost] = $_POST;

    $imagenPost = $_FILES["imagenPost"] ?? null;

    if(!is_dir(__DIR__ . "/images")){
        mkdir(__DIR__ . "/images");
    }

    if($imagenPost && $imagenPost["tmp_name"]){
        $imagenPostPath = "images/" . randomDIR(8) . "/" . $imagenPost["name"] ;
        mkdir(dirname($imagenPostPath));
        move_uploaded_file($imagenPost["tmp_name"],$imagenPostPath);
    }

    $receta = new Receta($tituloPost, $descripcionPost, $pasosPost, $imagenPostPath);
    $receta->InsertReceta();

    header("Location ../Vista/index.php");
}
?>

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
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
    $receta->insertReceta();

    header("Location ../Vista/index.php");
}
?>

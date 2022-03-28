<?php

require_once "Controlador/crl.isuser.php";
require_once "crl.config.php";
require_once "Modelos/funciones.receta.php";
require_once "Modelos/funciones.spanishdate.php";

if(isset($_POST["tituloPost"]) && isset($_POST["descripcionPost"]) && isset($_POST["pasosPost"]) && isset($_FILES["imagenPost"])){

    ["tituloPost" => $tituloPost, 
    "descripcionPost" => $descripcionPost, 
    "pasosPost" => $pasosPost] = $_POST;

    $imagenPost = $_FILES["imagenPost"] ?? null;

    $spanishDate = SpanishDate();

    if(!is_dir("Controlador/images")){
        mkdir("Controlador/images");
    }

    if($imagenPost && $imagenPost["tmp_name"]){
        $imagenPostPath = "Controlador/images/" . randomDIR(8) . "/" . $imagenPost["name"] ;
        mkdir(dirname($imagenPostPath));
        move_uploaded_file($imagenPost["tmp_name"],$imagenPostPath);
    }

    session_start();
    $id_usuario = $_SESSION["user"];

    $receta = new Receta($tituloPost, $descripcionPost, $pasosPost, $imagenPostPath,$spanishDate,$id_usuario);
    $receta->createReceta();

    header("Location: index.php");
}
?>

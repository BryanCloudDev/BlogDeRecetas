<?php
require_once ('Controlador/crl.isuser.php');
require_once ('crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Controlador/functions.php');

$errors = [];

if(isset($_POST["tituloPost"]) && isset($_POST["descripcionPost"]) && isset($_POST["pasosPost"]) && isset($_FILES["imagenPost"])){

    $tituloPost = clean_data($_POST['tituloPost']);
    $descripcionPost = clean_data($_POST['descripcionPost']);
    $pasosPost = clean_data($_POST['pasosPost']);

    $imagenPost = $_FILES["imagenPost"] ?? null;
     //para saber que es la funcion 'uploadImage()' revisar en Controlador/functions.php
    $dest_path = uploadImage($_FILES["imagenPost"],'Media/recipe/');

    if(!$dest_path[1]){
        $errors['recipeImage'] = $dest_path[0];
    }
    if($errors == []){
        $spanishDate = SpanishDate();
        $id_usuario = $_SESSION["user"];
        $receta = new Receta($tituloPost, $descripcionPost, $pasosPost, $dest_path[0],$spanishDate,$id_usuario);
        $receta->createReceta();
        header("Location: index.php");
    }
}
?>

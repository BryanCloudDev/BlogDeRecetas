<?php
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.referer.php');
require_once ('./Controlador/functions.php');

if(isset($_POST["recetaid"])){
    $receta = Receta::getRecetaById($_POST["recetaid"]);
}
else if(isset($_POST["publicar"])){

    $title = clean_data($_POST['tituloPost']);
    $descripcion = clean_data($_POST['descripcionPost']);
    $pasosPost = clean_data($_POST['pasosPost']);
    $id = clean_data($_POST['actualizarId']);

    ["imagenPost" => $imagenPost] = $_FILES;
    
    $imagenLast = Receta::getImagePathById($id);

    if($imagenPost && $imagenPost["tmp_name"]){
        unlink($imagenLast);
        rename($imagenLast, dirname($imagenLast) . "/" . $imagenPost["name"]);
        move_uploaded_file($imagenPost["tmp_name"], $imagenLast);
    }

    $uploadReceta = new Receta($title,$descripcion,$pasosPost,$imagenLast,null,null);
    $uploadReceta->updateRecetaById($id);
    header("Location: index.php");
}
else{
    header("Location: index.php");
}
?>
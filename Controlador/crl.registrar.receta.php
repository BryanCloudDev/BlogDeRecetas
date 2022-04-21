<?php
require_once ('Controlador/crl.isuser.php');
require_once ('crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Controlador/functions.php');

if(isset($_POST['agregar'])){
    if($_POST['agregar'] == 'Agregar'){
        Receta::temporalSteps(clean_data(current($_POST['pasosPost'])));
    }
}

if(isset($_POST['paso'])){
    Receta::deleteTemporalStep($_POST['paso']);
}

$errors = [];

if(isset($_POST["tituloPost"]) && isset($_POST["descripcionPost"]) && isset($_POST["pasosPost"]) && isset($_FILES["imagenPost"]) && isset($_POST['publicar'])){
    //limpiamos la data
    $tituloPost = clean_data($_POST['tituloPost']);
    $descripcionPost = clean_data($_POST['descripcionPost']);
    $pasosPost = '';
    $i = 1;
    foreach(Receta::getTemporalSteps() as $step){
        if($i < count(getTemporalSteps())){
            $pasosPost .= $step['pasos'] . '.';
        }
        else{
            $pasosPost .= $step['pasos'];
        }
        $i++;
    }
    Receta::deleteTemporalSteps();
    //para saber que es la funcion 'uploadImage()' revisar en Controlador/functions.php
    $dest_path = uploadImage($_FILES["imagenPost"],'Media/recipe/');
    //si lo que nos retorna en la posicion 1 es == false
    //y el error sera igual a la posision en 0
    if(!$dest_path[1]){
        $errors['recipeImage'] = $dest_path[0];
    }
    //si no hay errores
    if($errors == []){
        var_dump($pasosPost);
        $spanishDate = SpanishDate();
        $id_usuario = $_SESSION["user"];
        $receta = new Receta($tituloPost, $descripcionPost, $pasosPost, $dest_path[0],$spanishDate,$id_usuario);
        $receta->createReceta();
        header("Location: index.php");
    }
}
?>

<?php
require_once ('Controlador/crl.isuser.php');
require_once ('crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Controlador/functions.php');

if(isset($_POST['agregar'])){
    if($_POST['agregar'] == 'Agregar'){
        Rec::temporalSteps(clean_data(current($_POST['pasosPost'])));
    }
}

if(isset($_POST['paso'])){
    Rec::deleteTemporalStepById($_POST['paso']);
}

$errors = [];

if(isset($_POST["tituloPost"]) && isset($_POST["descripcionPost"]) && isset($_POST["pasosPost"]) && isset($_FILES["imagenPost"]) && isset($_POST['publicar'])){
    //limpiamos la data
    $RecTitle = clean_data($_POST['tituloPost']);
    $recDescription = clean_data($_POST['descripcionPost']);
    $recSteps = '';
    $i = 1;
    foreach(Rec::getTemporalSteps() as $step){
        if($i < count(getTemporalSteps())){
            $recSteps .= $step['pasos'] . '.';
        }
        else{
            $recSteps .= $step['pasos'];
        }
        $i++;
    }
    Rec::deleteTemporalSteps();
    //para saber que es la funcion 'uploadImage()' revisar en Controlador/functions.php
    $dest_path = uploadImage($_FILES["imagenPost"],'Media/recipe/');
    //si lo que nos retorna en la posicion 1 es == false
    //y el error sera igual a la posision en 0
    if(!$dest_path[1]){
        $errors['recipeImage'] = $dest_path[0];
    }
    //si no hay errores
    if($errors == []){
        var_dump($recSteps);
        $spanishDate = SpanishDate();
        $id_usuario = $_SESSION["user"];
        $rec = new Rec($RecTitle, $recDescription, $recSteps, $dest_path[0],$spanishDate,$id_usuario);
        $rec->createRec();
        header("Location: index.php");
    }
}
?>

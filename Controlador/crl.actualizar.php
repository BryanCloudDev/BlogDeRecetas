<?php
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.referer.php');
require_once ('Controlador/functions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_SESSION['idReceta'])){
    $receta = Receta::getRecetaById($_SESSION['idReceta']);
}

function getTemporalStep($id){
    $conn = Conexion::conn();
    $query = "SELECT * FROM pasos WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->bindValue(":id",$id);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
function updateTemporalStep($id,$paso){
    $conn = Conexion::conn();
    $query = "UPDATE pasos SET pasos = :paso WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->bindValue(":id",$id);
    $statement->bindValue(":paso",$paso);
    $statement->execute();
    $statement->closeCursor();
}
// else{
//     header("Location: index.php");
// }

$pasos = explode('.',$receta['pasosPost']);

//obtemenos los pasos de la receta y los insertamos en la tabla temporal pasos
if(Receta::checkRows() == 0 && empty($_POST['publicar'])){
    foreach($pasos as $paso){
        Receta::temporalSteps($paso);
    }
}
//si agregamos un paso nuevo este se almacenara temporalemte en la abla pasos
if(isset($_POST['agregar']) && !isset($_POST['idPaso'])){
    Receta::temporalSteps(current($_POST['pasosPost']));
}
//si esta set la variable paso entonces se borrara ese valor de la tabla
if(isset($_POST['paso'])){
    Receta::deleteTemporalStep($_POST['paso']);
}
//si editar paso no esta vacio entonces iniciamos la variable $newpaso y se pasa ese valor 
if(!empty($_POST['editarPaso'])){
    $paso = getTemporalStep($_POST['editarPaso'])[1];
    $idPaso = getTemporalStep($_POST['editarPaso'])[0];
}

if(isset($_POST['idPaso'])){
    updateTemporalStep($_POST['idPaso'],current($_POST['pasosPost']));
}

if(isset($_POST["publicar"]) && $_POST["publicar"] == 'Actualizar'){
    //la funcion clean data nos ayuda a reducir alguna inyeccion de  scripts js vease en Controlador/functions.php
    $title = clean_data($_POST['tituloPost']);
    $descripcion = clean_data($_POST['descripcionPost']);
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
?>
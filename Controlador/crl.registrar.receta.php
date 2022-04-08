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

    $fileTmpPath = $imagenPost['tmp_name'];
    $fileName = $imagenPost['name'];
    $fileSize = $imagenPost['size'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5($fileName) . '.' . $fileExtension;
    $uploadFileDir = 'Media/recipe/';

    if(!typeOfPhoto($fileExtension)){
        $errors['profilePhoto'] = 'Solo puedes subir archivos .jpg, .gif y .png';
    }
    elseif($fileSize > 2097152){
        $errors['profilePhoto'] = 'Tamaño maximo para el archivo es de 2MB';
    }
    else{
        if($errors == []){
            if(!is_dir("Media/recipe/")){
                mkdir("Media/recipe/");
            }
            $dest_path = $uploadFileDir . $newFileName;
            move_uploaded_file($fileTmpPath, $dest_path);
            $spanishDate = SpanishDate();
            $id_usuario = $_SESSION["user"];
            $receta = new Receta($tituloPost, $descripcionPost, $pasosPost, $dest_path,$spanishDate,$id_usuario);
            $receta->createReceta();
            header("Location: index.php");
        }
    }
    //session_start(); Este volado daba error asi que lo comentarie porque ya existe una sesion activa en el header :v
}
?>

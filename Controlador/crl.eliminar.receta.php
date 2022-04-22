<?php
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.user.php');
require_once ('Controlador/functions.php');

if(!(User::getUserRol($_SESSION["user"]) == 2)){
    header("Location: index.php");
}

$users = getUsers();
$rec = Rec::getAllRec();

$recId = isset($_GET['recetaid']) ? $_GET['recetaid'] : NULL;
$userId = isset($_GET['userid']) ? $_GET['userid'] : NULL;
deleteUserById($userId);

if(!empty($_POST['actualizar'])){
    if ($_POST['actualizar'] == 'Actualizar'){
        $_SESSION['idReceta'] = $_POST['recetaid'];
        header('Location: actualizar.php');
    }
}
?>
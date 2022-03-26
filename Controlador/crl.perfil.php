<?php

require_once "Controlador/crl.config.php";
require_once "Modelos/funciones.receta.php";
#logica para traer la info del perfil de usuario

session_start();
$id = $_SESSION["user"];

$recetas = Receta::getRecetaByUserId($id);

?>
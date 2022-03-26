<?php

//session_start();

require_once "Controlador/crl.config.php";
require_once "Modelos/funciones.receta.php";

if(isset($_GET["id"])){
    $recetas = [Receta::getRecetaById($_GET["id"])];
}else if(isset($_POST["search"])){
    $recetas = Receta::getRecetaByTitle($_POST["search"]);
}else{
    $recetas = Receta::getAllRecetas();
}
?>
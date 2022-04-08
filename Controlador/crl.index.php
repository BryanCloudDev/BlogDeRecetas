<?php
require_once "Controlador/crl.isuser.php";
require_once "Controlador/crl.config.php";
require_once "Modelos/funciones.receta.php";

$recetas = Receta::getAllRecetas();
?>
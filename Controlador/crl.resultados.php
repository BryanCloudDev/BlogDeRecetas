<?php

session_start();

require_once "crl.config.php";
require_once "../Modelos/funciones.receta.php";

$resultadoGlobal = Receta::getAllRecetas();
#logica para traer resultados de busqueda de recetas

?>
<?php

session_start();

require_once "crl.config.php";
require_once "../Modelos/funciones.receta.php";

#instanciamiento de la funcion sin parametros para mostrar todas las recetas

$resultadoGlobal = Receta::getAllRecetas();


?>
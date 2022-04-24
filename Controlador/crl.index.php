<?php session_start();
require_once ('Modelos/funciones.receta.php');
$recetas = Rec::getAllRec();
?>
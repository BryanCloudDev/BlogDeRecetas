<?php
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');

#logica para traer la consulta y mostrar la receta consultada en pantalla 

if(isset($_GET["id"])){

    $rec = Rec::getRec($_GET["id"]);

}else{
    header("Location: index.php");
}

$steps = explode('.',$rec['pasosPost']);


?>
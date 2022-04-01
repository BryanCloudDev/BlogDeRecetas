<?php

require_once "./Controlador/crl.isuser.php";
require_once "./Controlador/crl.config.php";
require_once "../Modelos/funciones.receta.php";



    if(isset($_POST["idReceta"]))
        {
            ["idReceta" => $idReceta] = $_POST;
        }
    else
        {
            header("Location: index.php");
        }

$delete_receta = Receta::deleteById($_POST);

echo $delete_receta;

?>
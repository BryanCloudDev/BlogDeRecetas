<?php

// require_once "./crl.isuser.php";
require_once "./crl.config.php";
require_once "../Modelos/funciones.receta.php";


$conn = Conexion::conn();
$query = "SELECT idReceta FROM receta WHERE idReceta = 2";
$stmt = $conn->prepare($query);
$stmt->execute();

$resultados = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt->closeCursor();

    if(isset($resultados))
        {
            $delete_receta = Receta::deleteById($resultados["idReceta"]);
        }
    else
        {
            header("Location: index.php");
        }

?>
<?php
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.user.php');

if(!(Usuarios::getUserRolById($_SESSION["user"]) == 2)){
    header("Location: index.php");
}

function deleteReceta($id,$recetas){
    if($recetas == []){
        return "No hay recetas de momento";
    }
    if(isset($id)){
        DeleteImageReceta($id);
        Receta::deleteById($id);
        header("Location: dashboard.php");
    }
}

function getUsers(){
    $conn = Conexion::conn();
    $query = "SELECT * FROM usuarios";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $resultados;
}

function deleteUserById($id)
{
    if(isset($id))
        {
            DeleteImageUser($id);
            Usuarios::deleteUserById($id);
            header("Location: dashboard.php");
        }
}

$users = getUsers();
$recetas = Receta::getAllRecetas();

$recetaId = isset($_GET['recetaid']) ? $_GET['recetaid'] : NULL;
$userId = isset($_GET['userid']) ? $_GET['userid'] : NULL;
deleteUserById($userId);

?>
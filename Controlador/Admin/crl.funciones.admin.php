<?php
session_start();
require_once ('Modelos/funciones.registro.php');
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.user.php');

if(!(Usuarios::getUserRolById($_SESSION["user"]) == 2)){
    header("Location: index.php");
}


$conn = Conexion::conn();
$query = "SELECT username FROM usuarios";  
$statement = $conn->prepare($query);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>
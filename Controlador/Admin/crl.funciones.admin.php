<?php
session_start();
require_once ('Modelos/funciones.registro.php');
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.user.php');

if(!(User::getUserRol($_SESSION["user"]) == 2)){
    header("Location: index.php");
}


$conn = Connection::conn();
$query = "SELECT username FROM usuarios";  
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>
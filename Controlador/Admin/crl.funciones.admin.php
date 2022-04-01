<?php
session_start();

require_once('./Modelos/funciones.registro.php');

$conn = Conexion::conn();
$query = "SELECT username FROM usuarios";  
$statement = $conn->prepare($query);
$statement->execute();
$resultado = $statement->fetchAll(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>
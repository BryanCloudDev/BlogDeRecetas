<?php
require_once ('Controlador/crl.isuser.php');
require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.user.php');

#logica para traer la info del perfil de usuario

$id = $_SESSION["user"];

$rec = Rec::getRecByUserId($id);
$username = User::getUsername($id);
$name = User::getUserFirstName($id);
$email = User::GetUserEmail($id);

?>
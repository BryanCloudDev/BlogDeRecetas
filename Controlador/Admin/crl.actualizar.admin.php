<?php
//require_once "./Controlador/crl.isuser.php";
require_once "./Controlador/crl.config.php";
require_once "./Modelos/funciones.actualizarUsuarios.php";
require_once "./Modelos/funciones.referer.php";

#tu backend ira aca

if(isset($_POST["idUsuario"])){
    $usuario = Usuario::updateUsuarioById($_POST["idUsuario"]);
}else if(isset($_POST["publicar"])){
    
    ["nombre" => $nombre,
     "usename" => $username,
     "correo" => $correo,
     "actualizarId" => $idUsuario] = $_POST;

    ["imagenUsuario" => $imagenPost] = $_FILES;
    
    $imagenLast = Usuario::getImagePathById($id);
    if($imagenPost && $imagenPost["tmp_name"]){
       unlink($imagenLast);
       rename($imagenLast, dirname($imagenLast) . "/" . $imagenPost["name"]);
       move_uploaded_file($imagenPost["tmp_name"], $imagenLast);
    }

    $uploadReceta = new Usuario($title,$descripcion,$pasosPost,$imagenLast,null,null);
    $uploadReceta->updateUsuarioById($id);
    header("Location: index.php");
}
else{
    header("Location: index.php");
}

?>
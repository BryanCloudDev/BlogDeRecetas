<?php

require_once "./crl.isuser.php";
require_once "./crl.config.php";
require_once "../Modelos/funciones.user.php";

function deleteUserById($id)
    { 
    if(isset($id))
        {
            $delete_usuario = Usuarios::deleteUserById($id);
        }
  
    }

?>
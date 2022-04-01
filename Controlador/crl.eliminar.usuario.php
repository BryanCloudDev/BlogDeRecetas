<?php

require_once "./crl.isuser.php";
require_once "./crl.config.php";
require_once "../Modelos/funciones.user.php";

function deleteUserById($id)
    {   

# establece la conexion con la base de datos
        $conn = Conexion::conn();

# aqui establecemos la consulta
        $query = "SELECT idUsuario FROM usuarios WHERE idUsuario = $id";
        $stmt = $conn->prepare($query);
        $stmt->execute();

# aqui se guarda la consulta
        $resultados = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->closeCursor();

# se evalua si la variable resultados tiene datos si es asi usa la funcion adentro del if, si no, re dirige al header
    if(isset($resultados))
        {
            $delete_usuario = Usuarios::deleteUserById($resultados["idUsuario"]);
        }
    else
        {
            header("Location: index.php");
        }

    }

?>
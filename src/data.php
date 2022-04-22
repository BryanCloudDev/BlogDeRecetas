<?php
require_once('./Controlador/crl.config.php');

class User{
    static public function existsEmail(string $email) : int{
        $conn = Connection::conn();
        $statement = $conn->prepare(
            "SELECT COUNT(correo) from usuarios WHERE correo = :email"
        );
        $statement->execute([
            ':email' => $email
        ]);
        $result = $statement->fetch(PDO::FETCH_COLUMN);
        $statement->closeCursor();
        $statement = null;
        return $result;
    }

    static public function getUsername(int $id) : string{
        $conn = Connection::conn();
        $query = "SELECT username FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["username"];
    }
    static public function getUserImagePath(int $id) : string{
        $conn = Connection::conn();
        $query = "SELECT imagenUsuario FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["imagenUsuario"];
    }
    static public function getUserRol(int $id) :int{
        $conn = Connection::conn();
        $query = "SELECT rol FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["rol"];
    }
    static public function deleteUser($id)
    {
        $conn = Connection::conn();
        $query = "DELETE FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->closeCursor();
    }
}

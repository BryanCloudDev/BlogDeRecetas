<?php 
require_once('./Controlador/crl.config.php');

$conn = Conexion::conn();
#clase que modifica usuarios
class Usuarios
{
    #propiedades necesarias
    public string $nombre;
    public string $username;
    public string $password;
    public string $correo;
    public string $imagen;
    public object $db;

    public function __construct($nombre,$username,$password,$correo,$imagen)
    {
        global $conn;
        $this->nombre = $nombre;
        $this->username = $username;
        $this->password = $password;
        $this->correo = $correo;
        $this->imagen = $imagen;
        $this->db = $conn;
    }

    #funcion que crea usuarios

    public function makeUser(){

        $query = "INSERT INTO usuarios (nombre, username, password, correo, imagenUsuario) 
                VALUES(:nombre, :username, :password, :correo, :imagenUsuario)";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(":nombre", $this->nombre);
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":password", $this->password);
        $statement->bindValue(":correo", $this->correo);
        $statement->bindValue(":imagenUsuario", $this->imagen);

        $statement->execute();
        $statement->closeCursor();

    }

    #funcion que obtiene usuarios

    static public function isUser($username,$password){
        global $conn;
        $query = "SELECT * FROM usuarios WHERE username = :username AND password = :password";  
        $statement = $conn->prepare($query);
        $statement->bindValue(":username", $username);     
        $statement->bindValue(":password", $password);
        $statement->execute();
        
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $resultado;
    }

    static public function getUsernameById($id){
        global $conn;
        $query = "SELECT username FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["username"];
    }

    static public function getUserImagePathById($id){
        global $conn;
        $query = "SELECT imagenUsuario FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["imagenUsuario"];
    }

    static public function getUserRolById($id){
        global $conn;
        $query = "SELECT rol FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["rol"];
    }

    static public function deleteUserById($id)
        {
            global $conn;
            $query = "DELETE FROM usuarios WHERE idUsuario = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $stmt->closeCursor();
        }

    static public function getUserNombreById($id)
        {
        global $conn;
        $query = "SELECT nombre FROM usuarios WHERE idUsuario = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultado['nombre'];
        }

    static public function getUserEmailById($id)
        {
        global $conn;
        $query = "SELECT correo FROM usuarios WHERE idUsuario = :id";
        $statement = $conn->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $resultado = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $resultado["correo"];
        }

}

function DeleteImageUser($id){
    $recetaImage = Usuarios::getUserImagePathById($id);
    unlink($recetaImage);
    $recetaImage = explode("/",$recetaImage);
    array_pop($recetaImage);
    $recetaImage = implode("/",$recetaImage);
    rmdir($recetaImage);
}
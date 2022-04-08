<?php 
require_once ('Controlador/crl.config.php');

$conn = Conexion::conn();
#clase que modifica usuarios
class Usuarios
{
    #propiedades necesarias
    public string $nombre;
    public string $token;
    public string $username;
    public string $password;
    public string $correo;
    public string $imagen;
    public object $db;

    public function __construct($token,$nombre,$username,$password,$correo,$imagen)
    {
        global $conn;
        $this->nombre = $nombre;
        $this->token = $token;
        $this->username = $username;
        $this->password = $password;
        $this->correo = $correo;
        $this->imagen = $imagen;
        $this->db = $conn;
    }

    #funcion que crea usuarios

    public function makeUser(){

        $query = "INSERT INTO usuarios (token, nombre, username, password, correo, imagenUsuario) 
                VALUES(:token, :nombre, :username, :password, :correo, :imagenUsuario)";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(":nombre", $this->nombre);
        $statement->bindValue(":token", $this->token);
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
    
    static function encPass($password){
        $password = password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);
        return $password;
    }

    static public function existsUser($username){
        global $conn;
        $stmt = $conn->prepare(
            "SELECT COUNT(username) from usuarios WHERE username = :username"
        );
        $stmt->execute([
            ':username' => $username
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }

    static public function existsEmail($email){
        global $conn;
        $stmt = $conn->prepare(
            "SELECT COUNT(correo) from usuarios WHERE correo = :correo"
        );
        $stmt->execute([
            ':correo' => $email
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
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
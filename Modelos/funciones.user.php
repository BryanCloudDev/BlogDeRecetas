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

    public function __construct($token,$nombre,$apellido,$username,$password,$correo,$imagen)
    {
        global $conn;
        $this->token = $token;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->username = $username;
        $this->password = $password;
        $this->correo = $correo;
        $this->imagen = $imagen;
        $this->db = $conn;
    }

    #funcion que crea usuarios
    public function makeUser(){

        $query = "INSERT INTO usuarios (token, nombre, apellido, username, password, correo, imagenUsuario) 
                VALUES(:token, :nombre, :apellido, :username, :password, :correo, :imagenUsuario)";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(":token", $this->token);
        $statement->bindValue(":nombre", $this->nombre);
        $statement->bindValue(":apellido", $this->apellido);
        $statement->bindValue(":username", $this->username);
        $statement->bindValue(":password", $this->password);
        $statement->bindValue(":correo", $this->correo);
        $statement->bindValue(":imagenUsuario", $this->imagen);
        $statement->execute();
        $statement->closeCursor();

    }

    #Funcion para actualizar usuarios
    #AUN EN PROCESO :v
    // static function updateUsuarioById($idUsuario)
    //         {
    //             $query = "UPDATE usuario SET nombre = :nombre, username = :username, 
    //                     password = :password, correo = :correo, imagenUsuario = :imagenUsuario WHERE idUsuario = :idUsuario";
    //             $statement = $this->db->prepare($query);
    //             $statement->bindValue(":usuario",$this->usuario);
    //             $statement->bindValue(":username",$this->username);
    //             $statement->bindValue(":password",$this->password);
    //             $statement->bindValue(":correo",$this->correo);
    //             $statement->bindValue(":imagenUsuario",$this->imagenUsuario);
    //             $statement->bindValue(":idUsuario",$idUsuario);
                
    //             $statement->execute();
    //             $statement->closeCursor();
    //         }
            

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

    //metodo para encriptar la contra con un costo de 10
    //el costo es la cantidad de veces que se palica el mismo algoritmo a la contra
    static function encPass($password){
        $password = password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);
        return $password;
    }

    //metodo para verificar si ya hay un usuario que use el mismo nombre de usuario
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

    //metodo para verificar si ya hay un usuario que use el mismo correo
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

    //metodo para verificar si hay un usuatio con el corre introducido
    static function verifyUserEmail($value){
        global $conn;
        $stmt = $conn->prepare(
            "SELECT COUNT(*) FROM usuarios WHERE correo = :email OR username = :username;"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }
    //metodo para obtener contra de usuario
    static function getUserPassword($value){
        global $conn;
        $stmt = $conn->prepare(
            "SELECT password FROM usuarios WHERE correo = :email OR username = :username;"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }
    //metodo para traernos toda la info del usuario
    static function getUserbyEmailUser($value){
        global $conn;
        $stmt = $conn->prepare(
            "SELECT * FROM usuarios WHERE correo = :email OR username = :username;"
        );
        $stmt->execute([
            ':email' => $value,
            ':username' => $value
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
        return $result;
    }
}
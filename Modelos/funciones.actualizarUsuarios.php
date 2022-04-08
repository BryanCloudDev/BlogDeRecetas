<?php
require_once ('Controlador/crl.config.php');

$conn = Conexion::conn();
class Usuario
    {

#Declaracion de variables dentro de la clase tambien llamado atributos de clase

        public string $nombre;
        public string $username;
        public string $password;
        public string $correo;
        public string $imagenUsuario;
        public ?int $idUsuario;
        public object $db;

#Declaracion del metodo constructor para pasar argumentos

        public function __construct($nombre,$username,$password,$correo,$imagenUsuario,$idUsuario)
            {
                global $conn;
                $this->nombre = $nombre;
                $this->username = $username;
                $this->password = $password;
                $this->correo = $correo;
                $this->imagenUsuario = $imagenUsuario;
                $this->idUsuario = $idUsuario;
                $this->db = $conn;
            }

#Este bloque actualiza una receta buscada por ID dentro de la base de datos

        public function updateUsuarioById($idUsuario)
            {
                $query = "UPDATE usuario SET nombre = :nombre, username = :username, 
                        password = :password, correo = :correo, imagenUsuario = :imagenUsuario WHERE idUsuario = :idUsuario";
                $statement = $this->db->prepare($query);
                $statement->bindValue(":usuario",$this->usuario);
                $statement->bindValue(":username",$this->username);
                $statement->bindValue(":password",$this->password);
                $statement->bindValue(":correo",$this->correo);
                $statement->bindValue(":imagenUsuario",$this->imagenUsuario);
                $statement->bindValue(":idUsuario",$idUsuario);
                
                $statement->execute();
                $statement->closeCursor();
            }

        public static function getImagePathById($idUsuario){
            global $conn;
            $query = "SELECT imagenPost FROM usuario WHERE idUsuario = :idUsuario";
            $statement = $conn->prepare($query);
            $statement->bindValue(":idUsuario",$idUsuario);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $result["imagenPost"];
        }
    }


#Devuelve un nuevo directorio con nombre aleatorio

function randomDIR($n)

    {

        $options = "abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $result = "";
        for($i = 0; $i < $n; $i++)
        {
            $random = rand(0,strlen($options) - 1);
            $result .= $options[$random];
        }

        return $result;
    }

function DeleteImageUsuario($idUsuario){
    $usuarioImage = Usuario::getImagePathById($idUsuario);
    unlink($usuarioImage);
    $usuarioImage = explode("/",$usuarioImage);
    array_pop($usuarioImage);
    $usuarioImage = implode("/",$usuarioImage);
    rmdir($usuarioImage);
}
<?php 
 
$conn = Conexion::conn();
#clase que modifica usuarios
class Usuarios{
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

        $query = "INSERT INTO usuarios (rol, nombre, username, password, correo, imagenUsuario) 
                VALUES(:rol, :nombre, :username, :password, :correo, :imagenUsuario)";
        
        $statement = $this->db->prepare($query);
        $statement->bindValue(":rol", 1);
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

}
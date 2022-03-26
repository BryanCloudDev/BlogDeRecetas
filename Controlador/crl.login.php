<?php
//session_start();
require_once "Controlador/crl.config.php";
require_once "Modelos/funciones.user.php";

if(isset($_POST["../Vista/login.php"]))
{
    echo "page reached";
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        $message = '<label>Se requieren todos los campos</label>';
    }
    else
    {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                'username'     =>     $_POST["username"],
                'password'     =>     $_POST["password"]
            )
        );
        $count = $statement->rowCount();
        
        if($count > 0)
        {
            $_SESSION["username"] = $_POST["username"];
            echo "FUNCIONA PERRO";
            //header("location: ../Controlador/ctl.index.php");
        }
        else
        {
            $message = '<label>Algo valio pija xd</label>';
        }
    }
}

$noUser = false;

if(isset($_POST["username"]) && isset($_POST["password"])){
    
    ["username" => $username,
    "password" => $password] = $_POST;

    $user = Usuarios::isUser($username,$password);

    if(!$user){
        $noUser = true;
    }else{
        session_start();
        $_SESSION["user"] = $user["idUsuario"];
        header("Location: index.php");
    }
}

?>
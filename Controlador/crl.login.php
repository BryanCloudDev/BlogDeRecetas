<?php

require "./Controlador/crl.config.php";

session_start();
if(isset($_POST["../Vista/login.php"]))
{
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        $message = '<label>All fields are required</label>';
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
            readdir("location:../Controlador/login_success.php");
        }
        else
        {
            $message = '<label>Wrong Data</label>';
        }
    }
}

?>
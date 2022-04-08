<?php
session_start();

require_once ('Controlador/crl.config.php');
require_once ('Modelos/funciones.user.php');
require_once ('Controlador/functions.php');

$errors = [];

if(isset($_POST['submit'])){

    $userEmail = clean_data($_POST['username']);
    $password = clean_data($_POST['password']);

    if(!empty($userEmail) && !empty($password)){

        if(Usuarios::verifyUserEmail($userEmail) == 1){
            $hash = Usuarios::verifyUserPassword($userEmail);

            if(password_verify($password,$hash)){
                $user = Usuarios::getUserbyEmailUser($userEmail);
                $_SESSION['user'] =  $user['idUsuario'];
                header('Location: index.php');
            }
            else{
                $errors['errors'] = 'Incorrect username or password';
            }
        }
        else{
            $errors['errors'] = 'Incorrect username or password';
        }
    }
    else{
        $errors['errors'] = 'Todos los campos son requeridos';
    }
}

//por lo que lei es bueno dejar los controladores sin cerrar para evitar XSS
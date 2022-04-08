<?php
// require_once ('Controlador/crl.config.php');
require_once ('Controlador/functions.php');
require_once ('Modelos/funciones.registro.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.user.php');

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$errors = [];

if(isset($_POST['submit'])){
    $name = clean_data($_POST['nombre']);
    $lastName = clean_data($_POST['apellido']);
    $username = clean_data($_POST['username']);
    $email = clean_data($_POST['correo']);
    $password = clean_data($_POST['password']);

    //verificar nombre
    if(strlen($name) >= 4 && strlen($name) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$name)){
            $errors['name'] = 'Porfavor ingresa un nombre valido';
        }
    }
    else{
        $errors['name'] = 'El nombre debe de ser entre 4 y 20 caracteres';
    }

    //verificar appellido
    if(strlen($name) >= 4 && strlen($name) <= 20){
        $regExp = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/';
        if(!preg_match($regExp,$name)){
            $errors['lastName'] = 'Porfavor ingresa un apellido valido';
        }
    }
    else{
        $errors['lastName'] = 'El apellido debe de ser entre 4 y 20 caracteres';
    }

    // verificar correo
    if(strlen($email) >= 10 && strlen($email) <= 50){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Pordavor ingresa un correo valido';
        }
        if(Usuarios::existsEmail($email) > 0){
            $errors['email'] = 'El correo ya esta en uso. <a href="login.php">Iniciar sesion?<a>';
        }
    }
    else{
        $errors['email'] = 'Porfavor ingresa un correo valido';
    }

    //verficar contraseña
    if(strlen($password) >= 8 && strlen($password) <= 30){
        $regExp = '/^[a-zA-Z0-9-_%*?!@#$]+$/';
        if(!preg_match($regExp,$password)){
            $errors['password'] = 'Caracteres especiales permitidos: -_%*?!@#$';
        }
    }
    else{
        $errors['password'] = 'Usa una contraseña entre 8 y 30 caracteres';
    }

    //verificar usuario
    if(strlen($username) >= 4 && strlen($username) <= 10){
        $regExp = '/^[a-zA-Z0-9_]+$/';
        if(!preg_match($regExp,$password)){
            $errors['username'] = 'Nombre de usuario solo puede contener numeros y guion bajo "_"';
        }
        if(Usuarios::existsUser($username) > 0){
            $errors['username'] = 'El nombre de usuario ya ha sido tomado, selecciona otro';
        }
    }
    else{
        $errors['username'] = 'El nombre de usuario debe de ser entre 4 y 10 caracteres';
    }

    //verificando el tipo de archivo
    if(isset($_FILES['user_image']) && $_FILES['user_image']['error'] === UPLOAD_ERR_OK){
        $fileTmpPath = $_FILES['user_image']['tmp_name'];
        $fileName = $_FILES['user_image']['name'];
        $fileSize = $_FILES['user_image']['size'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5($fileName) . '.' . $fileExtension;
        $uploadFileDir = 'Media/profilePhoto/';

        if(!typeOfPhoto($fileExtension)){
            $errors['profilePhoto'] = 'Solo puedes subir archivos .jpg, .gif y .png';
        }
        elseif($fileSize > 2097152){
            $errors['profilePhoto'] = 'Tamaño maximo para el archivo es de 2MB';
        }
        else{
            if($errors == []){

                if(!is_dir("Media/")){
                    mkdir("Media/");
                    mkdir("Media/profilePhoto/");
                }

                $dest_path = $uploadFileDir . $newFileName;
                move_uploaded_file($fileTmpPath, $dest_path);
            }
        }
    }
    else{
        if($errors == []){
            $dest_path = 'https://i.imgur.com/GvUsGWz.jpg';
        }
    }
    if($errors == []){
        $key = '5e83b87c6ff6b1cc4d941bf315281da1';
        $token = md5($email.$password.$key);
        $password = Usuarios::encPass($password);
        $username = strtolower($username);
        $user = new Usuarios($token,$name,$lastName,$username,$password,$email,$dest_path);
        $user->makeUser();

        header('Location: login.php');
    }
    var_dump($errors);
}

?>

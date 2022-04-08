<?php
// require_once ('Controlador/crl.config.php');
require_once ('Controlador/functions.php');
require_once ('Modelos/funciones.registro.php');
require_once ('Modelos/funciones.receta.php');
require_once ('Modelos/funciones.user.php');

//inicializamos un array vacio para almacenar los errores
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
    //no es obligatorio subir una foto de perfil
    if(isset($_FILES['user_image']) && $_FILES['user_image']['error'] === UPLOAD_ERR_OK){
        //para saber que es la funcion 'uploadImage()' revisar en Controlador/functions.php
        $dest_path = uploadImage($_FILES['user_image'],'Media/profilePhoto/',true);

        if(!$dest_path[1]){
            $errors['user_image'] = $dest_path[0];
        }
        else{
            $dest_path = $dest_path[0];
        }
    }
    //si no se sube se tomara esta ruta por defecto
    else{
        $dest_path = 'https://i.imgur.com/GvUsGWz.jpg';
    }
    //si no hay errores podemos crear el usuario
    if($errors == []){
        //key es una llave aleatoria solo para encriptar el texto plano usando md5
        $key = '5e83b87c6ff6b1cc4d941bf315281da1';
        //este token nos permitira validar a la hora de hacer cambios mas adelante
        $token = md5($email.$password.$key);
        //encriptamos la contraseña
        $password = Usuarios::encPass($password);
        //convertimos el nombre de usuario a minusculas para evitar problems por mayusculas
        $username = strtolower($username);
        $user = new Usuarios($token,$name,$lastName,$username,$password,$email,$dest_path);
        $user->makeUser();

        header('Location: login.php');
    }
}

//por lo que lei es bueno dejar los controladores sin cerrar para evitar XSS

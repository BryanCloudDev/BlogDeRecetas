<?php
    //traemos la clase de usuarios
    require('./Modelos/funciones.user.php');
    //verificamos que el usuario venga de la pagina dashboard de otra manera sera rdireccionado al index
    if($_SERVER['HTTP_REFERER'] == __DIR__ . 'dashboard.php'){
        //una vez este validado traemos en controlador que tiene la sesion del usuario
        //y comparamos para verificar que sea un admin
        require('./Controlador/crl.actualizar.php');
        //si lo es nos dejara actualzarla
        if(Usuarios::getUserRolById($_SESSION["user"]) == 2){
            require('./Vista/actualizar.view.php');
        }
        //si no nos mandara la index
        else{
            header('Location: index.php');
        }
    }
    else{
        header('Location: index.php');
    }
?>
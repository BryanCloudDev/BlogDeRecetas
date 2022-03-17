<?php
// Iniciamos Sesion

/*
 * Esta funcion (session_start) crea o devuelve una sesion previamente establecida, de haber una toma los manejadores guardados
 * a traves de los metodos POST o GET que se pasan a por medio de las cookies.
 * Este autoinicia una vez es llamado. Para terminar la sesion podemos usar la funcion session_unset() o session_destroy().
 * Para mas informacion consultar link
 * https://www.php.net/manual/en/function.session-start.php#:~:text=session_start()%20creates%20a%20session,and%20read%20session%20save%20handlers.
 * */
session_start();

/* Verificamos si el usuario esta loggeado, de no ser asi se redireccionara al login
 * Usamos la funcion isset para verificar si la sesion esta definidao "seteada", para mas informacion sobre el funcionamiento
 * anexo un link.
 * https://www.w3schools.com/php/func_var_isset.asp*/
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php require('./resources/header');?>

<h1 class="my-5">Holaaaaaa, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro Blog!.</h1>

</body>
</html>
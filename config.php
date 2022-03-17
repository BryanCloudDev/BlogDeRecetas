<?php
/* Estas seran las credenciales de nuestra base de datos con la cual estableceremos la conexion */
define('DB_SERVER', 'localhost'); //Nuestro servidor, como es local sera localhost
define('DB_USERNAME', 'root'); //Tenemos configurado el usuario como root
define('DB_PASSWORD', ''); //No hemos establecido una constrasena al usuario root por lo que podemos dejar el campo en blanco
define('DB_NAME', 'blogreceta'); //El nombre de nuestra base de datos

/* Establecemos la conexion a la base de datos pero tenemos un simple condicional para que en el caso
de no funcionar nos muestre el error
Hacemos uso de la funcion mysqli para intentar la conexion */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificamos la conexion, de ser falsa, es decir, no haber una, nos mostrara el error
if($mysqli === false){
    die("ERROR: No se pudo establecer una conexion. " . $mysqli->connect_error);
}
?>
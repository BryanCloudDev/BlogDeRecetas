<?php

require "Controlador/config.php";

        $tituloPost = $_POST['tituloPost'];
        $descripcionPost = $_POST ['descripcionPost'];
        $pasosPost = $_POST['pasosPost'];
        $imagenPost = $_POST['imagenPost'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Nueva Receta.</title>
</head>
<body>

<form name = "form" action = "receta.php" method = "post">

    Titulo de la Receta.<br>            <input type = "text" name = "tituloPost" required>      <br><br>
    Breve descripcion de la Receta.<br> <input type = "text" name = "descripcionPost" required> <br><br>
    Paso a Paso.<br>                    <input type = "text" name = "pasosPost" required>       <br><br>
                                        <input type = "submit" name = "Publicar.">              <br><br>
    Subir imagen del platillo. <br>     <input type = "file" name = "imagenPost" required>


</form>

</body>
</html>
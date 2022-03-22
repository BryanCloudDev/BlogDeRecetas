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

// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }

//comentado de momento para poder trabajar el header y poder ver el index

// ?>

<?php require('./resources/header.php');?>

<main class="main index">
    <div class="container">
        <?php for($i = 1;$i <= 5;$i++):?>
        <article class="post">
            <div class="imgContainer">
                <img src="https://www.paulinacocina.net/wp-content/uploads/2020/01/untitled-copy.jpg" alt="img">
            </div>
            <div class="texto">
                <h2><a href="./post?id=">Titulo de la receta</a></h2>
                <p>Publicado el 3 de Diciembre de 2021</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia eum rem excepturi iste. Alias, autem delectus eligendi repudiandae explicabo rerum dolorum error exercitationem, quisquam corrupti adipisci ratione ipsa vero distinctio.Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia eum rem excepturi iste. Alias, autem delectus eligendi repudiandae explicabo rerum dolorum error exercitationem, quisquam corrupti adipisci ratione ipsa vero distinctio... <a href="#">Seguir leyendo</a></p>
            </div>
        </article>
        <?php endfor;?>
    </div>
    <section class="paginacion">
        <ul>
            <li><a href="#">&lt;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">&gt;</a></li>
        </ul>
    </section>
</main>

<?php require('./resources/footer.php')?>
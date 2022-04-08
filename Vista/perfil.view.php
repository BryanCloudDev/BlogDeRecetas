<?php 
include_once 'rutas.php';
$rutaHeader;
$userImage = Usuarios::getUserImagePathById($_SESSION["user"]);
?>

<main class="main perfil">
    <div class="container">
        <section class="card">
            <div class="header">
                <div class="profileContainer">
                    <img src="<?= str_contains($userImage,"/") ? $userImage : "./Controlador/default/guest.webp" ?>" alt="foto de perfil">
                </div>
            </div>
            <div class="body">
                <table>
                <tr>
                    <td>Nombre</td>
                    <td><?= $nombre;?></td>
                </tr>
                <tr>
                    <td>Nombre de usuario</td>
                    <td><?= $username;?></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><?= $correo;?></td>
                </tr>
                </table>
            </div>
        </section>
        <section class="info">
            <h1>Posts creados por <?= $nombre?>:</h1>
            <h2><?php echo count($recetas) ?> <?php echo count($recetas) === 1 ? "post" : "posts" ?></h2>
        </section>
        <?php foreach($recetas as $receta): ?>
        <article class="post">
            <div class="imgContainer">
                <img src="<?= $receta["imagenPost"]; ?>" alt="Comida o algo">
            </div>
            <div class="texto">
                <h2><a href="receta.php?id=<?= $receta["idReceta"]; ?>"><?= $receta["tituloPost"]; ?></a></h2>
                <p class="date">Creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022"; ?></p>
                <p><?= $receta["descripcionPost"] ?></p>
            </div>
        </article>
        <?php endforeach; ?>
        <a class="newPost" href="registrar_receta.php">Crear Post <i class="button-crearReceta" aria-hidden="true"></i></a>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
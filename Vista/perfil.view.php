<?php require("./Vista/componentes/header.php");?>

<main class="main perfil">
    <div class="container">
        <section class="card">
            <div class="header">
                <div class="profileContainer">
                    <img src="<?= Usuarios::getUserImagePathById($_SESSION["user"]) ?>" alt="foto de perfil">
                </div>
            </div>
            <div class="body">
                <table>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo "test";?></td>
                </tr>
                <tr>
                    <td>Nombre de usuario</td>
                    <td><?php echo "test";?></td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td><?php echo "test";?></td>
                </tr>
                </table>
            </div>
        </section>
        <section>
            <h1>Posts creados por <?php //nombre de usuario?></h1>
            <span>Se han creado <?php echo count($recetas) ?> <?php echo count($recetas) === 1 ? "post" : "posts" ?></span>
        </section>
        <!-- <section class="post">
            <div class="imgContainer">
                <img src="<?php #$receta["imagenPost"] ?>" alt="Comida o algo">
            </div>
            <div class="texto">
                <h2><a href="./post?id="><?php #$receta["tituloPost"] ?></a></h2>
                <p>Publicado el 3 de Diciembre de 2021 </p>
                <p><?php #$receta["pasosPost"] ?></p>
            </div>
        </section> -->
        <!-- todos los posts hehcos por el usuario -->
        
        <?php foreach($recetas as $receta): ?>
            <article class="post">
                <div class="imgContainer">
                    <img src="<?= $receta["imagenPost"] ?>" alt="Comida o algo">
                </div>
                <div class="texto">
                    <h2><a href="index.php?id=<?= $receta["idReceta"] ?>"><?= $receta["tituloPost"] ?></a></h2>
                    <p>Este post fue creado el <?= $receta["fecha"] ?? "Miercoles 16 de Marzo de 2022" ?></p>
                    <p>Descripción : <?= $receta["descripcionPost"] ?></p>
                    <p><?= $receta["pasosPost"] ?></p>
                </div>
            </article>
        <?php endforeach ?>
        </article>
    </div>
</main>

<?php require("./Vista/componentes/footer.php"); ?>
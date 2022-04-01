<?php require("./Vista/componentes/header.php");?>
<main class="main dashboard">
    <div class="container">
        <section class="users">
            <h2>Usuarios</h2>
            <?php foreach($users as $user):?>
                <div class="row">
                <h2><?= $user['username']?></h2>
                <div class="links">
                    <?php if($user['idUsuario'] == $_SESSION["user"]):?>
                        <a class="disabled" href="">Eliminar</a>
                    <?php else:?>
                        <a href="dashboard.php?userid=<?= $user['idUsuario']?>">Eliminar</a>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach;?>
        </section>
        <section class="recipes">
            <h2>Recetas</h2>
            <?php if(deleteReceta($recetaId,$recetas) == "No hay recetas de momento"):?>
                <div class="row">
                    <h2 class="empty"><?= deleteReceta($recetaId,$recetas);?></h2>
                </div>
            <?php else:?>
            <?php foreach($recetas as $receta):?>
                <div class="row">
                    <h2><?= $receta['tituloPost']?></h2>
                    <div class="links">
                        <a href="dashboard.php?recetaid=<?= $receta['idReceta']?>">Eliminar</a>
                        <a href="actualizar.php?recetaid=<?= $receta['idReceta']?>">Actualizar</a>
                    </div>
                </div>
            <?php endforeach;?>
            <?php endif;?>
        </section>
    </div>
</main>
<?php require("./Vista/componentes/footer.php");?>
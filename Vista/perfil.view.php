<?php require("./Vista/componentes/header.php");?>

<main class="main perfil">
    <div class="container">
        <section class="card">
            <div class="header">
                <div class="profileContainer">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY2EKP-MTDTyv4CGl76i1hdceSUsocqwE-uA&usqp=CAU" alt="">
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
        </article>
    </div>
</main>

<?php require("./Vista/componentes/footer.php"); ?>
<?php require("./Vista/componentes/header.php");?>

<main class="main index">
    <div class="container">
        <?php for($i = 1;$i <= 5;$i++):?>
        <!--Ta bonito el for para generar contenido a mostrar! -->
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

<?php require("./Vista/componentes/footer.php"); ?>
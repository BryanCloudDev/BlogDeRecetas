<?php require("./Vista/componentes/header.php");?>

<!-- Tu codigo HTML va aca-->


<!--aqui la variable receta se manda a un foreach para que se pueda mostrar en pantalla dato por dato -->
<?php foreach($recetas as $receta): ?>
    <div>
        <div>
            <img src="<?php echo $receta["imagenPost"]?>">
        </div>
        <div>
        <h1><?php echo $receta['tituloPost']?></h1>
        <span>Este post fue creado el <?php echo $receta["fecha"]?> </span>
        </div>
        <p> <?php echo $receta["pasosPost"]?> </p>
        </div>
    </div>
<?php endforeach; ?>

<?php require("./Vista/componentes/footer.php"); ?>
<?php 
include_once 'rutas.php';
$rutaHeader;
?>

<main class="main crearReceta">
    <div class="container">
        <form name="form" action="actualizar.php" method="post" enctype="multipart/form-data">
            <div class="rowi">
                <h1>Actualizar receta</h1>
            </div>
            <div class="rowi">
                <label for="tituloPost">Titulo de la receta</label>
                <input type="text" name="tituloPost" id="tituloPost" required value="<?php $message = !isset($receta['tituloPost']) ? '' : $receta['tituloPost']; echo htmlspecialchars($message);?>">    
            </div>
            <div class="rowi">
                <label for="descripcionPost">Descripcion de la receta</label>
                <input type="text" name="descripcionPost" id="descripcionPost" required value="<?php $message =  !isset($receta['descripcionPost']) ? '' : $receta['descripcionPost']; echo htmlspecialchars($message);?>">
            </div>
            <div class="rowi">
                <label for="pasosPost">Pasos a seguir</label>
                <input class="itemsInput" type="text" name="pasosPost[]" id="pasosPost" value="<?php $paso = !empty($_POST['editarPaso']) ? $paso : ''; echo htmlspecialchars($paso);?>">
                <?php if(!empty($_POST['editarPaso'])):?>
                    <input type="hidden" name="idPaso" value="<?php  if(!empty($_POST['editarPaso'])){echo $idPaso;};?>">
                <?php endif;?>
                <input class="items Submit" type="submit" value="Agregar" name="agregar">
            </div>
            <div class="items">
                <ol>
                <?php foreach(Rec::getTemporalSteps() as $step):?>
                        <div class='pasoRow'>
                            <li><?= $step['pasos'];?></li>
                            <div class="editButtons">
                                <button type='submit' name='paso' value='<?= $step['id'];?>'>Borrar</button>
                                <button type='submit' name='editarPaso' value='<?= $step['id'];?>'>Editar</button>
                            </div>
                        </div>
                <?php endforeach;?>
                </ol>
            </div>
            <div class="rowi">
                <label for="pasosPost">Foto del platillo</label>
                <img src="<?= $receta["imagenPost"] ?>" alt="Imagen Ingresada" class="tiny_image">
                <input type="file" name="imagenPost">
            </div>
            <input type="hidden" name="actualizarId" value="<?= $_SESSION['idReceta']; ?>">
            <input type="submit" name="publicar" value="Actualizar">
        </form>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
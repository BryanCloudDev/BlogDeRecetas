<?php 
include_once 'rutas.php';
$rutaHeader;
?>

<main class="main crearReceta">
    <div class="container">
        <form name="form" action="registrar_receta.php" method="post" enctype="multipart/form-data">
            <div class="rowi">
                <h1>Crear receta</h1>
            </div>
            <div class="rowi">
                <label for="tituloPost">Titulo de la receta</label>
                <input type="text" name="tituloPost" id="tituloPost" value="<?php $message =  !isset($_POST['tituloPost']) ? '' : $_POST['tituloPost']; echo htmlspecialchars($message);?>" required>    
            </div>
            <div class="rowi">
                <label for="descripcionPost">Descripcion de la receta</label>
                <input type="text" name="descripcionPost" id="descripcionPost" value="<?php $message =  !isset($_POST['descripcionPost']) ? '' : $_POST['descripcionPost']; echo htmlspecialchars($message);?>" required>
            </div>
            <div class="rowi">
                <label for="pasosPost">Pasos a seguir</label>
                <input class="itemsInput" type="text" name="pasosPost[]" id="pasosPost">
                <input class="items Submit" type="submit" value="Agregar" name="agregar">
            </div>
            <div class="items">
                <ul>
                <?php
                    foreach(Receta::getTemporalSteps() as $step){
                        echo "<div class='pasoRow'><li>{$step['pasos']}</li><button type='submit' name='paso' value='{$step['id']}'>Borrar</button></div>";
                    }
                ?>
                </ul>
            </div>
            <div class="rowi">
                <label for="pasosPost">Foto del platillo</label>
                <input type="file" name="imagenPost">
            </div>
            <input type="submit" name="publicar" value="Publicar">
        </form>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
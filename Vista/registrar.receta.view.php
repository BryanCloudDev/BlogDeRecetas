<?php require_once "./Vista/componentes/header.php" ?>
<form name="form" action="registrar_receta.php" method="post" enctype="multipart/form-data">
    
    <div class="form-group-2">
        <label for="tituloPost">Titulo de la receta</label>
        <input type="text" name="tituloPost" id="tituloPost" required>    
    </div>
    <div class="form-group-2">
        <label for="descripcionPost">Breve descripcion de la receta</label>
        <input type="text" name="descripcionPost" id="descripcionPost" require>
    </div>
    <div class="form-group-2">
        <label for="pasosPost">Paso a Paso</label>
        <textarea name="pasosPost" id="pasosPost" required></textarea>            
    </div>
    <div class="form-group-2">
        <input type="file" name="imagenPost">
    </div>
    
    <input type="submit" name="Publicar">
    
</form>
<?php require_once "./Vista/componentes/footer.php" ?>
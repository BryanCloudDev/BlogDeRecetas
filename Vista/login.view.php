<?php 
include_once 'rutas.php';
$rutaHeader;
?>

<main class="main login">
    <div class="container">
        <div class="texto">
            <h1>Login</h1>
            <p>Por favor rellena los campos para iniciar sesion.</p>
        </div>
        <form action="login.php" method="post" class="formLogin">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input id="usuario"type="text" name="username" class="form-control" placeholder="MiUsuario">
                <?php if($noUser): ?>
                    <span>Nombre de usuario no encontrado</span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="*******">
                <?php if($noUser): ?>
                    <span>Contraseña de usuario no encontrada</span>
                <?php endif ?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Aun no tienes una cuenta?</p>
            <a href="./registro_usuario.php">Crea una ahora</a>
        </form>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
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
                <input id="usuario"type="text" name="username" class="form-control" placeholder="MiUsuario" value="<?php if($errors == []){echo htmlspecialchars('');}else{echo htmlspecialchars($userEmail);};?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="*******" value="<?php if($errors == []){echo htmlspecialchars('');}else{echo htmlspecialchars($password);};?>">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Aun no tienes una cuenta?</p>
            <a href="./registro_usuario.php">Crea una ahora</a>
        </form>
        <?php if($errors != []):?>
            <div class="error">
                <ul>
                <?php foreach($errors as $error):?>
                    <li><?= $error;?></li>
                <?php endforeach;?>
                </ul>
            </div>
        <?php endif;?>
    </div>
</main>
<?php 
require_once realpath('Vista/componentes/footer.php');
?>
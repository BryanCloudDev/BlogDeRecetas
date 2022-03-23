<?php require("./Vista/componentes/header.php");?>

<main class="main login">
    <div class="container">
        <div class="texto">
            <h1>Login</h1>
            <p>Por favor rellena los campos para iniciar sesion.</p>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formLogin">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input id="usuario"type="text" name="username" class="form-control" placeholder="MiUsuario">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="*******">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Aun no tienes una cuenta?</p>
            <a href="./registro_usuario.php">Crea una ahora</a>
        </form>
    </div>
</main>

<?php require("./Vista/componentes/footer.php") ?>
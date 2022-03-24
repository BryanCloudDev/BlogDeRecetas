<?php require("./Vista/componentes/header.php"); ?>

<main class="main register">
    <div class="container">
        <div class="texto">
            <h1>Registrate</h1>
            <p>Por favor rellena los campos para poder registrarte, es gratis.</p>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formLogin">
            <div class="form-group">
                <label for="usuario">Nombre</label>
                <input id="usuario" type="text" name="name" class="form-control" placeholder="John Doe">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input id="usuario" type="text" name="username" class="form-control" placeholder="MiUsuario01">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label for="usuario">Correo</label>
                <input id="usuario" type="text" name="email" class="form-control" placeholder="micorreo@micorreo.com">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" class="form-control" placeholder="********">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label for="foto">Subir foto de perfil</label>
                <div class="custom-input-file">
                    <input type="file" id="foto" class="input-file">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Sign Up">
            </div>
        </form>
    </div>
</main>

<?php require("./Vista/componentes/footer.php"); ?>
<?php
// Agregamos los archivos que usaremos luego
require_once "config.php";

// Definimos las variables y las inicializamos vacias.
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Aqui procesamos los datos una vez el formulario es enviado (Submit)

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor agregar un usuario.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Nombres de usuario solo pueden contener letras, numeros y guiones.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            /*
             * Con la funcion "bind_param" preparamos el query del SQL que luego le pasara los parametros
             * a la base de datos.
             * */
            $stmt->bind_param("s", $param_username);

            // Preparamos los parametros
            $param_username = trim($_POST["username"]);

            // Ejecutamos el parametro preparado
            if($stmt->execute()){
                // Almacenamos el resultado
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "Este usuario ya existe ☹️";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo sucedio mal, intenta de nuevo.";
            }

            // Cerramos el argumento
            $stmt->close();
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor introduce una constrasena";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contrasena debe de contener al menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirma tu contrasena.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Las constrasenas no son identicas.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div>
</body>
</html>
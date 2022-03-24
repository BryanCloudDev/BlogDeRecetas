<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- estilos de bootstrap y JS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--icono-->
    <link rel="shortcut icon" href="https://i.imgur.com/DlP06U2.png" type="image/x-icon">
    <!-- libreria de iconos -->
    <script src="https://use.fontawesome.com/d034c4f984.js"></script>
    <!-- link de los tipo de letra usada -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Sriracha&display=swap" rel="stylesheet">
    <!-- reset de estilos del navegador -->
    <link rel="stylesheet" href="./Vista/componentes/styles/normalize.css">
    <!-- links de estilos css del proyecto -->
    <link rel="stylesheet" href="./Vista/componentes/styles/styles.css">
    <!-- titulo -->
    <title>Blog de recetas - Landing</title>
</head>
<body>
    <!-- contenedor general de la pagina web -->
    <div class="wrap">
        <!-- header -->
    <header class="header">
        <!-- contenedor principal -->
    <div class="container">
        <div class="logo">
            <a href="./index.php">Recetas en 5 minutos</a>
        </div>
        <!-- formulario de busqueda -->
        <form action="" method="GET">
                <input type="search" name="search" placeholder="Buscar...">
        </form>
        <!-- contenedor de los links -->
        <div class="links">
            <div class="imgContainer">
                <a href="./perfil.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY2EKP-MTDTyv4CGl76i1hdceSUsocqwE-uA&usqp=CAU" alt="Foto de perfil"></a>
            </div>
            <p>Hola <?php //echo $_POST["nombre"]; ?>!</p>
            <a href="./Controlador/crl.logout.php">Cerrar sesion</a>
        </div>
    </div>
    </header>
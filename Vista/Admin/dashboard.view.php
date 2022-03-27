<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body style="background-color:aquamarine;">
    <header class="page-header">
        <style>
    header.page-header {
    background: no-repeat left/cover url(https://brandsitesplatform-res.cloudinary.com/image/fetch/w_1540,c_scale,q_auto:eco,f_auto,fl_lossy,dpr_1.0,e_sharpen:85/https://assets.brandplatform.generalmills.com%2F-%2Fmedia%2FProject%2FGMI%2Foldelpaso%2Foldelpaso-us%2FRecipes%2Feasy-shredded-chicken-tacos.png%3Fw%3D1100%26rev%3D6644262a781f454fa99fff52f40312b0%201540w);
    display: flex;
    height: 120px;
    min-width: 120px;
    align-items: center;
    color: #fff;
    text-shadow: #000 0 0 .2em;
}

header.page-header > h1 {
    font: bold calc(1em + 2 * (100vw - 120px) / 100) 'Dancing Script', cursive,
        fantasy;
    margin: 2%;
}

main {
    font: 1rem 'Fira Sans', sans-serif;
}
</style>
        <!-- La siguiente linea necesita mejorarse y/o completarse -->
        <h1>Admin dashboard</h1>
    </header>
    <style>
    body {
  font-family: "Helvetica", Sans-Serif;
  background-image: url("http://sfwallpaper.com/images/background-image-for-website-5.jpg");
}
    </style>
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
<!--
            <div class="navbar nav_title" style="border: 0;">
                <a href="1.html" class="site_title">Voy a dejar esto por aquí por si me sirve después</a>
            </div>

            <div class="profile">
                img_2 
                <div class="profile_pic">
                    <img src="https://scontent-ort2-2.xx.fbcdn.net/v/t39.30808-6/277094461_704707294244512_2713239271986007966_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=a26aad&_nc_ohc=hrQTpfZzTjIAX9Sy2kg&_nc_oc=AQmFeP2jzAtAWOKqP7GPYhrsv2WcgtIHj-Hu7Fgp5OcdqbLh85yiLlCw8lMkyy0uen8&_nc_ht=scontent-ort2-2.xx&oh=00_AT8-aJsZwErP6x4z-107Ij5wuIK3711OcH1vB8O0xO8HEA&oe=62442995" alt="..." class="float-right" width="304" height="236">
                </div>
                <div class="profile_info">
                    <span>Admin area</span>
                    <h2>Admin</h2>
                </div>
            </div>
        -->
            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                <div class="menu_section">
                    <h2><strong>Ajustes</strong></h2>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-home"></i> <strong>Eliminar usuario </strong><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="2.html"><button><strong>Eliminar usuario</strong></button></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-edit"></i><strong> Crear post </strong><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="3.html"><button><strong>Crear post</strong></button></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-desktop"></i><strong> Comentar post </strong><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="4.html"><button><strong>Comentar post</strong></button></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-table"></i> <strong>Eliminar post </strong> <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="5.html"><button><strong>Eliminar post</strong></button></a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-bar-chart-o"></i><strong> Ajustes 4 </strong><span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="6.html">Chart JS</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>Aquí se puede colocar algún ecabezado</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-bug"></i> Modificar esto <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="6.html">Ajustes5</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-windows"></i> Ajustes6 <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="page_404.html">404 Error</a></li>
                                <li><a href="page_500.html">500 Error</a></li>
                                <li><a href="coming_soon.html">Coming Soon</a></li>
                                <li><a href="plain_page.html">Plain Page</a></li>
                                <li><a href="login.html">Login Page</a></li>
                                <li><a href="sign_up.html">SignUp Page</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

<?PHP
/*
usuarios()
eliminarUsuario()
posts()
eliminarPosts()
eliminarComentario()
crearPost()
comentarPost()

header: string
footer: string
username: string
usuarios: string
logout: bool
*/


?>
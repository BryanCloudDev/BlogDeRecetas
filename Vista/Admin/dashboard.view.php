<!DOCTYPE html>
<html>

<head>
    <title>Admin dashboard</title>
</head>

<body>
    <header style="background-color:red;">
        <!-- La siguiente linea necesita mejorarse y/o completarse -->
        <img id="" src="" width="100px" height="100px" />
        <h1>Admin dashboard</h1>
        <p>Admin dashboard</p>
    </header>
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
                <a href="1.html" class="site_title">Voy a dejar esto por aquí por si me sirve después</a>
            </div>

            <div class="profile">
                <!--img_2 -->
                <div class="profile_pic">
                    <img src="images/img.jpg" alt="..." class="img-circle pro_img">
                </div>
                <div class="profile_info">
                    <span>Admin area</span>
                    <h2>Admin</h2>
                </div>
            </div>

            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                <div class="menu_section">
                    <h3>Ajustes</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="2.html">Dashboard</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-edit"></i> Ajustes 2 <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="3.html">modificar luego</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-desktop"></i> Ajustes 3 <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="4.html">Botón 1</a></li>
                                <li><a href="5.html">Botón 2</a></li>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="5.html">Tables</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-bar-chart-o"></i> Ajustes 4 <span class="fa fa-chevron-down"></span></a>
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
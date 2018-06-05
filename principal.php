<?php // session_start();  ?>
<?php
//include_once './controladores/ManejoSesiones/BloqueDeSeguridad.php';
//$seguridad = new BloqueDeSeguridad();
//$seguridad->seguridad("login.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <?php
//        if (isset($_SESSION['mensaje'])) {
//            $mensaje = $_SESSION['mensaje'];
//            echo "<script type=\"text/javascript\">alert('" . $mensaje . "')</script>";
//            unset($_SESSION['mensaje']);
//        }
        ?>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="xxxx.css">-->
        <style type="text/css">
           header {
                width: 100%;
                height: 60px;
                background-color: #ff7f50;
                z-index: 0;
                border-bottom: 1px solid #383838;
                color: #FFFFFF !important;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
            }
            body {
                margin: 0;
                background-color: #ffffff;
                z-index: 0;
                height: auto;
                width: 100%;
            }
            aside#left {
                width: 215px;
                background-color: #90ee90;
                position: absolute;
                top: 0;
                bottom: 0;
                z-index: 999;
                border: 1px solid #383838;
                color: #FFFFFF !important;
            }
            aside a{
                color:#ffffff;
            }
            footer {
                height: 42px;
                position: fixed;
                bottom: 0;
                background-color: #141616;
                z-index: 1;
                color: #FFFFFF !important;
                width: 100%;
                text-align: center;
            }
            main{
                margin-left: 217px;
                margin-top: 61px;
            }
            #lista li {
                display:inline;
            }              
            #menu1{
                text-align:right;
            } 
        </style>
    </head>
    <body>
        <div>

            <header>
                <div id="menu1">
                    <ul id="lista">
                        <li><a href="index.html" >HOME</a></li>
                        <li><a <a href="controladores/ControladorPrincipal.php?ruta=cerrarSesion">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </header>
            <aside id="left" class="bg-primary text-light" >
                <img src="imagenes/logo.png">
                <a href="principal.php">Tablero de Funciones</a>
                <!-- start nav -->
                <nav id="menu">
                    <!-- start menu -->
                    <ul>
                        <li><a href="#">Gestión de TablaX1</a></li>
                        <li><a href="#">Gestión de Libros</a>
                            <ul>
                                <li><a href="controladores/ControladorPrincipal.php?ruta=listarLibros">Listado de Libros</a></li>
                                <li><a href="principal.php?contenido=vistas/vistasUsuario_s/vistaInsertarLibro.php">Agregar Libros</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Gestión de TablaX1</a></li>
                        <li><a href="#">Gestión de Insumos</a>
                            <ul>
                            <li><a href="controladores/ControladorPrincipal.php?ruta=listarInsumos">Listado de Insumos</a></li>
                                <li><a href="principal.php?contenido=vistas/vistasUsuario_s/vistaInsertarInsumos.php">Agregar Insumos</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Gestión de TablaX3</a></li>
                        <li><a href="#">Gestión de TablaX4</a></li>
                        <li><a href="#">Gestión de TablaX5</a></li>
                    </ul>
                    <!-- end menu -->
                </nav>
                <!-- end nav -->                
            </aside>
            <main style="background-color: #00000;">
                <?php
                if (isset($_GET['contenido'])) {
                    include($_GET['contenido']);
                }
                ?>   
            </main>
            <footer>Ficha 1577350 R1</footer>

        </div>
    </body>
</html>


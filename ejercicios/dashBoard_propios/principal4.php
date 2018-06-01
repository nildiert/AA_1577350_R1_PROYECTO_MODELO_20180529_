<?php // session_start(); ?>
<?php
//include_once './controladores/ManejoSesiones/BloqueDeSeguridad.php';
//$seguridad = new BloqueDeSeguridad();
//$seguridad->seguridad("login.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script>
            function nobackbutton() {
                window.location.hash = "no-back-button";
                window.location.hash = "Again-No-back-button" //chrome
                window.onhashchange = function () {
                    window.location.hash = "no-back-button";
                }
            }
            function Verificar()
            {
                var tecla = window.event.keyCode;
                if (tecla == 116) {
                    event.keyCode = 0;
                    event.returnValue = false;
                }
            }

        </script>        
        <title>Su Proyecto</title>
        <?php
//        if (isset($_SESSION['mensaje'])) {
//            $mensaje = $_SESSION['mensaje'];
//            echo "<script type=\"text/javascript\">alert('" . $mensaje . "')</script>";
//            unset($_SESSION['mensaje']);
//        }
        ?>
        <!-- Bootstrap Core CSS -->
        <link href="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="startbootstrap-sb-admin-2-gh-pages/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="startbootstrap-sb-admin-2-gh-pages/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="startbootstrap-sb-admin-2-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body onKeyDown="javascript:Verificar()" onload="nobackbutton()">

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Su proyecto</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li><a href="controladores/ControladorPrincipal.php?ruta=cerrarSesion"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Buscando...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="principal.php"><i class="fa fa-dashboard fa-fw"></i> Tablero de Funciones</a>
                            </li>
                            <li>
                                <!--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gestión de ... (Tabla1)<span class="fa arrow"></span></a>-->
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gestión de Usuarios<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <!--<a href="principal.php?contenido=vistas/vistasTabla1/vistaListarRegistrosTabla1.php">Listado de registros de  ... (Registros Tabla1)</a>-->
                                        <a href="controladores/ControladorPrincipal.php?ruta=listarUsuario_s">Listado de Usuarios</a>
                                    </li>            
                                    <li>
                                        <!--<a href="principal.php?contenido=vistas/vistasTabla1/vistaAgregarRegistrosTabla1.php">Agregar un(a) ... (Registro Tabla1)</a>-->
                                        <!--<a href="controladores/ControladorPrincipal.php?ruta=AgregarUsuario_s">Agregar Usuario</a>-->
                                        <a href="principal.php?contenido=vistas/vistasUsuario_s/vistaInsertarUsuario_s.php">Agregar Usuario</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-institution fa-fw"></i> Gestión de Insumos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="controladores/ControladorPrincipal.php?ruta=listaDeInsumos">Listar Insumos</a>
                                    </li>            
                                    <li>
                                        <a href="controladores/ControladorPrincipal.php?ruta=vistaInsertarInsumo">Agregar Insumos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>                             
                            <li>
                                <a href="#"><i class="fa fa-institution fa-fw"></i> Gestión de Asignación de Insumos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="controladores/ControladorPrincipal.php?ruta=listaDeAsignacionDeInsumos">Listar Asignar Insumos (insord)</a>
                                    </li>            
                                    <li>
                                        <a href="controladores/ControladorPrincipal.php?ruta=vistaInsertarAsignacionDeInsumos">Agregar Asignación de Insumos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>                 
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (isset($_GET['contenido'])) {
                                include($_GET['contenido']);
                            }
                            ?>                            

                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
<footer class="bs-footer" role="contentinfo">
  <div class="container">
    <div class="bs-social">
      <ul class="bs-social-buttons">
        <li class="facebook-button">
          <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=f23d51f2c429164&amp;origin=https%3A%2F%2Fbootsnipp.com" style="border: none;"></iframe></div></div></div>
          <div id="js-facebook-share" class="fb-like fb_iframe_widget" data-href="http://bootsnipp.com" data-width="130" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=112989545392380&amp;container_width=0&amp;href=http%3A%2F%2Fbootsnipp.com%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;width=130"><span style="vertical-align: bottom; width: 122px; height: 20px;"><iframe name="f8a5d109e4a02" width="130px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/like.php?action=like&amp;app_id=112989545392380&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df159216a7666c88%26domain%3Dbootsnipp.com%26origin%3Dhttps%253A%252F%252Fbootsnipp.com%252Ff23d51f2c429164%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fbootsnipp.com%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;width=130" style="border: none; visibility: visible; width: 122px; height: 20px;" class=""></iframe></span></div>        
        </li>
        <li class="follow-btn">
          <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-follow-button twitter-follow-button-rendered" title="Twitter Follow Button" src="https://platform.twitter.com/widgets/follow_button.5069e7f3e4e64c1f4fb5d33d0b653ff6.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=bootsnipp&amp;show_count=false&amp;show_screen_name=true&amp;size=m&amp;time=1512631881614" style="position: static; visibility: visible; width: 125px; height: 20px;" data-screen-name="bootsnipp"></iframe>
        </li>
        <li class="tweet-btn">
          <iframe id="twitter-widget-1" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-share-button twitter-share-button-rendered twitter-tweet-button" title="Twitter Tweet Button" src="https://platform.twitter.com/widgets/tweet_button.5069e7f3e4e64c1f4fb5d33d0b653ff6.en.html#dnt=false&amp;id=twitter-widget-1&amp;lang=en&amp;original_referer=https%3A%2F%2Fbootsnipp.com%2Fsnippets%2FOPPpE&amp;related=bootsnipp&amp;size=m&amp;text=RT%20Design%20elements%20and%20code%20snippets%20for%20%23twbootstrap%20HTML%2FCSS%2FJS%20framework&amp;time=1512631881615&amp;type=share&amp;url=http%3A%2F%2Fbootsnipp.com&amp;via=bootsnipp" style="position: static; visibility: visible; width: 60px; height: 20px;" data-url="http://bootsnipp.com"></iframe>
        </li>
      </ul>
    </div>
    <p>Siscal.com © 2017 <a href="http://www.siscal.com" target="_blank">SISCAL</a> | <a href="https://siscal.com/privacy" target="_blank">Políticas de Privacidad del Sitio</a> </p>
  </div>
<style>
._fancybar{margin-top:50px !important;z-index: 5}
</style>
<script async="" type="text/javascript" src="//cdn.fancybar.net/ac/fancybar.js?zoneid=1502&amp;serve=C6ADVKE&amp;placement=danstools" id="_fancybar_js"></script>

</footer>
        <!-- jQuery -->
        <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="startbootstrap-sb-admin-2-gh-pages/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="startbootstrap-sb-admin-2-gh-pages/dist/js/sb-admin-2.js"></script>

    </body>

</html>

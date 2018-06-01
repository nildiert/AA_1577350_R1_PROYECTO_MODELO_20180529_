<?php
//session_start();
//if (isset($_SESSION['mensaje'])) {
//    $mensaje = $_SESSION['mensaje'];
//    echo "<script languaje='javascript'>alert('$mensaje')</script>";
//    unset($_SESSION['mensaje']);
//}
//if (isset($_GET['erroresValidacion'])) {
//    $erroresValidacion = json_decode($_GET['erroresValidacion'], true); //true para que convierta un json a "array" y no a objeto
//}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Su Proyecto</title>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script>    
    </head>
    <body>
        <div>
            <h3 class="panel-title">Datos básicos de Registro</h3>
        </div>
        <div>
            <form method="POST" action="controladores/ControladorPrincipal.php" id="formRegistro">
                <fieldset>
                    <div>
                        <input placeholder="Documento" name="documento" type="number" pattern="" required="required" autofocus
                               value="<?php
//                               if (isset($erroresValidacion['datosViejos']['documento']))
//                                   echo $erroresValidacion['datosViejos']['documento'];
//                               if (isset($_SESSION['documento']))
//                                   echo $_SESSION['documento'];
//                               unset($_SESSION['documento']);
                               ?>"
                               >
                               <?php
//                               if (isset($erroresValidacion['marcaCampo']['documento']))
//                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['documento'] . "</font>";
                               ?>
                               <?php
//                               if (isset($erroresValidacion['mensajesError']['documento']))
//                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['documento'] . "</font>";
                               ?>                                        
                    </div>
                    <div>
                        <input placeholder="Nombres" name="nombre" type="text"   required="required"
                               value="<?php
//                               if (isset($erroresValidacion['datosViejos']['nombre']))
//                                   echo $erroresValidacion['datosViejos']['nombre'];
//                               if (isset($_SESSION['nombre']))
//                                   echo $_SESSION['nombre'];
//                               unset($_SESSION['nombre']);
                               ?>"
                               >
                               <?php
//                               if (isset($erroresValidacion['marcaCampo']['nombre']))
//                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['nombre'] . "</font>";
                               ?>                                        
                               <?php
//                               if (isset($erroresValidacion['mensajesError']['nombre']))
//                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['nombre'] . "</font>";
                               ?>
                    </div>
                    <div>
                        <input placeholder="Apellidos" name="apellidos" type="text"  required="required"
                               value="<?php
//                               if (isset($erroresValidacion['datosViejos']['apellidos']))
//                                   echo $erroresValidacion['datosViejos']['apellidos'];
//                               if (isset($_SESSION['apellidos']))
//                                   echo $_SESSION['apellidos'];
//                               unset($_SESSION['apellidos']);
                               ?>"
                               >
                               <?php
//                               if (isset($erroresValidacion['marcaCampo']['apellidos']))
//                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['apellidos'] . "</font>";
                               ?>
                               <?php
//                               if (isset($erroresValidacion['mensajesError']['apellidos']))
//                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['apellidos'] . "</font>";
                               ?>
                    </div>
                    <div>
                        <input id="InputCorreo" placeholder="Correo Electrónico" name="email" type="email"  required="required"
                               value="<?php
//                               if (isset($erroresValidacion['datosViejos']['email']))
//                                   echo $erroresValidacion['datosViejos']['email'];
//                               if (isset($_SESSION['email']))
//                                   echo $_SESSION['email'];
//                               unset($_SESSION['email']);
                               ?>"
                               >
                               <?php
//                               if (isset($erroresValidacion['marcaCampo']['email']))
//                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['email'] . "</font>";
                               ?>
                               <?php
//                               if (isset($erroresValidacion['mensajesError']['email']))
//                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['email'] . "</font>";
                               ?>
                    </div>
                    <div>
                        <input id="InputPassword" placeholder="Password" name="password" type="password" value=""  required="required">
                    </div>
                    <div>
                        <input id="InputPassword2" class="form-control" placeholder="Confirmar Password" name="password2" type="password" value="">
                    </div>
                    <input type="hidden" name="ruta" value="gestionDeRegistro">
                    <input type="hidden" name="contenido" value="controlarRegistro">
                    <button onclick="valida_registro()">Registrar</button>
                </fieldset>
                <div>
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                        Ya está registrado? 
                        <a href="login.php">
                            Ingrese Aquí
                        </a>
                    </div>
                </div>
            </form>
            <?php
//            if (isset($erroresValidacion))
//                $erroresValidacion = NULL;
            ?>
        </div>
    </body>
</html>

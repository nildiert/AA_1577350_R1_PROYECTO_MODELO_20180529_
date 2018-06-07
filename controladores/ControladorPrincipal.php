<?php
/**/
/* * ********************************************** */
/* * ***COMIENZO DE PROGRAMACIÓN EN BACKEND******** */
/* * ********************************************** */
include_once './../modelos/ConstantesConexion.php';
include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/InsumosControlador.php';

/* * ********************************************** */

$datos = array();

if (!empty($_POST) && isset($_POST["ruta"])) {
    $datos = $_POST;
}
if (!empty($_GET) && isset($_GET["ruta"])) {
    $datos = $_GET;
}

//echo "<pre>";
//print_r($datos);
//echo "</pre>";
//exit();

switch ($datos['ruta']) {

    case "listarLibros":
        $librosControlador = new LibrosControlador($datos);
        $librosControlador->librosControlador();
        break;
    case "listarInsumos":
        $InsumosControlador = new InsumosControlador($datos);
        $InsumosControlador->InsumosControlador();
        break;
}
?>

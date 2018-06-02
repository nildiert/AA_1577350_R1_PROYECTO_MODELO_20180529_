<?php

include_once '../modelos/modeloLibro/LibroDAO.php';
include_once '../modelos/UsuarioBD.php';

$usuarioBd=new UsuarioBD("root", "");

$pruebaLibro =new LibroDAO($usuarioBd, BASE, SERVIDOR);

//$listado=$pruebaLibro->seleccionarTodos();
$listado=$pruebaLibro->consultaPaginada();

echo "<pre>";
print_r($listado);
echo "</pre>";
        
        
?>

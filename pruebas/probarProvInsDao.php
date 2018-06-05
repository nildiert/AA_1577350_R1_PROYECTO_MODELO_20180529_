<?php

include_once '../modelos/modeloInsumos/insumosDAO.php';
include_once '../modelos/UsuarioBD.php';

$usuarioBd=new UsuarioBD("root", "");

$pruebaInsumos =new InsumosDAO($usuarioBd, BASE, SERVIDOR);

//$listado=$pruebaLibro->seleccionarTodos();
$listado=$pruebaInsumos->consultaPaginada();

echo "<pre>";
print_r($listado);
echo "</pre>";
        
        
?>

<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloLibro/LibroDAO.php';
require_once PATH . 'modelos/modeloLibro/LibroVO.php';
require_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroDAO.php';
require_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroVO.php';

class LibrosControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function librosControlador() {
        
    }

}

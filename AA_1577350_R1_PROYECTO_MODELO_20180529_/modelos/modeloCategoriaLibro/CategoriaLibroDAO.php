<?php

include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';

class CategoriaLibroDAO extends ConBdMySql /* implements InterfaceCRUD */ {

    private $cantidadTotalRegistros;

    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }

    function seleccionarTodos() {

    }

}

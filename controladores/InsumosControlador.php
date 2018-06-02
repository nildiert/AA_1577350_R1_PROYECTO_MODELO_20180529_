<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloInsumos/InsumosDAO.php';
require_once PATH . 'modelos/modeloInsumos/InsumosVO.php';
require_once PATH . 'modelos/modeloCategoriaInsumos/CategoriaInsumosDAO.php';
require_once PATH . 'modelos/modeloCategoriaInsumos/CategoriaInsumosVO.php';

class InsumosControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function InsumosControlador() {

        switch ($this->datos["ruta"]) {
            case "listarInsumos":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarLibro = new LibroVO();

                $gestarInsumos = new LibroDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarInsumos->consultaPaginada($consultarLibro, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeInsumos = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarInsumos->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeInsumos'] = $listaDeInsumos;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarInsumos = null;
                header("location: ../principal.php?contenido=vistas/vistasInsumos/listarRegistrosInsumos.php");
                break;

            default:
                break;
        }
    }

}
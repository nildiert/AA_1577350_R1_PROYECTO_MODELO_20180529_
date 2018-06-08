<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloProvIns/ProvInsDAO.php';
require_once PATH . 'modelos/modeloProvIns/ProvInsVO.php';


class ProvInsControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function ProvInsControlador() {

        switch ($this->datos["ruta"]) {
            case "listarProvIns":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarProvIns = new ProvInsVO();

                $gestarProvIns = new ProvInsDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarProvIns->consultaPaginada($consultarProvIns, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeProvIns = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarProvIns->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeProvIns'] = $listaDeProvIns;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarProvIns = null;
                header("location: ../principal.php?contenido=vistas/vistasProvIns/listarRegistrosProvIns.php");                break;

            default:
                break;
        }
    }

}

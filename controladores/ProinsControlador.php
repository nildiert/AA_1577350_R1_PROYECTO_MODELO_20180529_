<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloProIns/ProInsDAO.php';
require_once PATH . 'modelos/modeloProIns/ProInsVO.php';


class ProInsControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function ProInsControlador() {

        switch ($this->datos["ruta"]) {
            case "listarProIns":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarProIns = new ProInsVO();

                $gestarProIns = new ProInsDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarProIns->consultaPaginada($consultarProIns, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeProIns = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarProIns->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeProIns'] = $listaDeProIns;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarProIns = null;
                header("location: ../principal.php?contenido=vistas/vistasProIns/listarRegistrosProIns.php");                break;

            default:
                break;
        }
    }

}

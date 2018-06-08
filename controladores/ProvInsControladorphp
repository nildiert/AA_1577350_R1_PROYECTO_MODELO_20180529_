<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloInsOrdCom/InsOrdComDAO.php';
require_once PATH . 'modelos/modeloInsOrdCom/InsOrdComVO.php';


class InsOrdComControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function InsOrdComControlador() {

        switch ($this->datos["ruta"]) {
            case "listarInsOrdCom":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarInsOrdCom = new InsOrdComVO();

                $gestarInsOrdCom = new InsOrdComDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarInsOrdCom->consultaPaginada($consultarInsOrdCom, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeInsOrdCom = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarInsOrdCom->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeInsOrdCom'] = $listaDeInsOrdCom;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarInsOrdCom = null;
                header("location: ../principal.php?contenido=vistas/vistasInsOrdCom/listarRegistrosInsOrdCom.php");                break;

            default:
                break;
        }
    }

}

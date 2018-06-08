<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloProveedores/ProveedoresDAO.php';
require_once PATH . 'modelos/modeloProveedores/ProveedoresVO.php';


class ProveedoresControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function ProveedoresControlador() {

        switch ($this->datos["ruta"]) {
            case "listarProveedores":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarProveedores = new ProveedoresVO();

                $gestarProveedores = new ProveedoresDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarProveedores->consultaPaginada($consultarProveedores, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeProveedores = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarProveedores->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeProveedores'] = $listaDeProveedores;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarProveedores = null;
                header("location: ../principal.php?contenido=vistas/vistasProveedores/listarRegistrosProveedores.php");                break;

            default:
                break;
        }
    }

}

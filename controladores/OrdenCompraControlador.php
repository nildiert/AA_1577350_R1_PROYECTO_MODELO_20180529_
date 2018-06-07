<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloOrdenCompra/OrdenCompraDAO.php';
require_once PATH . 'modelos/modeloOrdenCompra/OrdenCompraVO.php';



class OrdenCompraControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function OrdenCompraControlador() {

        switch ($this->datos["ruta"]) {
            case "listarOrdenCompra":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarOrdenCompra = new OrdenCompraVO();

                $gestarOrdenCompra = new OrdenCompraDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarOrdenCompra->consultaPaginada($consultarOrdenCompra, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeOrdenCompra = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarOrdenCompra->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeOrdenCompra'] = $listaDeOrdenCompra;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarOrdenCompra = null;
                header("location: ../principal.php?contenido=vistas/vistasOrdenCompra/listarRegistrosOrdenCompra.php");
                break;

            default:
                break;
        }
    }

}
<?php

include_once './../modelos/ConstantesConexion.php';
require_once PATH . 'modelos/UsuarioBD.php';
require_once PATH . 'modelos/modeloLibro/LibroDAO.php';
require_once PATH . 'modelos/modeloLibro/LibroVO.php';


class LibrosControlador {

    private $datos = array();

    public function __construct($datos) {
        $this->datos = $datos;
    }

    public function librosControlador() {

        switch ($this->datos["ruta"]) {
            case "listarLibros":

                if (isset($this->datos['pag']) && (int) $this->datos['pag'] > 0) {
                    $pagInicio = $this->datos['pag'];
                } else {
                    $pagInicio = 0;
                }
                $limit = 5;

                $usuarioBd = new UsuarioBd(USUARIO_BD, CONTRASENIA_BD);
                $consultarLibro = new LibroVO();

                $gestarLibros = new LibroDAO($usuarioBd, BASE, SERVIDOR);
                $resultadoConsultaPaginada = $gestarLibros->consultaPaginada($consultarLibro, $limit, $pagInicio);
                $totalRegistros = $resultadoConsultaPaginada[0];
                $listaDeLibros = $resultadoConsultaPaginada[1];
                $paginacionVinculos = $gestarLibros->enlacesPaginacion($totalRegistros, $limit, $pagInicio);

                session_start();
                $_SESSION['listaDeLibros'] = $listaDeLibros;
                $_SESSION['paginacionVinculos'] = $paginacionVinculos;
                $_SESSION['totalRegistros'] = $totalRegistros;


                $usuarioBd = null;
                $gestarLibros = null;
                header("location: ../principal.php?contenido=vistas/vistasLibros/listarRegistrosLibros.php");                break;

            default:
                break;
        }
    }

}

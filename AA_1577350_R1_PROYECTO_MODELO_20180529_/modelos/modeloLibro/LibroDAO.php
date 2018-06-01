<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';

class LibroDAO extends ConBdMySql /* implements InterfaceCRUD */ {

    private $cantidadTotalRegistros;

    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }

    public function seleccionarTodos() {
      $planConsulta = "select SQL_CALC_FOUND_ROWS l.isbn,l.titulo,l.autor,l.precio,cl.catLibId,cl.catLibNombre from libros l ";
      $planConsulta.= " join categorialibro cl ";
      $planConsulta.= " ON  l.categoriaLibro_catLibId=cl.catLibId ";
      $planConsulta.= "  order by l.isbn ASC;";

      $registrosLibro = $this->conexion->prepare($planConsulta); //Se envia la consulta
      $registrosLibro->execute(); //Ejecución de la consulta
      $listadoRegistrosLibro = array();

      while($registro = $registrosLibro->fetch(PDO::FETCH_OBJ)) {
          $listadoRegistrosLibro[] = $registro;
        }

              $this->cierreBd();
              return $listadoRegistrosLibro;
          }





    public function consultaPaginada(LibroVO $consultarLibro = NULL, $limit = NULL, $pagInicio = NULL) {

    }

    public function solicitudPaginacion($limit = 5) {


    }

    public function enlacesPaginacion($totalRegistros = NULL, $limit = 5, $offset = 0, $totalEnlacesPaginacion = 4) {


    }

    public function seleccionarId($sId) {

    }

    public function insertar($registro) {


    }

    public function actualizar($registro) {
        $registro;
    }

    public function eliminar($eId) {
        $eId;
    }

}

<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';

class InsumosDAO extends ConBdMySql /* implements InterfaceCRUD */ {

    private $cantidadTotalRegistros;

    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }

    public function seleccionarTodos() {
$planConsulta .= "SELECT i.InsCodigo,i.InsNombre,i.InsPrecio as UltimoPrecio,pi.ProvinsPrecio PrecioProveedor , ";
$planConsulta .= "p.ProvCodigo, p.ProvNombre, ic.Ordencompra_OrdComId, oc.OrdComFecha, oc.OrdComEstado, po.Productos_ProCodigo,";
$planConsulta .= "pt.ProNombre,pt.ProPresentacion, pt.ProDescripcion, op.OrdPId,op.OrdPFecha,op.OrdPAsignada,op.OrdPCant,op.OrdPObservaciones,";
$planConsulta .= "c.Cliid,c.CliNombre,c.CliTelefono,c.CliDireccion";
$planConsulta .= "FROM ((((((((insumos i left join provins pi on i.InsCodigo=pi.Insumos_InsCodigo)";
$planConsulta .= "left join proveedor p on p.ProvCodigo=pi.Proveedor_ProvCodigo)";
$planConsulta .= "left join insordcom ic on ic.Insumos_InsCodigo=i.InsCodigo)";
$planConsulta .= "left join ordencompra oc on oc.OrdComId=ic.Ordencompra_OrdComId)";
$planConsulta .= "left join proins po on po.Insumos_InsCodigo=i.InsCodigo)";
$planConsulta .= "left join productos pt on pt.ProCodigo=po.Productos_ProCodigo)";
$planConsulta .= "left join ordenproduccion op on op.Productos_ProCodigo=pt.ProCodigo)";
$planConsulta .= "left join cliente c on c.Cliid=op.Cliente_Cliid)";

$planConsulta .= "where op.OrdPId=10";

      $registrosInsumos = $this->conexion->prepare($planConsulta); //Se envia la consulta
      $registrosInsumos->execute(); //Ejecución de la consulta
      $listadoRegistrosInsumos = array();

      while($registro = $registrosInsumos->fetch(PDO::FETCH_OBJ)) {
          $listadoRegistrosInsumos[] = $registro;
        }

              $this->cierreBd();
              return $listadoRegistrosInsumos;
          }





    public function consultaPaginada(InsumosVO $consultarInsumos = NULL, $limit = NULL, $pagInicio = NULL) {

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

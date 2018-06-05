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
        $parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];

    	$condicionBuscar = "";
    	$filtros = 0;

    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);

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
                    
		echo $planConsulta."<br>";

    	if (!empty($_POST['InsCodigo'])) {
        	$planConsulta.=" where i.InsCodigo='" . $_POST['InsCodigo'] . "'";
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
     	} else {
        	$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
        	$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
        	if (!empty($_POST['InsNombre'])) {
            	$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "i.InsNombre like upper('%" . $_POST['InsNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}        	
        	if (!empty($_POST['InsPrecio'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " i.InsPrecio = " . $_POST['InsPrecio'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
            }
            /*nildiertsita*/
        	/*if (!empty($_POST['catLibId'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " cl.catLibId like upper('%" . $_POST['catLibId'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}
        	if (!empty($_POST['catLibNombre'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " cl.catLibNombre like upper('%" . $_POST['catLibNombre'] . "%')";
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
        	}*/
    	}
    	if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( InsCodigo like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or InsNombre like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or InsPrecio like '%" . $_POST['buscar'] . "%'";
        	/*$planConsulta.=" or precio like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or catLibId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or catLibNombre like '%" . $_POST['buscar'] . "%'";*/
        	$planConsulta.=" ) ";
    	};
    	$planConsulta.= "  order by i.InsCodigo ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";

    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();

    	$listadoLibros = array();

    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoLibros[] = $registro;
    	}

    	$listar = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar->execute();
    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
    	}
        $this->cantidadTotalRegistros = $totalRegistros;
        
   	
     	return array($totalRegistros, $listadoLibros);
        
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

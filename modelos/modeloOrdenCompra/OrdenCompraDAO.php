<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';

class OrdenCompraDAO extends ConBdMySql /* implements InterfaceCRUD */ {

    private $cantidadTotalRegistros;

    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }

public function seleccionarTodos() {

	$planConsulta="SELECT oc.OrdComId,i.InsNombre,i.InsUnidadMedida,i.InsPrecio,oc.OrdComFecha ";
	$planConsulta.="FROM (ordencompra oc left join insordcom ic on oc.OrdComId = ic.Ordencompra_OrdComId) ";
	$planConsulta.="left join insumos i on i.InsCodigo= ic.Insumos_InsCodigo ";

	$registrosOrdenCompra = $this->conexion->prepare($planConsulta); //Se envia la consulta
	$registrosOrdenCompra->execute(); //Ejecución de la consulta
	$listadoRegistrosOrdenCompra = array();

      while($registro = $registrosOrdenCompra->fetch(PDO::FETCH_OBJ)) {
          $listadoRegistrosOrdenCompra[] = $registro;
        }

              $this->cierreBd();
              return $listadoRegistrosOrdenCompra;
          }

    public function consultaPaginada(OrdenCompraVO $consultarOrdenCompra = NULL, $limit = NULL, $pagInicio = NULL) {
        $parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];

    	$condicionBuscar = "";
    	$filtros = 0;

    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);

			$planConsulta="SELECT oc.OrdComId,i.InsNombre,i.InsUnidadMedida,i.InsPrecio,oc.OrdComFecha ";
			$planConsulta.="FROM (ordencompra oc left join insordcom ic on oc.OrdComId = ic.Ordencompra_OrdComId) ";
			$planConsulta.="left join insumos i on i.InsCodigo= ic.Insumos_InsCodigo ";			

		
			if (!empty($_POST['OrdComId'])) {
				$planConsulta.=" where oc.OrdComId='" . $_POST['OrdComId'] . "'";
				$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
			} else {
				$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
				$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
				if (!empty($_POST['InsNombre'])) {
					$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
					$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "oc.InsNombre like upper('%" . $_POST['InsNombre'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
					$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
				}        	
		
				if (!empty($_POST['InsUnidadMedida'])) {
					$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " i.InsUnidadMedida = " . $_POST['InsUnidadMedida'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
			}
			if (!empty($_POST['InsPrecio'])) {
				$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
				$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " i.InsPrecio = " . $_POST['InsPrecio'];
				$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
			}
        	if (!empty($_POST['OrdComFecha'])) {
            	$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " oc.OrdComFecha= " . $_POST['OrdComFecha'];
            	$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
			}			

   
		}


		if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( OrdComId like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or InsNombre like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or InsUnidadMedida like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or InsPrecio like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or OrdComFecha like '%" . $_POST['buscar'] . "%'";
        	
        	$planConsulta.=" ) ";
    	};
		
    	$planConsulta.= "  order by OrdComId ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();

    	$listadoOrdenCompra = array();

    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoOrdenCompra[] = $registro;
    	}

   
		
		$listar2 = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar2->execute();
    	while ($registro = $listar2->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
		}

        $this->cantidadTotalRegistros = $listadoOrdenCompra;
        
   	
     	return array($totalRegistros, $listadoOrdenCompra);
        
    }

    public function solicitudPaginacion($limit = 5) {
	if (!isset($_GET['pag']) || $_GET['pag'] < 1) {
        	$_GET['pag'] = 1;
    	}

    	$pag = (int) $_GET['pag'];

    	if ($pag < 1) {
        	$pag = 1;
    	};

    	$offset = ($pag - 1) * $limit;

    	return array($offset, $limit);

    }

    public function enlacesPaginacion($totalRegistros = NULL, $limit = 5, $offset = 0, $totalEnlacesPaginacion = 4) {
		$totalPag = ceil($totalRegistros / $limit);

    	$anterior = $_GET['pag'] - $totalEnlacesPaginacion;
    	$siguiente = $_GET['pag'] + $limit;

    	$dbs = array();
    	$conteoEnlaces = 0;
    	for ($i = $_GET['pag']; $i < ($_GET['pag'] + $limit) && $i < $totalPag && $conteoEnlaces < $totalEnlacesPaginacion; $i++) {

        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarOrdenCompra&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}

    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarOrdenCompra&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=OrdenCompra&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";

    	$mostrar.= implode("-", $dbs);

    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarOrdenCompra&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarOrdenCompra&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
    	}


    	return $mostrar;

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

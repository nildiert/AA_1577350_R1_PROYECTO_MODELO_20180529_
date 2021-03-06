<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMySql.php';
include_once PATH . 'modelos/UsuarioBD.php';
// include_once PATH . 'modelos/modeloPersona/PersonaVO.php';
include_once PATH . 'modelos/InterfaceCRUD.php';

class InsOrdComDAO extends ConBdMySql /* implements InterfaceCRUD */ {

    private $cantidadTotalRegistros;

    function __construct(UsuarioBd $usuarioBd, $base, $servidor) {
        parent::__construct($usuarioBd, $base, $servidor);
    }

public function seleccionarTodos() {

	$planConsulta="SELECT ic.Insumos_InsCodigo,ic.Ordencompra_OrdComId, i.InsNombre,i.InsUnidadMedida,i.InsPrecio ";
	$planConsulta.="FROM (insordcom ic left join insumos i on i.InsCodigo=ic.Insumos_InsCodigo)";


	$registrosInsOrdCom = $this->conexion->prepare($planConsulta); //Se envia la consulta
	$registrosInsOrdCom->execute(); //Ejecución de la consulta
	$listadoRegistrosInsOrdCom = array();

      while($registro = $registrosInsOrdCom->fetch(PDO::FETCH_OBJ)) {
          $listadoRegistrosInsOrdCom[] = $registro;
        }

              $this->cierreBd();
              return $listadoRegistrosInsOrdCom;
          }

    public function consultaPaginada(InsOrdComVO $consultarInsOrdCom = NULL, $limit = NULL, $pagInicio = NULL) {
        $parametrosPaginacion = $this->solicitudPaginacion();
    	$offset = $parametrosPaginacion[0];
    	$limit = $parametrosPaginacion[1];

    	$condicionBuscar = "";
    	$filtros = 0;

    	if (isset($_POST['buscar']))
        	$_POST['buscar'] = trim($_POST['buscar']);

			$planConsulta="SELECT ic.Insumos_InsCodigo,ic.Ordencompra_OrdComId, i.InsNombre,i.InsUnidadMedida,i.InsPrecio ";
			$planConsulta.="FROM (insordcom ic left join insumos i on i.InsCodigo=ic.Insumos_InsCodigo)";
			

		
		
			if (!empty($_POST['Insumos_InsCodigo'])) {
				$planConsulta.=" where ic.Insumos_InsCodigo='" . $_POST['Insumos_InsCodigo'] . "'";
				$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta   	
			} else {
				$where = false; // inicializar $where a falso ( al comenzar la consulta NO HAY condiciones o criterios de búsqueda)
				$filtros = 0;  // cantidad de filtros/condiciones o criterios de búsqueda al comenzar la consulta
				if (!empty($_POST['Ordencompra_OrdComId'])) {
					$where = true; // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
					$planConsulta.=(($where && !$filtros) ? " where " : " and ") . "ic.Ordencompra_OrdComId like upper('%" . $_POST['Ordencompra_OrdComId'] . "%')"; // con tipo de búsqueda aproximada sin importar mayúsculas ni minúsculas
					$filtros++; //cantidad de filtros/condiciones o criterios de búsqueda
				}        	
		
				if (!empty($_POST['InsNombre'])) {
					$where = true;  // inicializar $where a verdadero ( hay condiciones o criterios de búsqueda)
            	$planConsulta.=(($where && !$filtros) ? " where " : " and ") . " i.InsNombre = " . $_POST['InsNombre'];
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

   
		}
		if (!empty($_POST['buscar'])) {
        	$where = TRUE;
        	$condicionBuscar = (($where && !$filtros == 0) ? " or " : " where ");
        	$filtros++;
        	$planConsulta.=$condicionBuscar;
        	$planConsulta.="( Insumos_InsCodigo like '%" . $_POST['buscar'] . "%'";
        	$planConsulta.=" or Ordencompra_OrdComId like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or InsNombre like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or InsUnidadMedida like '%" . $_POST['buscar'] . "%'";
			$planConsulta.=" or InsPrecio like '%" . $_POST['buscar'] . "%'";
        	
        	$planConsulta.=" ) ";
    	};
		
    	$planConsulta.= "  order by Insumos_InsCodigo ASC";
    	$planConsulta.=" LIMIT " . $limit . " OFFSET " . $offset . " ; ";
    	$listar = $this->conexion->prepare($planConsulta);
    	$listar->execute();

    	$listadoInsOrdCom = array();

    	while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
        	$listadoInsOrdCom[] = $registro;
    	}

   
		
		$listar2 = $this->conexion->prepare("SELECT FOUND_ROWS() as total;");
    	$listar2->execute();
    	while ($registro = $listar2->fetch(PDO::FETCH_OBJ)) {
        	$totalRegistros = $registro->total;
		}

        $this->cantidadTotalRegistros = $listadoInsOrdCom;
        
   	
     	return array($totalRegistros, $listadoInsOrdCom);
        
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

        	$dbs[] = "<a href='controladores/ControladorPrincipal.php?ruta=listarInsOrdCom&pag=$i'>$i</a>";
        	$conteoEnlaces++;
        	$siguiente = $i;
    	}

    	$mostrar = "<center><a href='controladores/ControladorPrincipal.php?ruta=listarInsOrdCom&pag=0'>..::PAGINAS INICIALES::..</a><br>";
    	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=InsOrdCom&pag=" . (($anterior)) . "'>..::BLOQUE ANTERIOR::..</a>";

    	$mostrar.= implode("-", $dbs);

    	if ($_GET['pag'] < $totalPag) {
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarInsOrdCom&pag=" . ($siguiente + 1) . "'>..::BLOQUE SIGUIENTE::..</a><br>";
        	$mostrar.="<a href='controladores/ControladorPrincipal.php?ruta=listarInsOrdCom&pag=" . ($totalPag - $totalEnlacesPaginacion) . "'>..::BLOQUE FINAL::..</a><br></center>";
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

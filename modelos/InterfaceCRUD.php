<?php

interface InterfaceCRUD {

    //put your code here
    public function seleccionarTodos();

    public function seleccionarId($sId);

    public function buscar($dato1 = NULL, $dato2 = NULL);

    public function insertar($registro);

    public function actualizar($registro);

    public function eliminar($eId);
    
    public function solicitudPaginacion($offset = NULL);
    
//    public function consultaPaginada(\stdClass $consultarUsuario=NULL, $pagInicio=NULL, $limit=NULL);
    
    public function totalRegistros();
    
    public function enlacesPaginacion($totalRegistros=NULL, $offset = NULL, $limit = NULL, $totalEnlacesPaginacion = NULL);
    
    public function vinculosPaginas($pagInicio, $limit);
}

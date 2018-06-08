<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LibroVO
 *
 * @author AdministradorH
 */
class OrdenCompraVO {
    //put your code here
    private $OrdComId;
    private $InsNombre;
    private $InsUnidadMedida;
    private $InsPrecio;
    private $OrdComFecha;
    
    
    
    function getOrdComId() {
        return $this->OrdComId;
    }

    function getInsNombre() {
        return $this->InsNombre;
    }

    function getInsUnidadMedida() {
        return $this->InsUnidadMedida;
    }

    function getInsPrecio() {
        return $this->InsPrecio;
    }

    function getOrdComFecha() {
        return $this->OrdComFecha;
    }

    function setOrdComId($OrdComId) {
        $this->OrdComId = $OrdComId;
    }

    function setInsNombre($InsNombre) {
        $this->InsNombre = $InsNombre;
    }

    function setInsUnidadMedida($InsUnidadMedida) {
        $this->InsUnidadMedida = $InsUnidadMedida;
    }

    function setInsPrecio($InsPrecio) {
        $this->InsPrecio = $InsPrecio;
    }

    function setOrdComFecha($OrdComFecha) {
        $this->OrdComFecha = $OrdComFecha;
    }

    





}

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
class InsOrdComVO {
    //put your code here
    
    private $Insumos_InsCodigo;
    private $Ordencompra_OrdComId;
    private $InsNombre;
    private $InsUnidadMedida;
    private $InsPrecio;

    function getInsumos_InsCodigo() {
        return $this->Insumos_InsCodigo;
    }

    function getOrdencompra_OrdComId() {
        return $this->Ordencompra_OrdComId;
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

    function setInsumos_InsCodigo($Insumos_InsCodigo) {
        $this->Insumos_InsCodigo = $Insumos_InsCodigo;
    }

    function setOrdencompra_OrdComId($Ordencompra_OrdComId) {
        $this->Ordencompra_OrdComId = $Ordencompra_OrdComId;
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






}

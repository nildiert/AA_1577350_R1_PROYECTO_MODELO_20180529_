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
class ProInsVO {
    //put your code here
    
    private $InsCodigo;
    private $InsNombre;
    private $InsUnidadMedida;
    private $ProinsObservacion;
    
    function getInsCodigo() {
        return $this->InsCodigo;
    }

    function getInsNombre() {
        return $this->InsNombre;
    }

    function getInsUnidadMedida() {
        return $this->InsUnidadMedida;
    }

    function getProinsObservacion() {
        return $this->ProinsObservacion;
    }

    function setInsCodigo($InsCodigo) {
        $this->InsCodigo = $InsCodigo;
    }

    function setInsNombre($InsNombre) {
        $this->InsNombre = $InsNombre;
    }

    function setInsUnidadMedida($InsUnidadMedida) {
        $this->InsUnidadMedida = $InsUnidadMedida;
    }

    function setProinsObservacion($ProinsObservacion) {
        $this->ProinsObservacion = $ProinsObservacion;
    }


    

}

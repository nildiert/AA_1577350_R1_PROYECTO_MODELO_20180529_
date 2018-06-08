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
class ProveedoresVO {
    //put your code here
    
    private $ProvCodigo;
    private $ProvNombre;
    private $InsNombre;
    private $InsPrecio;
    private $ProvinsPrecio;
    private $ProvinsFecha;

    function getProvCodigo() {
        return $this->ProvCodigo;
    }

    function getProvNombre() {
        return $this->ProvNombre;
    }

    function getInsNombre() {
        return $this->InsNombre;
    }

    function getInsPrecio() {
        return $this->InsPrecio;
    }

    function getProvinsPrecio() {
        return $this->ProvinsPrecio;
    }

    function getProvinsFecha() {
        return $this->ProvinsFecha;
    }

    function setProvCodigo($ProvCodigo) {
        $this->ProvCodigo = $ProvCodigo;
    }

    function setProvNombre($ProvNombre) {
        $this->ProvNombre = $ProvNombre;
    }

    function setInsNombre($InsNombre) {
        $this->InsNombre = $InsNombre;
    }

    function setInsPrecio($InsPrecio) {
        $this->InsPrecio = $InsPrecio;
    }

    function setProvinsPrecio($ProvinsPrecio) {
        $this->ProvinsPrecio = $ProvinsPrecio;
    }

    function setProvinsFecha($ProvinsFecha) {
        $this->ProvinsFecha = $ProvinsFecha;
    }


}

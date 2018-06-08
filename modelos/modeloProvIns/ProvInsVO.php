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
class ProvInsVO {
    //put your code here
    
private $InsCodigo;
private $InsNombre;
private $InsPrecio;
private $ProvinsPrecio;
private $ProvinsFecha;

private function getInsCodigo() {
return $this->InsCodigo;
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

 function setInsCodigo($InsCodigo) {
$this->InsCodigo = $InsCodigo;
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

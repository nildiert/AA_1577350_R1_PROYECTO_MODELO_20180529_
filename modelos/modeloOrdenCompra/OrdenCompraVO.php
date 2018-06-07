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
    private $OrdComFecha;
    private $InsNombre;
    private $InsPrecio;
    private $InsCodigo;
   
    
  
   function getOrdComId() {
       return $this->OrdComId;
   }
   function setOrdComId($OrdComId) {
       $this->OrdComId = $OrdComId;
   }

   function getOrdComFecha() {
    return $this->OrdComFecha;
   }
   function setOrdComFecha($OrdComFecha) {
       $this->OrdComFecha = $OrdComFecha;
   }
   
   function getInsNombre() {
    return $this->InsNombre;
   }
   function setInsNombre($InsNombre) {
    $this->InsNombre = $InsNombre;
   }

   function getInsPrecio() {
    return $this->InsPrecio;
   }
   function setInsPrecio($InsPrecio) {
    $this->InsPrecio = $InsPrecio;
   }

   function getInsCodigo() {
    return $this->InsCodigo;
   }
   function setInsCodigo($InsCodigo) {
    $this->InsCodigo = $InsCodigo;
   }
  




}


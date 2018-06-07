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


    private $InsCodigo;
    private $InsNombre;
    private $InsUnidadMedida;
    private $InsPrecio;
    private $InsUsuSesion;
    private $Ins_created_at;
    private $Ins_updated_at;
    private $InsEstado;
    private $Insumos_InsCodigo;
    private $Ordencompra_OrdComId;
    
    function getInsumos_InsCodigo() {
        return $this->Insumos_InsCodigo;
    }
    function getOrdencompra_OrdComId() {
        return $this->Ordencompra_OrdComId;
    }

   function getInsCodigo() {
       return $this->InsCodigo;
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

   function getInsUsuSesion() {
       return $this->InsUsuSesion;
   }

   function getIns_created_at() {
       return $this->Ins_created_at;
   }

   function getIns_updated_at() {
       return $this->Ins_updated_at;
   }

   function getInsEstado() {
       return $this->InsEstado;
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

   function setInsPrecio($InsPrecio) {
       $this->InsPrecio = $InsPrecio;
   }

   function setInsUsuSesion($InsUsuSesion) {
       $this->InsUsuSesion = $InsUsuSesion;
   }

   function setIns_created_at($Ins_created_at) {
       $this->Ins_created_at = $Ins_created_at;
   }

   function setIns_updated_at($Ins_updated_at) {
       $this->Ins_updated_at = $Ins_updated_at;
   }

   function setInsEstado($InsEstado) {
       $this->InsEstado = $InsEstado;
   }

   function setInsumos_InsCodigo($Insumos_InsCodigo) {
    $this->Insumos_InsCodigo = $Insumos_InsCodigo;
    }

    function setOrdencompra_OrdComId($Ordencompra_OrdComId) {
    $this->Ordencompra_OrdComId = $Ordencompra_OrdComId;
    }





}

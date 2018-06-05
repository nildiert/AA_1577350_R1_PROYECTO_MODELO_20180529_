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
class InsumosVO {
    //put your code here

    private $isbn;
    private $titulo;
    private $autor;
    private $precio;
    private $categoriaLibro_catLibId;
    private $catLibId;
    private $catLibNombre;
    private $catLibObservacion;
    /*Variables de nuestro proyecto*/
    private $InsCodigo;
    private $InsNombre;
    private $InsUnidadMedida;
    private $InsPrecio;
    private $InsUsuSesion;
    private $Ins_created_at;
    private $Ins_updated_at;
    private $InsEstado;

    function getIsbn() {
        return $this->isbn;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAutor() {
        return $this->autor;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCategoriaLibro_catLibId() {
        return $this->categoriaLibro_catLibId;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCategoriaLibro_catLibId($categoriaLibro_catLibId) {
        $this->categoriaLibro_catLibId = $categoriaLibro_catLibId;
    }
     function getcatLibId(){
       return $this->catLibId;
     }
     function getcatLibNombre(){
       return $this->catLibNombre;
     }
     function getcatLibObservacion(){
       return $this->catLibObservacion;
     }
     function setcatLibId($catLibId){
       $this->catLibId =$catLibId;
     }
     function setcatLibNombre($catLibNombre){
       $this->catLibNombre = $catLibNombre;
     }
     function setcatLibObservacion($catLibObservacion){
       $this->catLibObservacion=$catLibObservacion;
     }
     /*Estas son las de nuestro proyecto*/

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



}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BackupNegra
 *
 * @author Miriam
 */
class BackupNegra {
   private $ObjCaja;
    private $fecha_salida;
    private $estanteria;
    private $leja;
    
    function __construct($ObjCajaNegra, $estanteria, $leja) {
        $this->ObjCaja = $ObjCajaNegra;
        $this->fecha_salida = date('d-m-y');
        $this->estanteria = $estanteria;
        $this->leja = $leja;
    }
    
    function getObjCaja() {
        return $this->ObjCaja;
    }

    function getFecha_salida() {
        return $this->fecha_salida;
    }

    function getEstanteria() {
        return $this->estanteria;
    }

    function getLeja() {
        return $this->leja;
    }

    function setObjCaja($ObjCajaNegra) {
        $this->ObjCaja = $ObjCajaNegra;
    }

    function setFecha_salida($fecha_salida) {
        $this->fecha_salida = $fecha_salida;
    }

    function setEstanteria($estanteria) {
        $this->estanteria = $estanteria;
    }

    function setLeja($leja) {
        $this->leja = $leja;
    }



}

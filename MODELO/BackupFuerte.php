<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BackupFuerte
 *
 * @author Miriam
 */

class BackupFuerte {
    private $ObjCaja;
    private $fecha_salida;
    private $estanteria;
    private $leja;
    
    function __construct($_ObjCajaFuerte,$_estanteria, $_leja) {
        $this->fecha_salida=date('d-m-y');
        $this->ObjCaja=$_ObjCajaFuerte;
        $this->estanteria=$_estanteria;
        $this->leja=$_leja;
        
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

    function setObjCaja($ObjCajaFuerte) {
        $this->ObjCaja = $ObjCajaFuerte;
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

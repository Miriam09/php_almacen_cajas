<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ocupacion
 *
 * @author Miriam
 */
class Ocupacion {
    private $Estanteria;
    private $Leja;
    private $caja;
    private $tipo;
    
    function __construct($_estanteria, $_leja) {
        $this->Estanteria = $_estanteria;
        $this->Leja = $_leja;
        
    }
    
    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

        function getEstanteria() {
        return $this->Estanteria;
    }

    function getLeja() {
        return $this->Leja;
    }

    function getCaja() {
        return $this->caja;
    }

    function setEstanteria($Estanteria) {
        $this->Estanteria = $Estanteria;
    }

    function setLeja($Leja) {
        $this->Leja = $Leja;
    }

    function setCaja($caja) {
        $this->caja = $caja;
    }

    public function __toString() {
        
    }

    
}

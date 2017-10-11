<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaFuerte
 *
 * @author Miriam
 */
class CajaFuerte {
     private $codigo=0;
    private $altura;
    private $anchura;
    private $profundidad;
    private $claveDesbloqueo;
    private $color;
    private $fechaEntrada;
    
    function __construct($altura, $anchura, $profundidad, $claveDesbloqueo, $color){ //$fechaEntrada) {
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->claveDesbloqueo = $claveDesbloqueo;
        $this->color = $color;
//        $this->codEstanteria = $codEstanteria;
//        $this->numLeja = $numLeja;
//        $this->fechaEntrada = $fechaEntrada;
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getClaveDesbloqueo() {
        return $this->claveDesbloqueo;
    }

    function getColor() {
        return $this->color;
    }

//    function getCodEstanteria() {
//        return $this->codEstanteria;
//    }

//    function getNumLeja() {
//        return $this->numLeja;
//    }

    function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setClaveDesbloqueo($claveDesbloqueo) {
        $this->claveDesbloqueo = $claveDesbloqueo;
    }

    function setColor($color) {
        $this->color = $color;
    }

//    function setCodEstanteria($codEstanteria) {
//        $this->codEstanteria = $codEstanteria;
//    }
//
//    function setNumLeja($numLeja) {
//        $this->numLeja = $numLeja;
//    }

    function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

    public function __toString() {
        return $this->getCodigo() . $this->getAltura() . $this->getAnchura() . $this->getProfundidad() . $this->getClaveDesbloqueo() .
            $this->getColor() . $this->getFechaEntrada();
    }



}

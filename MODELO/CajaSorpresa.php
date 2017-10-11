<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaSorpresa
 *
 * @author Miriam
 */
class CajaSorpresa {
    private $codigo=0;
    private $altura;
    private $anchura;
    private $profundidad;
    private $contenido;
    private $color;
//    private $codEstanteria;
//    private $numLeja;
    private $fechaEntrada;
    
    function __construct($altura, $anchura, $profundidad, $contenido, $color){ //$fechaEntrada) 
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->contenido = $contenido;
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

    function getContenido() {
        return $this->contenido;
    }

    function getColor() {
        return $this->color;
    }

//    function getCodEstanteria() {
//        return $this->codEstanteria;
//    }
//
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

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setColor($color) {
        $this->color = $color;
    }


    function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }


    public function __toString() {
        return $this->getCodigo() . $this->getAltura() . $this->getAnchura() . $this->getProfundidad() . $this->getContenido() .
            $this->getColor() . $this->getFechaEntrada();
    }
}

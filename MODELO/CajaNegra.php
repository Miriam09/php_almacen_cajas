<?php

class CajaNegra {
    private $codigo=0;
    private $altura;
    private $anchura;
    private $profundidad;
    private $placa;
    private $color;
//    private $codEstanteria;
//    private $numLeja;
    private $fechaEntrada;
    
    function __construct($altura, $anchura, $profundidad, $placa, $color){ 
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->placa = $placa;
        $this->color = $color;
//        $this->codEstanteria = $codEstanteria;
//        $this->numLeja = $numLeja;

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

    function getPlaca() {
        return $this->placa;
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

    function setPlaca($placa) {
        $this->placa = $placa;
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
        return $this->getCodigo() . $this->getAltura() . $this->getAnchura() . $this->getProfundidad() . $this->getPlaca() .
            $this->getColor() . $this->getFechaEntrada();
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstanteriaCajas
 *
 * @author Miriam
 */
include_once 'Estanteria.php';
class EstanteriaCajas extends Estanteria{
    
    private $arrayCajas = array();
  
    
    
    function __construct($Material, $NumLejas, $Pasillo, $NumEstanteria, $array) {
        parent::__construct($Material, $NumLejas, $Pasillo, $NumEstanteria);
        $this->arrayCajas=$array;
        
        
    }
//    function __construct($ObjEstanteria, $array) {
//        $this->ObjEstanteria=$ObjEstanteria;
//        $this->arrayCajas=$array;
//        $this->codigo=Estanteria::getCodEstanteria();
//    }
    
  

    function getArrayCajas() {
        return $this->arrayCajas;
    }

    

    function setArrayCajas($arrayCajas) {
        $this->arrayCajas = $arrayCajas;
    }
    public function __toString() {
        parent::__toString();
    }

    public function getCodEstanteria() {
        return parent::getCodEstanteria();
    }

    public function getLejasOcupadas() {
        return parent::getLejasOcupadas();
    }

    public function getMaterial() {
        return parent::getMaterial();
    }

    public function getNumEstanteria() {
        return parent::getNumEstanteria();
    }

    public function getNumLejas() {
        return parent::getNumLejas();
    }

    public function getPasillo() {
        return parent::getPasillo();
    }

    public function setCodEstanteria($CodEstanteria) {
        parent::setCodEstanteria($CodEstanteria);
    }

    public function setLejasOcupadas($LejasOcupadas) {
        parent::setLejasOcupadas($LejasOcupadas);
    }

    public function setMaterial($Material) {
        parent::setMaterial($Material);
    }

    public function setNumEstanteria($NumEstanteria) {
        parent::setNumEstanteria($NumEstanteria);
    }

    public function setNumLejas($NumLejas) {
        parent::setNumLejas($NumLejas);
    }

    public function setPasillo($Pasillo) {
        parent::setPasillo($Pasillo);
    }

    
  
}

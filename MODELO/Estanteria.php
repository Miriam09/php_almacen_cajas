<?php


class Estanteria {
    private $CodEstanteria=0;
    private $Material;
    private $NumLejas=1;
    private $Pasillo;
    private $NumEstanteria;
    private $LejasOcupadas = 0;
    
    function __construct($Material, $NumLejas, $Pasillo, $NumEstanteria) {
        $this->Material = $Material;
        $this->NumLejas = $NumLejas;
        $this->Pasillo = $Pasillo;
        $this->NumEstanteria = $NumEstanteria;
    }

    //GET
    function getMaterial() {
        return $this->Material;
    }

    function getNumLejas() {
        return $this->NumLejas;
    }

    function getPasillo() {
        return $this->Pasillo;
    }
    
    function getLejasOcupadas() {
        return $this->LejasOcupadas;
    }
    
    function getNumEstanteria() {
        return $this->NumEstanteria;
    } 
    function getCodEstanteria(){
        return $this->CodEstanteria;
    }
    
    //SET
    function setMaterial($Material) {
        $this->Material = $Material;
    }

    function setNumLejas($NumLejas) {
        $this->NumLejas = $NumLejas;
    }

    function setPasillo($Pasillo) {
        $this->Pasillo = $Pasillo;
    }

    function setNumEstanteria($NumEstanteria) {
        $this->NumEstanteria = $NumEstanteria;
    }
  
    function setLejasOcupadas($LejasOcupadas) {
        $this->LejasOcupadas = $LejasOcupadas;
    }

    function setCodEstanteria($CodEstanteria){
        $this->CodEstanteria = $CodEstanteria;
    }   
    public function __toString() {
        return $this->getCodEstanteria() . "Material: ".$this->getMaterial()." Pasillo: ".$this->getPasillo()." Lejas: ".$this->getNumLejas()." Estantería: ".$this->getNumEstanteria()." Lejas ocupadas: ".$this->getLejasOcupadas();
              
    }

}

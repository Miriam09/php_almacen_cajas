<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExcepcionCodigoCaja
 *
 * @author Miriam
 */
class ExcepcionCodigoCaja extends Exception{
    private $mensaje;
    private $codigo;
    
    function __construct($_message, $_code, Exception $_previous = null) {
        parent::__construct($_message, $_code, $_previous); //constructor de la clase exception
        //solo necesito el constructor, es obligado acudir a la clase exception oara crear una exception.
        $this->mensaje=$_message;
        $this->codigo=$_code;
    }

    public function __toString() {
        if($this->codigo == 1) {
            return  "No existe una $this->mensaje con ese código.";
        }
    }
}

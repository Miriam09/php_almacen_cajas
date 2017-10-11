<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventario
 *
 * @author Miriam
 */
class Inventario {
        private $fecha;
        private $ArrayEstanteriaCajas = array();
   
        function __construct($_estanteriaCaja) {
            $this->fecha=date("d-M-Y");
            $this->ArrayEstanteriaCajas=$_estanteriaCaja;
        }
        
        function getFecha() {
            return $this->fecha;
        }

        function getArrayEstanteriaCajas() {
            return $this->ArrayEstanteriaCajas;
        }

        function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        function setArrayEstanteriaCajas($ArrayEstanteriaCajas) {
            $this->ArrayEstanteriaCajas = $ArrayEstanteriaCajas;
        }


}

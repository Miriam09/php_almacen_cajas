<?php

include_once "../MODELO/Estanteria.php";
include "../DAO/Operaciones.php";
session_start();
    $_material = $_REQUEST['material'];
    $_numLejas = $_REQUEST['numLejas'];
    $_pasillo = $_REQUEST['pasillo'];
    $_numEstanteria = $_REQUEST['numEstanteria'];
    $_pasilloUpper = strtoupper($_pasillo);
    
    
    
    try {
        $ObjEstanteria = new Estanteria($_material, $_numLejas, $_pasilloUpper, $_numEstanteria);
        Operaciones::mostrarEstanteriasPosicion($_pasilloUpper,$_numEstanteria);
     $_SESSION['confirmacionEstanterias'] = Operaciones::addEstanteria($ObjEstanteria);
          
    } catch (ExcepcionEstanteria $ex) {
        $_SESSION['confirmacionEstanterias']=$ex->__toString();
    } finally {
        header("Location:../VISTA/vistaConfirmacionEstanteria.php");
}
    
 
    
   
        
      
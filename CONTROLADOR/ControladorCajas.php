<?php
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaNegra.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/Ocupacion.php";
include "../DAO/Operaciones.php";
session_start();
 $_type = $_REQUEST['type'];
    $_estanteriaDisponible = $_REQUEST['estanteriaDisponible'];
   // $_lejaDisponible = $_REQUEST['lejaDisponible'];
    $_altoCaja = $_REQUEST['altoCaja'];
    $_anchoCaja = $_REQUEST['anchoCaja'];
    $_profCaja = $_REQUEST['profCaja'];
    $_colorCaja = $_REQUEST['colorCaja'];
    $_lejaCaja = $_REQUEST['lejasDisponibles'];
  
    
    
    switch ($_type){
        case "CajaSorpresa":
            $_contenido = $_REQUEST['contenido'];
            $ObjCajaSorpresa = new CajaSorpresa($_altoCaja, $_anchoCaja, $_profCaja, $_contenido, $_colorCaja);
//          echo $ObjCajaSorpresa;
            $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
            $_SESSION['confirmacionCajas']= Operaciones::addCaja($ObjCajaSorpresa, $ObjOcupacion);
            header("Location:../VISTA/vistaConfirmacionCajas.php");
            
            break;
        case "CajaNegra":
              $_placa = $_REQUEST['placa'];
            $ObjCajaNegra = new CajaNegra($_altoCaja, $_anchoCaja, $_profCaja, $_placa, $_colorCaja);
//            echo $ObjCajaNegra;
             $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
             $_SESSION['confirmacionCajas']=Operaciones::addCaja($ObjCajaNegra, $ObjOcupacion);
              header("Location:../VISTA/vistaConfirmacionCajas.php");
            break;
        case "CajaFuerte":
            $_clave = $_REQUEST['clave'];
            $ObjCajaFuerte = new CajaFuerte($_altoCaja, $_anchoCaja, $_profCaja, $_clave, $_colorCaja);
//            echo $ObjCajaFuerte;
             $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
             $_SESSION['confirmacionCajas']=Operaciones::addCaja($ObjCajaFuerte, $ObjOcupacion);
              header("Location:../VISTA/vistaConfirmacionCajas.php");
            break;
    }
    
    

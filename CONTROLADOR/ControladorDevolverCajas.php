<?php
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaNegra.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/Ocupacion.php";
include_once "../MODELO/BackupSorpresa.php";
include_once "../MODELO/BackupNegra.php";
include_once "../MODELO/BackupFuerte.php";
include "../DAO/Operaciones.php";

session_start();
$CajaBack = $_SESSION["mostrarDatosCajaDevol"];
$Caja = $CajaBack->getObjCaja();
    $_type = get_class($Caja);
    $_estanteriaDisponible = $_REQUEST['estanteriaDisponible'];
    $_altoCaja = $Caja->getAltura();
    $_anchoCaja = $Caja->getAnchura();
    $_profCaja = $Caja->getProfundidad();
    $_colorCaja = $Caja->getColor();
    $_lejaCaja = $_REQUEST['lejasDisponibles'];
    
    $_codigo = $Caja->getCodigo();
    
    
    switch ($_type){
        case "CajaSorpresa":
            $_contenido = $Caja->getContenido();
            $ObjCajaSorpresa = new CajaSorpresa($_altoCaja, $_anchoCaja, $_profCaja, $_contenido, $_colorCaja);
            $ObjCajaSorpresa->setCodigo($_codigo);
//          echo $ObjCajaSorpresa;
            $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
            $ObjOcupacion->setCaja($_codigo);
            $ObjOcupacion->setTipo($_type);
            $_SESSION['confirmacionDevolverCajas']=Operaciones::addCajaDevolucion($ObjCajaSorpresa, $ObjOcupacion);
            
            break;
        case "CajaNegra":
              $_placa = $Caja->getPlaca();
            $ObjCajaNegra = new CajaNegra($_altoCaja, $_anchoCaja, $_profCaja, $_placa, $_colorCaja);
            $ObjCajaNegra->setCodigo($_codigo);
//            echo $ObjCajaNegra;
             $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
             $ObjOcupacion->setCaja($_codigo);
             $ObjOcupacion->setTipo($_type);
            $_SESSION['confirmacionDevolverCajas']=Operaciones::addCajaDevolucion($ObjCajaNegra, $ObjOcupacion);
           
            break;
        case "CajaFuerte":
            $_clave = $Caja->getClaveDesbloqueo();
            $ObjCajaFuerte = new CajaFuerte($_altoCaja, $_anchoCaja, $_profCaja, $_clave, $_colorCaja);
//            echo $ObjCajaFuerte;
            $ObjCajaFuerte->setCodigo($_codigo);
             $ObjOcupacion = new Ocupacion($_estanteriaDisponible, $_lejaCaja);
             $ObjOcupacion->setCaja($_codigo);
             $ObjOcupacion->setTipo($_type);
           $_SESSION['confirmacionDevolverCajas']= Operaciones::addCajaDevolucion($ObjCajaFuerte, $ObjOcupacion);
           
           break;
    }
    header("Location:../VISTA/vistaConfirmacionDevolverCajas.php"); 

<?php
include_once "../DAO/Operaciones.php";
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/BackupNegra.php";
include_once "../MODELO/BackupSorpresa.php";
include_once "../MODELO/BackupFuerte.php";
include_once "../MODELO/CajaNegra.php";
include_once "../MODELO/Estanteria.php";
session_start();

$mostrarEstanteria = Operaciones::mostrarEstanteriasLibres();
$_SESSION["mostrarDatosEstanteria"] = $mostrarEstanteria;
$Tipo = $_REQUEST['tipoCajaDevol'];
$Codigo = $_REQUEST['codigoCajaDevol'];
 $mostrarCaja = Operaciones::DevolverbackupCajas($Codigo,$Tipo);

        $_SESSION["mostrarDatosCajaDevol"] = $mostrarCaja;
        
        header("Location: ../VISTA/FormularioDevolverCaja.php");




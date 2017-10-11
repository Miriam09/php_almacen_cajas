<?php

include_once "../DAO/Operaciones.php";
include_once "../MODELO/Ocupacion.php";
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/CajaNegra.php";
session_start();
$Tipo = $_REQUEST['tipoCajaBorrar'];
//print_r($Tipo);
$Codigo = $_REQUEST['codigoCaja'];
// $mostrarCodigoCajas = Operaciones::codigoCajas($Tipo);
try {
    $mostrarCaja = Operaciones::backupCajas($Tipo, $Codigo);
    $_SESSION["mostrarDatosCaja"] = $mostrarCaja; 
    header("Location: ../VISTA/SacarCajasConfirmacion.php");
} catch (ExcepcionCodigoCaja $err) {
    $_SESSION['confirmacionSacarCajas'] = $err->__toString();
    header("Location: ../VISTA/vistaConfirmacionSacarCajas.php");
}
<?php

include_once '../DAO/Operaciones.php';
include_once '../MODELO/CajaSorpresa.php';
include_once '../MODELO/CajaNegra.php';
include_once '../MODELO/CajaFuerte.php';
include_once '../MODELO/Ocupacion.php';

session_start();

$DatosCaja = $_SESSION["mostrarDatosCaja"];
$tipo = $DatosCaja->getTipo();
$codigo = $DatosCaja->getCaja();

    $resultado = Operaciones::sacarCaja($codigo, $tipo);
//print_r($resultado);
    $_SESSION['confirmacionSacarCajas'] = $resultado;

header("Location: ../VISTA/vistaConfirmacionSacarCajas.php");

<?php
include_once "../DAO/Operaciones.php";
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/BackupNegra.php";
include_once "../MODELO/BackupSorpresa.php";
include_once "../MODELO/BackupFuerte.php";
include_once "../MODELO/CajaNegra.php";
//session_start();

$Tipo = $_REQUEST['tipoCajaDevol'];
 $mostrarCajas = Operaciones::codigoCajasBackUp($Tipo);
// print_r($mostrarCajas);
 
    echo '<option value="">--choose--</option>';
    foreach($mostrarCajas as $array){
        $ObjCaja=$array->getObjCaja();
        echo '<option value="'.$ObjCaja->getCodigo().'">'.$ObjCaja->getCodigo().'</option>';
    }
<?php
include_once "../DAO/Operaciones.php";
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/CajaNegra.php";
//session_start();

$Tipo = $_REQUEST['tipoCajaBorrar'];
 $mostrarCajas = Operaciones::codigoCajas($Tipo);
// print_r($mostrarCajas);
    echo '<option value="">--choose--</option>';
    foreach($mostrarCajas as $array=>$caja){
        echo '<option value="'.$caja->getCodigo().'">'.$caja->getCodigo().'</option>';
    }
    
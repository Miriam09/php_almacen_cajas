<?php

include "../DAO/Operaciones.php";
include_once "../MODELO/Users.php";
session_start();
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

if (isset($_SESSION['validacion'])) {
    unset($_SESSION['validacion']);
}

$ObjUser = new Users($user, $pass);
$Valido = Operaciones::comprobarUser($ObjUser);
$_SESSION['validacion'] = $Valido;

if ($Valido == true) {
    $_SESSION['usuario'] = $ObjUser;
    $_SESSION['validacion'] = true;
    header("Location:../VISTA/Menu.php");
} else {
    $_SESSION['validacion'] = false;
    header("Location:../index.php");
}
    

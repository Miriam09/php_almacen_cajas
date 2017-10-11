<?php

include_once "../DAO/Operaciones.php";
include_once "../MODELO/Estanteria.php";
session_start();
//
 $mostrarEstanteria = Operaciones::mostrarEstanterias();
    
        $_SESSION["mostrarEstanteria"] = $mostrarEstanteria;
       // print_r($_SESSION["mostrarEstanteria"]);
        header("Location: ../VISTA/GA_listadoEstanteria.php");
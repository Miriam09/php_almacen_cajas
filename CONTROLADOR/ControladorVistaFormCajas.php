<?php
include_once "../DAO/Operaciones.php";
include_once "../MODELO/Estanteria.php";
session_start();

 $mostrarEstanteria = Operaciones::mostrarEstanteriasLibres();
    
        $_SESSION["mostrarDatosEstanteria"] = $mostrarEstanteria;
        //print_r($_SESSION["mostrarDatosEstanteria"]);
        //header("Location: ../VISTA/GA_listadoEstanteria.php");

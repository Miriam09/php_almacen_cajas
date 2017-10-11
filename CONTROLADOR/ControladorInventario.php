<?php
   
    include_once "../DAO/Operaciones.php";
    include_once "../MODELO/Inventario.php";
    include_once "../MODELO/Estanteria.php";
    include_once "../MODELO/CajaFuerte.php";
    include_once "../MODELO/CajaSorpresa.php";
    include_once "../MODELO/CajaNegra.php";
    include_once '../MODELO/EstanteriaCajas.php';
    include_once '../MODELO/Ocupacion.php';
    session_start();
    //
     $mostrarInventario = Operaciones::nuevoInventario();
       // print_r($mostrarInventario);
            $_SESSION["inventarioCajas"] = $mostrarInventario;
           //print_r($_SESSION["inventario"]);
            header("Location: ../VISTA/GA_Inventario.php");

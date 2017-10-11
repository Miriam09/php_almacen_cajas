<!DOCTYPE html>
<?php
include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}
?>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Salida Caja</title>
        <link rel="shortcut icon" href="../images/caja.png">
        <script type="text/javascript" src="../js/MiJavaScript.js?8" ></script>
        <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
        <!--<script src="../js/cufon-yui.js" type="text/javascript"></script>-->
<!--        <script src="../js/cufon-replace.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_400.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Light_300.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>-->
        <script src="../js/FF-cash.js" type="text/javascript"></script>

    </head>
    <body id="page2">
        <!-- header -->
        <div class="bg">
            <div class="main">
                <header>
                    <div class="row-1">
                        <h1>
                            <a class="logo" href="Menu.php">Point.co</a>
                            <strong class="slog">The most creative ideas</strong>
                        </h1>
                        <div class="search-form" id="search-form">					
                            <p id="usuario">Usuario: <span id="usuarioInfo"><?php echo $usuario->getUser() ?> </span> <a href="../CONTROLADOR/ControladorCerrarSesion.php" id="salir" >Salir</a>	</p>


                        </div>
                    </div>
                    <div class="row-2">
                        <nav>
                            <ul class="menu">
                                <li><a href="Menu.php">Home</a></li>
                                <li><a href="FormularioEstanteria.php">Nueva estantería</a></li>
                                <li><a href="FormularioCaja.php">Nueva caja</a></li>
                                <li><a href="GestionAlmacen.php">Gestión</a></li>
                                <li class="last-item "><a class="active" href="FormularioSacarCaja.php">Sacar Caja</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
                <!-- content -->
                <section id="content">
                    <div class="padding">
                        <div class="wrapper p4">
                            <div class="col-3">
                            </div>

                            <!--<div class="block-news">-->
                            <div id="sacarcaja">  
                                <!--<h2>Borrar Caja </h2>-->

                                <div id="formularioCaja">
                                    <form action="../CONTROLADOR/ControladorVistaSacarCajas.php" method="post">

                                        <div id="id1">

                                            <label for="tipoCajaBorrar">Tipo</label>

                                            <select id="tipoCajaBorrar" name="tipoCajaBorrar" onchange="muestraCajasBorrar(this.value)">
                                                <option value=""> --choose-- </option>
                                                <option value="CajaSorpresa">CajaSorpresa</option>
                                                <option value="CajaNegra">CajaNegra</option>
                                                <option value="CajaFuerte">CajaFuerte</option>
                                            </select>

                                        </div>
                                        <div id="code">
                                            <label for="codigoCaja">Codigo</label>
                                            <input type="number" id="codigoCaja" name="codigoCaja" required min="1" style="width: 50px"> 
<!--                                                <option value="">--choose--</option>
                                            </select>-->
                                        </div>
                                        
                                        <div id="botones2">
                                            <input type="submit" value="Ok" class="button-2" > <input type="reset" value="Cancelar" class="button-2" onClick="menu()">
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <br>

                            </div>
                            <!--</div>-->

                        </div>

                    </div>
                </section>
                <!-- footer -->
            </div>
        </div>

    </body>
</html>
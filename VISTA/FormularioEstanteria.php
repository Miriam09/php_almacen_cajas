<!DOCTYPE html>
<?php
include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header("Location:../index.php");
}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nueva estantería</title>
        <link rel="shortcut icon" href="../images/caja.png">
        <script type="text/javascript" src="../js/MiJavaScript.js"></script>
        <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
<!--        <script src="../js/cufon-yui.js" type="text/javascript"></script>
        <script src="../js/cufon-replace.js" type="text/javascript"></script>
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
                            <strong class="slog">The best warehouse</strong>
                        </h1>
                        <div class="search-form" id="search-form">					
                            <p id="usuario">Usuario: <span id="usuarioInfo"><?php echo $usuario->getUser() ?> </span> <a href="../CONTROLADOR/ControladorCerrarSesion.php" id="salir" >Salir</a>	</p>


                        </div>

                    </div>
                    <div class="row-2">
                        <nav>
                            <ul class="menu">
                                <li><a href="Menu.php">Home</a></li>
                                <li><a class="active" href="FormularioEstanteria.php">Nueva estantería</a></li>
                                <li><a href="FormularioCaja.php">Nueva caja</a></li>
                                <li><a href="GestionAlmacen.php">Gestión</a></li>
                                <!--<li class="last-item"><a href="contacts.html">Contact Us</a></li>-->
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

                            <!--<h2>New shelf </h2>-->
                            <form method="post" id="formularioEstanteria" action="../CONTROLADOR/ControladorEstanteria.php">
                                <div id="formularioCaja" class="fomularioEstanteria">  
                                    <div id="divmaterial">
                                        <label for="material">Material</label>
                                        <input type="text" name="material" id="material" required onchange="comprobarMaterial()">
                                    </div>
                                    <div id="divnumLejas">
                                        <label for="numLejas">Nº Lejas</label>
                                        <input type="text" name="numLejas" id="numLejas" size="2" min="1" required onchange="comprobarLejas()">
                                        
                                    </div>
                                    <div id="divpasillo">
                                        <label for="pasillo">Pasillo</label>
                                        <input type="text" name="pasillo" id="pasillo" size="1" required onchange="comprobarPasillo()">
                                       
                                    </div>
                                    <div id="divnumEstanteria">
                                        <label form="numEstanteria">Estantería</label>
                                        <input type="text" name="numEstanteria" id="numEstanteria" size="2" min="1" required onchange="comprobarEstanteria()">
                                        
                                    </div>
                                </div>
                                <br><br>
                                <div id="botones">
                                    <input type="submit" value="Añadir" class="button-2" autofocus  id ="botonSubmit" name="botonSubmit">    <input type="reset" value="Cancelar" class="button-2" onClick="menu()">
                                </div>
                            </form>

                            <!--</div>-->

                        </div>

                    </div>
                </section>
                <!-- footer -->
            </div>
        </div>
    </body>
</html>

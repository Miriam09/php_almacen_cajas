 <!DOCTYPE html>
<?php 
include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!--<link href="css/estilos.css" rel="stylesheet" type="text/css">-->
        <title>Home</title>
        <link rel="shortcut icon" href="../images/caja.png">
         <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
       <!--<script src="../js/cufon-yui.js" type="text/javascript"></script>-->
         <!--<script src="../js/cufon-replace.js" type="text/javascript"></script>-->
<!--        <script src="../js/Open_Sans_400.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Light_300.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>-->
        <script type="text/javascript" src="../js/tms-0.3.js"></script>
        <script type="text/javascript" src="../js/tms_presets.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
        <script src="../js/FF-cash.js" type="text/javascript"></script>

    </head>
    <body id="page1">
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
                        <!--aqui va el login-->
                    </div>
                    <div class="row-2">
                        <nav>
                            <ul class="menu">
                                <li><a class="active" href="Menu.php">Home</a></li>
                                <!-- <li><a href="news.html">New Box</a></li>
                                <li><a href="services.html">Managment</a></li>
                                <li><a href="products.html">Our Products</a></li>
                                <li class="last-item"><a href="contacts.html">Contact Us</a></li> -->
                            </ul>
                        </nav>
                    </div>
                    <div class="row-3">
                        <div class="slider-wrapper">
                            <div class="slider">

                                <section id="content">
                                    <div class="padding">
                                        <div class="wrapper p4">
                                            <div class="col-3">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="box-bg">
                                        <div class="wrapper">
                                            <div class="col-1">
                                                <div class="box first">
                                                    <div class="pad">
                                                        <div class="wrapper indent-bot">
                                                            <strong class="numb img-indent2"> <img src="../images/estanteria.png" alt="add shelf"></strong>
                                                            <div class="extra-wrap">
                                                                <h3 class="color-1"><strong>Nueva</strong>Estantería</h3>
                                                            </div>
                                                        </div>
                                                        <div class="wrapper">
                                                            <a class="button img-indent-r" href="../VISTA/FormularioEstanteria.php">>></a>
                                                            <div class="extra-wrap">
                                                                <a class="link" target="_blank" href="../VISTA/FormularioEstanteria.php">Añadir una nueva estantería al almacén</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1">
                                                <div class="box second">
                                                    <div class="pad">
                                                        <div class="wrapper indent-bot">
                                                            <strong class="numb img-indent2"><img src="../images/cajablanca.png" alt="add box"></strong>
                                                            <div class="extra-wrap">
                                                                <h3 class="color-2"><strong>Nueva</strong>Caja</h3>
                                                            </div>
                                                        </div>
                                                        <div class="wrapper">
                                                            <a class="button img-indent-r" href="../VISTA/FormularioCaja.php"></a>
                                                            <div class="extra-wrap">
                                                                <a class="link" href="../VISTA/FormularioCaja.php ">Añadir caja a una estantería</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="box third">
                                                    <div class="pad">
                                                        <div class="wrapper indent-bot">
                                                            <strong class="numb img-indent2"><img src="../images/config.png" alt="management"></strong>
                                                            <div class="extra-wrap">
                                                                <h3 class="color-3"><strong>Gestión</strong>Almacén</h3>
                                                            </div>
                                                        </div>
                                                        <div class="wrapper">
                                                            <a class="button img-indent-r" href="../VISTA/GestionAlmacen.php">>></a>
                                                            <div class="extra-wrap">
                                                                <a class="link" href="../CONTROLADOR/ControladorInventario.php">Inventario</a>, <a class="link" href="../CONTROLADOR/ControladorVistaEstanteria">Estanterias</a>, <a class="link" href="../CONTROLADOR/ControladorVistaCajas.php">Cajas</a>, <a class="link" href="FormularioSacarCaja.php">Salida</a>, <a class="link" href="FormularioElegirCaja.php">Devolución</a>.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </section>


                            </div>
                        </div>
                    </div>
                </header>
                <!-- content -->

            </div>
        </div>

    </body>
</html>

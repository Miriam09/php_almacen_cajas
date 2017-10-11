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
        <title>Gestión</title>
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
    <body id="page4">
        <!-- header -->
        <div class="bg">
            <div class="main">
                <header>
                    <div class="row-1">
                        <h1>
                            <a class="logo" href="Menu.html">Point.co</a>
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
                                <li><a href="formularioCaja.php">Nueva caja</a></li>
                                <li><a class="active" href="GestionAlmacen.php">Gestión</a></li>
                                <!--<li class="last-item"><a href="contacts.html">Contact Us</a></li>-->
                            </ul>
                        </nav>
                    </div>
                </header>
                <!-- content -->

                <section id="content">
                    <div class="padding">
                        <div class="indent">
                            <h2>Gestión Almacén</h2>
                            <div class="wrapper indent-bot">
                                 <div class="col-3">
                                    <div class="wrapper">
                                        <figure class="img-indent3"><a href="../CONTROLADOR/ControladorInventario.php"><img src="../images/inventario.png" alt="" /></a></figure>
                                        <div class="extra-wrap">
                                            <h6>Inventario</h6>
                                            Inventario completo del almacén. Muestra el contenido de las estanterías ordenadas por pasillo y número.
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="wrapper indent-bot2">
                               
                               <div class="col-3">
                                    <div class="wrapper">
                                        <figure class="img-indent4"><a href="../CONTROLADOR/ControladorVistaEstanteria.php"><img src="../images/InventarioEstanteria.png" alt="" /></a></figure>
                                        <div class="extra-wrap">
                                            <h6>Listado estanterías</h6>
                                            Listado de las estanterías ordenadas por código.
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-4">
                                    <div class="wrapper">
                                        <figure class="img-indent"><a href="../VISTA/FormularioSacarCaja.php"><img src="../images/salidaCaja.png" alt="" /></a></figure>
                                        <div class="extra-wrap">
                                            <h6>Salida caja</h6>
                                            Eliminación de cajas que han salido del almacén
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper p3">
                                <div class="col-3">
                                    <div class="wrapper">
                                        <figure class="img-indent3"><a href="../CONTROLADOR/ControladorVistaCajas.php"><img src="../images/inventarioCajas.png" alt="" /></a></figure>
                                        <div class="extra-wrap">
                                            <h6>Listado cajas</h6>
                                            Listado de las cajas a elegir por tipo o todas a la vez.
                                        </div>
                                    </div>
                                </div>
                                
<!--                                <div class="col-3" >
                                    <div class="wrapper" id="invisible">
                                        <figure class="img-indent3"><img src="../images/page3-img1.png" alt="" /></figure>
                                        <div class="extra-wrap">
                                            <h6>Insurance</h6>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-4">
                                    <div class="wrapper">
                                        <figure class="img-indent"><a href="../VISTA/FormularioElegirCaja.php"><img src="../images/entradaCajas.png" alt="" /></a></figure>
                                        <div class="extra-wrap">
                                            <h6>Devolución Caja</h6>
                                            Sit aspernatur aut odit aut fugit, sed quia conse<br>quuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>







<!DOCTYPE html>
<?php
include_once '../MODELO/Estanteria.php';
//include_once '../CONTROLADOR/ControladorVistaEstanteria.php';
include_once '../MODELO/Users.php';
session_start();if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");
}
$ListaEstanterias = $_SESSION["mostrarEstanteria"];
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilos.css"/>
         <link rel="shortcut icon" href="../images/caja.png">
        <meta charset="UTF-8">
        <title>Listado Estanterias</title>
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
    <body id="page5">
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
                                <li class="last-item"><a class="active" href="GA_listadoEstanteria.php">Listado estanterías</a></li>
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

                            <div class="block-news">
                                <h2>Estanterías del almacén</h2>
                                <table id="tablaListas">
                                    <tr>
                                        <th>Código</th>
                                        <th>Ubicacion</th>
                                        <th>Material</th>
                                        <th>Lejas</th>
                                        <th>Lejas ocupadas</th>
                                    </tr>

                                    <?php
                                    foreach ($ListaEstanterias as $ObjEstanteria) {
                                        ?>
                                        <tr>
                                            <td><?php echo $ObjEstanteria->getCodEstanteria() ?> </td>
                                            <td><?php echo $ObjEstanteria->getPasillo() ?> - <?php echo $ObjEstanteria->getNumEstanteria() ?></td>
                                            <td><?php echo $ObjEstanteria->getMaterial() ?> </td>
                                            <td><?php echo $ObjEstanteria->getNumLejas() ?> </td>
                                            <td><?php echo $ObjEstanteria->getLejasOcupadas() ?> </td>
                                        </tr>
                                    <?php } ?>

                                </table>

                            </div>

                        </div>

                    </div>
                </section>
                <!-- footer -->

            </div>
        </div>

    </body>
</html>

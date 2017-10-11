<!DOCTYPE html>
<?php
include_once'../MODELO/Inventario.php';
include_once '../MODELO/EstanteriaCajas.php';
include_once '../MODELO/CajaNegra.php';
include_once '../MODELO/CajaFuerte.php';
include_once '../MODELO/CajaSorpresa.php';
include_once '../MODELO/BackupNegra.php';
include_once '../MODELO/BackupSorpresa.php';
include_once '../MODELO/BackupFuerte.php';
include_once '../MODELO/Ocupacion.php';
include_once '../MODELO/Estanteria.php';

include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}
$Inventario = $_SESSION["inventarioCajas"];

?>
<html>
    <head>
        <link rel="stylesheet" href="../css/estilos.css"/>
         <link rel="shortcut icon" href="../images/caja.png">
        <meta charset="UTF-8">
        <title>Inventario</title>
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
                                <li class="last-item"><a class="active" href="GA_Inventario.php">Inventario</a></li>
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

                                <h2>Inventario almacén</h2>
                                <p id="fechaInve">Fecha: <?php echo $Inventario->getFecha(); ?></p>
                                
                                <?php                               // print_r($Inventario);
                                $ArrayEstanteriaCajas =$Inventario->getArrayEstanteriaCajas() ;
                                
                               // $EstCaj = $ArrayEstanteriaCajas[1];
                                        //print_r($ArrayEstanteriaCajas);
                                       //  [0][2][0]->getCodigo()
                                        ?>
                               
                                
                                <table class="tablaInventario">
                                    <?php foreach ($ArrayEstanteriaCajas as $estan){ ?>
                                    <tr>
                                        <th  colspan="2"> Estanteria - <?php echo $estan->getCodEstanteria(); ?> 
                                        </th>
                                        <th> Pasillo - <?php echo $estan->getPasillo(); ?> <br>
                                        Nº -  <?php echo $estan->getNumEstanteria(); ?></th>
                                    </tr>
                                        <?php $cajas = $estan->getArrayCajas();
//if(isset($cajas)){
//print_r($cajas);}
////print_r($cajas);                     
                                        foreach ($cajas as $clave=>$caja){
                                        ?>    
                                    <tr style="background: lightblue; color:black">
                                        <td> <?php echo get_class($caja)   ?></td>
                                        <td>Codigo:  <?php echo $caja->getCodigo() ?> </td>
                                        <td>Fecha: <?php echo $caja->getFechaEntrada() ?> </td>
                                    </tr>
                                    <tr style="border-color: grey; text-align: left">
                                        <td colspan="3">
                                            <div id="izquierda">
                                            <p>Leja: <?php echo $clave ?> </p>
                                            <p id="float">Color: <span style="margin-left: 50px;  "><?php echo $caja->getColor() ?></span>  </p><div style="background: <?php echo $caja->getColor() ?> ; width:80px; height: 20px; border:1px grey dashed ; color:white;"></div> <br>
                                            <?php switch (get_class($caja)){
                                                case "CajaSorpresa": ?>
                                                    <p>Contenido: <?php echo $caja->getContenido() ?></p>
                                                     <?php break; 
                                                case "CajaNegra": ?>
                                                    <p>Placa: <?php echo $caja->getPlaca() ?></p>
                                                    <?php break;
                                                case "CajaFuerte": ?>
                                                    <p>Clave Desbloqueo: <?php echo $caja->getClaveDesbloqueo() ?></p>
                                                   <?php break; 
                                             } ?>
                                             </div>
                                            <div id="derecha">
                                            <p>Altura:  <?php echo $caja->getAltura() ?> </p>
                                            <p>Anchura:  <?php echo $caja->getAnchura() ?> </p>
                                            <p>Profundidad:  <?php echo $caja->getProfundidad() ?> </p>
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                                   
                                    
                                    
                                    <?php }} ?>
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

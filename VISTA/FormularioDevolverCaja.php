<!DOCTYPE html>
<?php
include_once '../MODELO/Estanteria.php';
include_once "../MODELO/CajaSorpresa.php";
include_once "../MODELO/CajaFuerte.php";
include_once "../MODELO/BackupNegra.php";
include_once "../MODELO/BackupSorpresa.php";
include_once "../MODELO/BackupFuerte.php";
include_once "../MODELO/CajaNegra.php";
include_once '../MODELO/Users.php';
//include_once '../CONTROLADOR/ControladorVistaFormCajas.php';
//include_once '../CONTROLADOR/ControladorVistaElegirCajas.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");} 
$ListaEstanterias = $_SESSION["mostrarDatosEstanteria2"];
//si lo pongo debajo de algun codigo html me da error, poner siempre aqui arriba las sesiones
//include_once '../js/AjaxLejasLibres.php';
$CajaBack = $_SESSION["mostrarDatosCajaDevol"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Devolución Caja</title>
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
        <?php $Caja = $CajaBack->getObjCaja() ?>
        
    </head>
    
    
    <body id="page3">
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
                                <li class="last-item "><a class="active" href="FormularioElegirCaja.php">Devolución Caja</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>

                <section id="content">
                    <div class="padding">
                        <div class="wrapper p4">
                            <div class="col-3">
                            </div>

                            <!--<div class="block-news">-->
                                <!--<h2>New box </h2>-->
                                <form action="../CONTROLADOR/ControladorDevolverCajas.php" method="post" >
                                    <div id="formularioCaja">
                                        <div id="tipo">
                                            
                                            <label for="type">Type</label>

                                            <input type="text" id="type" name="type" value="<?php echo get_class($Caja)?>" disabled />
                                           
                                                
                                        </div>
                                        <div id="div1">
                                            <div class="estanteria">
                                                <label for="estanteriaDisponible">Estanteria</label>
                                                <select id="estanteriaDisponible" name="estanteriaDisponible" onchange="muestraLejasLibres(this.value)" required> 
                                                    <option value="">--choose--</option>
                                                    <?php 
                                                    foreach ($ListaEstanterias as $ObjEstanteria) { ?>
                                                        <option value="<?php echo $ObjEstanteria->getCodEstanteria() ?>">Código:<?php echo $ObjEstanteria->getCodEstanteria() ?> P:<?php echo $ObjEstanteria->getPasillo() ?> N:<?php echo $ObjEstanteria->getNumEstanteria() ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="leja">
                                                <label>Lejas libres</label>
                                                <select id="lejasDisponibles" name="lejasDisponibles" required> 
                                                    <option value="">--choose--</option>
                                                </select>
                                               
                                            </div>
                                            
                                        </div>

                                        <div id="div2">
                                            <div class="alto">
                                                <label for="altoCaja">Alto</label>
                                                <input type="text" name="altoCaja" id="altoCaja" value="<?php echo $Caja->getAltura() ?>" disabled> cm
                                            </div>
                                            <div class="ancho">
                                                <label for="anchoCaja">Ancho</label>
                                                <input type="text" name="anchoCaja" id="anchoCaja" value="<?php echo $Caja->getAnchura() ?>" disabled> cm
                                            </div>
                                            <div class="profundo">
                                                <label for="profCaja">Profundidad</label>
                                                <input type="text" name="profCaja" id="profCaja" value="<?php echo $Caja->getProfundidad() ?>" disabled> cm
                                            </div>

                                        </div>
                                        <div id="div3">
                                            <label for="colorCaja">Color</label>
                                            <?php $color=$Caja->getColor() ?>
                                            <input type="color" name="colorCajaD" id="colorCaja" value="<?php echo $color ?>" disabled>
                                        </div>
                                        <div id="div4">
                            <?php $Tipo = get_class($Caja); 
                                    switch($Tipo){
                                         case "CajaSorpresa": ?>
                                            <div id="cajaContenido" style="display:inline">
                                                <label for="contenido">Contenido</label>
                                                <input type="text" name="contenido" id="contenido" value="<?php echo $Caja->getContenido() ?>" disabled>
                                            </div> 
                                           <?php break; 
                                         case "CajaNegra": ?> 
                                             <div id="cajaPlaca" style="display:inline">
                                                <label for="placa">Placa</label>
                                                <input type="text" name="placa" id="placa" value="<?php echo $Caja->getPlaca() ?>" disabled>
                                            </div>
                                            <?php break;
                                         case "CajaFuerte": ?>
                                            <div id="cajaClave" style="display:inline">
                                                <label for="clave">Clave</label>
                                                <input type="text" name="clave" id="clave" value="<?php echo $Caja->getClaveDesbloqueo() ?>" disabled>

                                            </div>
                                            <?php break;
                                    } ?>
                                        </div>
                                    </div>

                                    <br><br>
                                    <div id="botones"><input type="submit" value="Devolución" class="button-2" autofocus> <input type="reset" value="Cancelar" class="button-2" onClick="menu()"> </div>

                                </form>

                            <!--</div>-->

                        </div>

                    </div>
                </section>

            </div>
        </div>

    </body>
</html>

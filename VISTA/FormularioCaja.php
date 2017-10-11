<!DOCTYPE html>
<?php
include_once '../MODELO/Estanteria.php';
include_once '../MODELO/Users.php';
include_once '../CONTROLADOR/ControladorVistaFormCajas.php';
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}

$ListaEstanterias = $_SESSION["mostrarDatosEstanteria"];
//si lo pongo debajo de algun codigo html me da error, poner siempre aqui arriba las sesiones
//include_once '../js/AjaxLejasLibres.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir Caja</title>
        <link rel="shortcut icon" href="../images/caja.png">
        <script type="text/javascript" src="../js/MiJavaScript.js"></script>
        <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
<!--        <script src="../js/cufon-yui.js" type="text/javascript"></script>
        <script src="../js/cufon-replace.js" type="text/javascript"></script>-->
<!--        <script src="../js/Open_Sans_400.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Light_300.font.js" type="text/javascript"></script>
        <script src="../js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>-->
        <script src="../js/FF-cash.js" type="text/javascript"></script>

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
                                <li><a class="active" href="FormularioCaja.php">Nueva caja</a></li>
                                <li><a href="Gestionalmacen.php">Gestión</a></li>
                                <!--<li class="last-item"><a href="GA_listadoEstanteria.php">Contact Us</a></li>-->
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
                                <form action="../CONTROLADOR/ControladorCajas.php" method="post" >
                                    <div id="formularioCaja">
                                        <div id="tipo">
                                            <label for="type">Tipo</label>

                                            <select id="type" name="type" onchange="atributosEspeciales(this.value)" required>
                                                <option value="" selected="selected"> --choose-- </option>
                                                <option value="CajaSorpresa">CajaSorpresa</option>
                                                <option value="CajaNegra">CajaNegra</option>
                                                <option value="CajaFuerte">CajaFuerte</option>
                                            </select>
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
                                                <input type="number" name="altoCaja" id="altoCaja" required> cm
                                            </div>
                                            <div class="ancho">
                                                <label for="anchoCaja">Ancho</label>
                                                <input type="number" name="anchoCaja" id="anchoCaja" required> cm
                                            </div>
                                            <div class="profundo">
                                                <label for="profCaja">Profundidad</label>
                                                <input type="number" name="profCaja" id="profCaja" required> cm
                                            </div>

                                        </div>
                                        <div id="div3">
                                            <label for="colorCaja">Color</label>
                                            <input type="color" name="colorCaja" id="colorCaja" >
                                        </div>
                                        <div id="div4">
                                            <div id="cajaContenido">
                                                <label for="contenido">Contenido</label>
                                                <input type="text" name="contenido" id="contenido" >
                                            </div>
                                            <div id="cajaPlaca">
                                                <label for="placa">Placa</label>
                                                <input type="text" name="placa" id="placa" >
                                            </div>
                                            <div id="cajaClave">
                                                <label for="clave">Clave</label>
                                                <input type="text" name="clave" id="clave" >

                                            </div>

                                        </div>
                                    </div>

                                    <br><br>
                                    <div id="botones"><input type="submit" value="Añadir" class="button-2" autofocus> <input type="reset" value="Cancelar" class="button-2" onClick="menu()"> </div>
                                </form>

                            <!--</div>-->

                        </div>

                    </div>
                </section>

            </div>
        </div>

    </body>
</html>

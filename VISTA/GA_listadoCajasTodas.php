<!DOCTYPE html>
<?php
   include_once '../MODELO/CajaNegra.php';
include_once '../MODELO/CajaFuerte.php';
include_once '../MODELO/CajaSorpresa.php';
include_once '../MODELO/Ocupacion.php';
include_once '../MODELO/Estanteria.php';
include_once '../MODELO/EstanteriaCajas.php';
include_once '../MODELO/Inventario.php';
//include_once '../CONTROLADOR/ControladorVistaCajas.php';
include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}
$ListaCajasS = $_SESSION["inventarioCajas"];

?>
<html>
    <head>
        <link rel="shortcut icon" href="../images/caja.png">
        <link rel="stylesheet" href="../css/estilos.css"/>
        <script type="text/javascript" src="../js/MiJavaScript.js"></script>
        <meta charset="UTF-8">
        <title>Listado de Cajas</title>
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
                                <li class="last-item"><a class="active" href="../CONTROLADOR/ControladorVistaCajas.php">Listado cajas</a></li>
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
                                <h2>Cajas del almacén</h2>
                                <form action="" name="radioCaja">
                                    <select id="seleccionCaja" name="seleccionCaja" onchange="ocultarCajas()"> 
                                        <option value="">--select--</option>
                                        <option value="Todas">Todas</option>
                                        <option value="CAJA_SORPRESA">Caja Sorpresa</option>
                                        <option value="CAJA_NEGRA">Caja Negra</option>
                                        <option value="CAJA_FUERTE">CajaFuerte</option>
                                    </select>
<!--                                    <input type="submit" value="View" class="button-2" >-->
                                </form>
                                <br><br>

                                <div id="CajaSorpresa">
                                    <h3>Cajas Sorpresa</h3>
                                    <table id="tablaListas">
                                        <tr>
                                            <th>Código</th>
                                            <th>Altura</th>
                                            <th>Anchura</th>
                                            <th>Profundidad</th>
                                            <th>Contenido</th>
                                            <th>Color</th>
                                            <th>Estanteria</th>
                                            <th>Leja</th>
                                            <th>Fecha entrada</th>
                                        </tr>
                                        <?php
                                        $estanterias = $ListaCajasS->getArrayEstanteriaCajas();
                                        foreach ($estanterias as $array) {
                                            $cajas = $array->getArrayCajas();
                                           // print_r($cajas);
                                            foreach ($cajas as $leja=>$caja){
                                                if (get_class($caja)=="CajaSorpresa"){
                                                     
                                            ?>
                                            <tr class="tabla_cajas">
                                                <td><?php echo $caja->getCodigo() ?> </td>
                                                <td><?php echo $caja->getAltura() ?> </td>
                                                <td><?php echo $caja->getAnchura() ?> </td>
                                                <td><?php echo $caja->getProfundidad() ?> </td>
                                                <td><?php echo $caja->getContenido() ?></td>
                                                <td style="background: <?php echo $caja->getColor() ?>"> <?php echo $caja->getColor() ?> </td>
                                                <td><?php echo $array->getCodEstanteria() ?> </td>
                                                <td><?php echo $leja?> </td>
                                                <td><?php echo $caja->getFechaEntrada() ?> </td>
                                            </tr>
                                        <?php  }} } ?>
                                    </table>
                                    <br>
                                </div>
                                <div id="CajaNegra">
                                    <h3>Cajas Negras</h3>
                                    <table id="tablaListas">
                                        <tr>
                                            <th>Código</th>
                                            <th>Altura</th>
                                            <th>Anchura</th>
                                            <th>Profundidad</th>
                                            <th>Placa</th>
                                            <th>Color</th>
                                            <th>Estanteria</th>
                                            <th>Leja</th>
                                            <th>Fecha entrada</th>
                                        </tr>
                                         <?php
                                       $estanterias = $ListaCajasS->getArrayEstanteriaCajas();
                                        foreach ($estanterias as $array) {
                                            $cajas = $array->getArrayCajas();
                                           // print_r($cajas);
                                            foreach ($cajas as $leja=>$caja){
                                                if (get_class($caja)=="CajaNegra"){
                                                     
                                            ?>
                                            <tr class="tabla_cajas">
                                                <td><?php echo $caja->getCodigo() ?> </td>
                                                <td><?php echo $caja->getAltura() ?> </td>
                                                <td><?php echo $caja->getAnchura() ?> </td>
                                                <td><?php echo $caja->getProfundidad() ?> </td>
                                                <td><?php echo $caja->getPlaca() ?></td>
                                                <td style="background: <?php echo $caja->getColor() ?>"> <?php echo $caja->getColor() ?> </td>
                                                <td><?php echo $array->getCodEstanteria() ?> </td>
                                                <td><?php echo $leja ?> </td>
                                                <td><?php echo $caja->getFechaEntrada() ?> </td>
                                            </tr>
                                        <?php  }} } ?>
                                    </table>
                                    <br>
                                </div>
                                <div id="CajaFuerte">
                                    <h3>Cajas Fuertes</h3>
                                    <table id="tablaListas">
                                        <tr>
                                            <th>Código</th>
                                            <th>Altura</th>
                                            <th>Anchura</th>
                                            <th>Profundidad</th>
                                            <th>Clave</th>
                                            <th>Color</th>
                                            <th>Estanteria</th>
                                            <th>Leja</th>
                                            <th>Fecha entrada</th>
                                        </tr>
                                       <?php
                                       $estanterias = $ListaCajasS->getArrayEstanteriaCajas();
                                        foreach ($estanterias as $array) {
                                            $cajas = $array->getArrayCajas();
                                           // print_r($cajas);
                                            foreach ($cajas as $leja=>$caja){
                                                if (get_class($caja)=="CajaFuerte"){
                                                     
                                            ?>
                                            <tr class="tabla_cajas">
                                                <td><?php echo $caja->getCodigo() ?> </td>
                                                <td><?php echo $caja->getAltura() ?> </td>
                                                <td><?php echo $caja->getAnchura() ?> </td>
                                                <td><?php echo $caja->getProfundidad() ?> </td>
                                                <td><?php echo $caja->getClaveDesbloqueo() ?></td>
                                                <td style="background: <?php echo $caja->getColor() ?>"> <?php echo $caja->getColor() ?> </td>
                                                <td><?php echo $array->getCodEstanteria() ?> </td>
                                                <td><?php echo $leja ?> </td>
                                                <td><?php echo $caja->getFechaEntrada() ?> </td>
                                            </tr>
                                        <?php  }} } ?>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <!-- footer -->

            </div>
        </div>

    </body>
</html>


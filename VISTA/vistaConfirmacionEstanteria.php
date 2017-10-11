<?php 
include_once '../MODELO/Users.php';
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];}
else{
header("Location:../index.php");}
$confirmacion = $_SESSION['confirmacionEstanterias'];
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir Estanteria</title>
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
                            <a class="logo" href="Menu.php">Point.co</a>
                            <strong class="slog">The most creative ideas</strong>
                        </h1>
                        <div class="search-form" id="search-form">					
                            <p id="usuario">Usuario: <span id="usuarioInfo"><?php echo $usuario->getUser() ?> </span> <a href="../CONTROLADOR/ControladorCerrarSesion.php" id="salir" >Salir</a>	</p>
                            
                            								
                        </div>
                    </div>

                </header>
                <!-- content -->
                <section class="caja">
                    <div class="titulo"></div>
                    <div id="textoConfirmacion">
                   <?php
                 if ($confirmacion===true){?>
                    <p style="color:green">Estantería añadida correctamente</p>
                        <?php }else if ($confirmacion===false){?>
                     <p style="color:red">No se ha podido añadir la estantería</p>
                        <?php } else {?>
                     <p style="color:yellow"><?php echo $confirmacion ?></p>
                        <?php } ?>
                    </div>
                    <div id="botonesConfirmacion">
                        <a href="FormularioEstanteria.php" class="button-2" id="atras">Atrás</a>
                        <a href="Menu.php" class="button-2" id="menu">Menú</a>
                        
                    </div>
                </section>

            </div>
        </div>
       
    </body>
</html>
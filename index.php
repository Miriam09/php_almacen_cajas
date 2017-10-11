<!DOCTYPE html>
<?php 
include_once "MODELO/Users.php";
session_start();
if (isset($_SESSION['usuario'])){
$usuario=$_SESSION['usuario'];
header("Location: VISTA/Menu.php");
}

?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="shortcut icon" href="images/caja.png">
    
        <script type="text/javascript" src="js/MiJavaScript.js"></script>
        <link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<!--        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/cufon-replace.js" type="text/javascript"></script>
        <script src="js/Open_Sans_400.font.js" type="text/javascript"></script>
        <script src="js/Open_Sans_Light_300.font.js" type="text/javascript"></script>
        <script src="js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>-->
        <script src="js/FF-cash.js" type="text/javascript"></script>

    </head>
    <body id="page4">
        <!-- header -->
        <div class="bg">
            <div class="main">
                <header>
                    <div class="row-1">
                        <h1>
                            <a class="logo" href="index.php">Point.co</a>
                            <strong class="slog">The most creative ideas</strong>
                        </h1>

                    </div>

                </header>
                <!-- content -->
                <section class="login">
                    <div class="titulo">Staff Login</div>
                    <form action="CONTROLADOR/ControladorUsuarios.php" method="post" enctype="application/x-www-form-urlencoded">
                        <input type="text" required title="Username required" placeholder="Username" data-icon="U" name="user" id="user">
                        <input type="password" required title="Password required" placeholder="Password" data-icon="x" name="pass" id="pass">
                        <?php if(isset($_SESSION['validacion'])){
                                $validacion = $_SESSION['validacion']; 
                                if ($validacion == false) {?>
                        <div id="error" class="error"><p>Usuario o contraseña incorrecto</p></div>
                                <?php } }?>
                        <div class="olvido">
                            <!--<div class="col"><a href="VISTA/NuevoUsuario.php" title="Ver Carácteres">Nuevo usuario</a></div>-->
                            <!--<div class="col"><a href="#" title="Recuperar Password">Forgot Password?</a></div>-->
                        </div>
                        <input type="submit" class="enviar" value="Submit" onclick="comprobarUsuarios(<?php $validacion ?>)">
                    </form>
                </section>

            </div>
        </div>
       
    </body>
</html>
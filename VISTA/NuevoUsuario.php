<!DOCTYPE html>
<?php 

?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="shortcut icon" href="../images/caja.png">
    
        <script type="text/javascript" src="../js/MiJavaScript.js"></script>
        <link rel="stylesheet" href="../css/estilos.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen">
        <script type="text/javascript" src="../js/jquery-1.6.min.js"></script>
<!--        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/cufon-replace.js" type="text/javascript"></script>
        <script src="js/Open_Sans_400.font.js" type="text/javascript"></script>
        <script src="js/Open_Sans_Light_300.font.js" type="text/javascript"></script>
        <script src="js/Open_Sans_Semibold_600.font.js" type="text/javascript"></script>-->
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

                    </div>

                </header>
                <!-- content -->
                <section class="login register">
                    <div class="titulo">Staff Register</div>
                    <form action="CONTROLADOR/ControladorNuevoUsuario.php" method="post" enctype="application/x-www-form-urlencoded">
                        <input type="text" required title="Username required" placeholder="Username" data-icon="U" name="user" id="user">
                        <input type="password" required title="Password required" placeholder="Password" data-icon="x" name="pass" id="pass">
                         <input type="password" required title="Password required" placeholder="Repeat Password" data-icon="x" name="pass2" id="pass2">
                         <input type="checkbox" id="administrador">Administrador
                         <br/>
                          <input type="password" required title="Password required" placeholder="Admin Password" data-icon="x" name="passAd" id="passAd">
                          <br/>
                          <input type="submit" class="enviar" value="Submit" onclick="comprobarUsuarios(<?php $validacion ?>)">
                    </form>
                </section>

            </div>
        </div>
       
    </body>
</html>

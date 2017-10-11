<?php

$nombreBase = "almacen_cajas_2015";
$user = "root";
$pass = "root";
$host = "localhost";

$conexion = new mysqli($host, $user, $pass, $nombreBase);
if ($conexion){
    //echo "Conexión con base de datos establecida";
    mysqli_select_db($conexion, $nombreBase)
                or die("Base de datos no encontrada");
}
else {
    echo "Error en la conexión con la base de datos";
}


//conexion igual

//$conexion = new mysqli($host, $password,$port, $socket);
//        $error = $conexion->connect_error;
//        if ($error!=null){
//            echo "<p> $error conecntado a labase de datos $conexion->connect_error <p>";
//            exit();
//            
//        }
//    else{
//        
//    }
//}





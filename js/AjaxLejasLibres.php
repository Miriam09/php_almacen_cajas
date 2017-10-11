<?php

include_once '../DAO/Operaciones.php';
$CodEstanteria = $_REQUEST['estanteriaDisponible'];
//$lejaDisponible = Operaciones::LejasLibres($CodEstanteria);
//echo $lejaDisponible;

    session_start();
    $lejasDisponibles= Operaciones::LejasLibresEstanteria($CodEstanteria);
    
    echo '<option value="">--choose--</option>';
    foreach($lejasDisponibles as $lejas){
        if( is_numeric($lejas)){
        echo '<option value="'.$lejas.'">'.$lejas.'</option>';}
    }
    

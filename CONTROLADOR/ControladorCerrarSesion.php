<?php
session_start();

if (isset($_SESSION['usuario'])){
    
    session_destroy();
    header("Location: ../index.php");
}
else{
    header("Location: ../index.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


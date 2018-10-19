<?php
$conexion = new mysqli('localhost','root','admin','practica');
if($conexion->connect_error){
    die('Error en la conexion '.$conexion->connect_error);
}
?>
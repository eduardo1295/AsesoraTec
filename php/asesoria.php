<?php
require_once('Clases/maestro.php');
session_start();
if(isset($_POST['opcion']) && $_POST['opcion'] == "Agregar"){
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $departamento = $_POST['departamento'];
    if( $codigo != ""  && $nombre != "" && $nombre != ""){
        $maestro = new Maestro();
        $maestro->AgregarAsesoria($codigo,$nombre,$departamento,$_SESSION['noeconomico']);
        echo ("Se a Registrado Correctamente");
    }
    else{
        
    }
    
}
?>
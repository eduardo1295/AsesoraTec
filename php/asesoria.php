<?php
require_once('Clases/maestro.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['opcion']) && $_POST['opcion'] == "Agregar"){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        $semestre = $_POST['semestre'];
        if( $codigo != ""  && $nombre != "" && $nombre != "" && $semestre != ""){
            $maestro = new Maestro();
            $nombreMaestro = $maestro->RegresarNombre($_SESSION['noeconomico']);
            
            $maestro->AgregarAsesoria($codigo,$nombre,$departamento,$_SESSION['noeconomico'],$semestre,$nombreMaestro);
            echo ("Se a Registrado Correctamente");
        }
        else{
            echo ("Falta ingresar los datos");
        }  
    }
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
}
?>
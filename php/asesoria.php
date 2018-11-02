<?php
require_once('Clases/maestro.php');
session_start();
<<<<<<< HEAD
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
    
=======
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
>>>>>>> origin/RamaInzunza
}
?>
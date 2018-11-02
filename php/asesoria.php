<?php
require_once('Clases/maestro.php');
session_start();
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
    
if(isset($_POST['opcion']) && $_POST['opcion'] == "Agregar"){
    $nombre = $_POST['nombre'];
    if( $codigo != ""  && $nombre != "" && $nombre != ""){
        $maestro = new Maestro();
        $maestro->AgregarAsesoria($codigo,$nombre,$departamento,$_SESSION['noeconomico']);
        echo ("Se a Registrado Correctamente");
    }
    else{
        
    } 
}
?>
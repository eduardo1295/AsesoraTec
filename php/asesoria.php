<?php
require_once('Clases/maestro.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maestro = new Maestro();
        $codigo = $_POST['codigo'];
        $maestro->ObtenerDatos($_SESSION['noeconomico'],$maestro);
        $nombreMaestro = $maestro->Nombre;
        $nombreMateria = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        $semestre = $_POST['semestre'];
        if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $departamento != "" && $semestre !=""){
            $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre);
            echo ("Se a Registrado Correctamente");
        }
        else{
            echo ("Falta ingresar los datos");
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
}
?>
<?php
require_once('Clases/maestro.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $opcion = $_POST['opcion'];
        $maestro = new Maestro();
        $codigo = $_POST['codigo'];
        $maestro->ObtenerDatos($_SESSION['noeconomico'],$maestro);
        $nombreMaestro = $maestro->Nombre." ".$maestro->Ap_Pat." ".$maestro->Ap_Mat;
        $nombreMateria = $_POST['nombre'];
        $departamento = $_POST['departamento'];
        $semestre = $_POST['semestre'];
        $Horario =$_POST['horario'];
        $salon =$_POST['salon'];
        $asesor = $_POST['asesor'];
        $nocontrol= $_POST['nocontrol'];
        $bandera = horarioCompleto($Horario,$salon);
        
        if($opcion == "Agregar"){
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $departamento != "" && $semestre !="" && $bandera == 0)
            {
                if($asesor != "" && $nocontrol != ""){
                    $maestro->AgregarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                    $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre);
                    $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("Se a Registrado Correctamente");
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    
                    $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre);
                    $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("Se a Editado Correctamente");
                } 
            }
            else{
                echo ("Falta ingresar los datos");
            }
        }
        elseif ($opcion == "Editar") {
            
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $departamento != "" && $semestre !="" && $bandera == 0){
                if($asesor != "" && $nocontrol != ""){
                    $maestro->ActualizarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                    $maestro->ActualizarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("Se a Registrado Correctamente");
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $maestro->EliminarAsesor($codigo);
                    $maestro->ActualizarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("Se a Registrado Correctamente");
                }
            
            }
            else{
                echo ("Falta ingresar los datos");
            }
        }   
}
function horarioCompleto($horario,$salon)
{
    for ($i=0; $i < 5 ; $i++) { 
        if ($horario[$i] != "") {
            if($salon[$i] == ""){
                return 1;
            }
        }
        elseif($salon[$i] != "") {
            return 1;
        }
    }
    return 0;
}

?>
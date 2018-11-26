<?php
require_once('Clases/maestro.php');
session_start();
$vacio = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $opcion = $_POST['opcion'];
        $maestro = new Maestro();
        $codigo = $_POST['codigo'];
        $maestro->ObtenerDatos($_SESSION['noeconomico'],$maestro);
        $nombreMaestro = $maestro->Nombre." ".$maestro->Ap_Pat." ".$maestro->Ap_Mat;
        $nombreMateria = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $semestre = $_POST['semestre'];
        $Horario =$_POST['horario'];
        $salon =$_POST['salon'];
        $asesor = $_POST['asesor'];
        $nocontrol= $_POST['nocontrol'];
        $bandera = horarioCompleto($Horario,$salon);
        $res = horarioVacio($Horario,$salon);
        if($opcion == "Agregar"){
            if($res == 1)
            {  
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $tipo != "" && $semestre !="" && $bandera == 0)
            {
                if($asesor != "" && $nocontrol != ""){
                    $client = new SoapClient("https://siia.lapaz.tecnm.mx/webserviceitlp.asmx?WSDL");
                    $result = $client->estaInscrito(array('control' =>$nocontrol, 'contrasena' => '*3%f&Y2b'))->estaInscritoResult;
                        if($result == false)
                            echo "El alumno no esta vigente en el Instituto Tecnológico de La Paz";
                        else {
                            $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre);
                            if($correcto ==1){
                                $maestro->AgregarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                                $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                                echo ("Se a Registrado Correctamente");
                            }
                            else
                                echo "La asesoria ya ha sido registrada";        
                        }
                    
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre);
                    if($correcto == 1){
                        $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                        echo "La asesoria se registro correctamente";
                    }
                    else
                        echo "La asesoria ya ha sido registrada";
                } 
                }
                else{
                    echo ("Falta ingresar los datos");
                }
            }
            else {
            {echo "El horario esta vacío";}
            }
        }
        elseif ($opcion == "Editar") {
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $tipo != "" && $semestre !="" && $bandera == 0){
                if($asesor != "" && $nocontrol != ""){
                    $maestro->ActualizarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("aaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $maestro->EliminarAsesor($codigo);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb");
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
function horarioVacio($horario,$salon)
{
    $resultado = 0;
    for ($i=0; $i < 5 ; $i++) { 
        if ($horario[$i] == $salon[$i] && $horario[$i]=="") {
        }
        else {
            $resultado=1;
            break;
        }
    }
    return $resultado;
}
?>
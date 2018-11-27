<?php
require_once('Clases/admin.php');
session_start();
$admin = new admin();
$econ = $_POST['eco'];
$codigo = $_POST['codigo'];
$nombreMateria = $_POST['nombre'];
$tipo = $_POST['tipo'];
$semestre = $_POST['semestre'];
$Horario =$_POST['horario'];
$salon =$_POST['salon'];
$asesor = $_POST['asesor'];
$nocontrol= $_POST['nocontrol'];
$bandera = horarioCompleto($Horario,$salon);
$res = horarioVacio($Horario,$salon);
        //$admin->ActualizarAsesor($codigo,$econ,$nocontrol,$asesor);
        $admin->ActualizarHorario($codigo,$econ,$salon,$Horario);
        echo ("aaaaaaaaaaaaaaaaaaaaaaaaaaaa");
    
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
function ValidarHorario($horario)
{
    $resultado = 0;
    for($i = 0;$i < 5;$i++)
    {
        if(!preg_match("/[0-9]{1,2}[-]{1}[0-9]{1,2}/",$horario[$i]) &&$horario[$i]!="")
        {
        return 1;
        }
    }
    return $resultado;
}


?>
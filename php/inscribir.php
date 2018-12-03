<?php 
require_once('Clases/alumno.php');
require_once('Clases/conexion.php');
session_start();
$nocontrol = $_SESSION['nocontrol'];
$codAsesoria = $_POST['cod'];
$noecon = $_POST['noecon'];
$alumno = new Alumno();
$conn = abrirBD();
$yainscrito = $alumno->YaInscrito($nocontrol,$codAsesoria);
$consultaHorario = "SELECT LUNES,MARTES,MIERCOLES,JUEVES,VIERNES FROM HORARIOS WHERE COD_MATERIA='$codAsesoria' AND NOECON='$noecon'";
$resHorario = $conn->query($consultaHorario);
$horario = array(); 
while($row = $resHorario->fetch_assoc())
{   
    $viernes = $row['VIERNES'];
    if(isset($viernes))
    {
        $horaViernes = explode(" ",$viernes);
        array_push($horario,$horaViernes[0]);
    }
     else
        array_push($horario,"0");
     if(isset($row['JUEVES']))
     {
        $horaJueves= explode(" ",$row['JUEVES']);
        array_push($horario,$horaJueves[0]);
     }
    else
    {
        array_push($horario,""); 
    }
    if(isset($row['MIERCOLES']))
    {
        $horaMiercoles = explode(" ",$row['MIERCOLES']);
        array_push($horario,$horaMiercoles[0]);
    }
    else
        array_push($horario,"");
    if(isset($row['MARTES']))
    {
        $horaMartes = explode(" ",$row['MARTES']);
        array_push($horario,$horaMartes[0]); 
    }
    else
        array_push($horario,"");
    if(isset($row['LUNES']))
    {
            $horaLunes = explode(" ",$row['LUNES']);
            array_push($horario,$horaLunes[0]);
    }
    else
     array_push($horario,$horaLunes[0]);
}

$cruza = false;
$cruza = $alumno->VerificarHorario($codAsesoria,$noecon,$nocontrol,$horario);

if($yainscrito>0)
{
    echo "Ya estabas inscrito a esta asesoría";
}
else
{
    if($cruza)
    {
   echo "No te puedes inscribir porque este horario tiene cruces con otra de tus asesorías";
    }
    else{
    $alumno->InscribirAsesoria($nocontrol,$codAsesoria,$noecon);
    echo "Te inscribiste a la asesoría!";
    }
}
?>
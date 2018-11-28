<?php 
require_once('Clases/alumno.php');
session_start();
$nocontrol = $_SESSION['nocontrol'];
$codAsesoria = $_POST['codigo'];
$noecon = $_POST['noecon'];
$alumno = new Alumno();
$yainscrito = $alumno->YaInscrito($nocontrol,$codAsesoria);
if($yainscrito>0)
{
    echo "Error: ya estabas inscrito a esta asesoría";
}
else{
    $alumno->InscribirAsesoria($nocontrol,$codAsesoria,$noecon);
    echo "Te inscribiste a la asesoría!";
}

?>
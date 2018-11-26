<?php
session_start(); 
if($_SESSION['logeado']!="SI")
{
    header("Location: login.php");
}
require_once('Clases/alumno.php');
$alumno = new Alumno();
$contraseña = $_POST['contra'];
$nocontrol = $_POST['control'];
$fecha = $_POST['fecha'];
$codigo = $_POST['cod'];
$nombre = $_POST['nm'];
$valida = $alumno->ValidaContra($contraseña,$codigo,$fecha);
$yaregistrada = $alumno->AsistenciaYaRegistrada($nocontrol,$fecha,$codigo,$nombre);
if($yaregistrada == 0)
{
if($valida > 0)
{
    $alumno->RegistrarAsistencia($nocontrol,$fecha,$codigo,$nombre,$contraseña);
    echo "Asistencia registrada!";
}
else 
{
    echo "La contraseña no es válida!";
}
}
else{
    echo "Ya registraste tu asistencia de hoy!";
}
?>
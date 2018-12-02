<?php
session_start(); 
if($_SESSION['logeado']!="SI")
{
    header("Location: login.php");
}
require_once('Clases/alumno.php');
$alumno = new Alumno();
$contraseña = $_POST['pass'];
$nocontrol = $_SESSION['nocontrol'];
$fecha = $_POST['fe'];
$codigo = $_POST['cod'];
$noecon = $_POST['ne'];
$valida = $alumno->ValidaContra($contraseña,$codigo,$fecha,$noecon);
$yaregistrada = $alumno->AsistenciaYaRegistrada($nocontrol,$fecha,$codigo,$noecon);
if($yaregistrada == 0)
{
if($valida > 0)
{
    $alumno->RegistrarAsistencia($nocontrol,$fecha,$codigo,$noecon,$contraseña);
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
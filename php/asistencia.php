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
$fecha = $_POST['fecha'];
$codigo = $_POST['cod'];
$noecon = $_POST['ne'];
$valida = $alumno->ValidaContra($contraseña,$codigo,$fecha,$noecon);
$yaregistrada = $alumno->AsistenciaYaRegistrada($nocontrol,$fecha,$codigo,$noecon);
if($yaregistrada == 0)
{
    if($valida > 0)
    {
    $alumno->RegistrarAsistencia($nocontrol,$fecha,$codigo,$noecon,$contraseña);
    echo "<p class='alert alert-success'>Asistencia registrada!</p>";
    }
    else 
    {
    echo "<p class='alert alert-danger'>La contraseña no es válida!</p>";
    }
}
else{
    echo "<p class='alert alert-danger'>Ya registraste tu contraseña de hoy!</p>";
}
?>
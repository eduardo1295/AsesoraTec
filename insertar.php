<?php 
require('php/Clases/alumno.php');
$alumno = new Alumno();
$alumno->setNo_Control($_POST['nocontrol']);
$alumno->setContraseña($_POST['contraseña']);
$alumno->setNombre($_POST['nombre']);
$alumno->setAp_Pat($_POST['appat']);
$alumno->setAp_Mat($_POST['apmat']);
$alumno->setCarrera($_POST['carrera']);
$alumno->setSemestre($_POST['semestre']);
$alumno->setSexo("Hombre");
$alumno->setCorreo($_POST['correo']);
$alumno->InsertarAlumno($alumno);
header("Location:registrar.php");
?>


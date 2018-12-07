<?php
session_start();
require_once('Clases/alumno.php');
$nocontrol = $_SESSION['nocontrol'];
$codAsesoria = $_POST['cod'];
$noecon  = $_POST['noecon'];
$alumno = new Alumno();
$alumno->EliminarAsesoria($nocontrol,$codAsesoria,$noecon);
echo "Te diste de baja de esta asesoría!"; 
?>
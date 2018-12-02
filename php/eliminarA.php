<?php
session_start();
require_once('Clases/alumno.php');
$nocontrol = $_SESSION['nocontrol'];
$codAsesoria = $_POST['cod'];
$alumno = new Alumno();
$alumno->EliminarAsesoria($nocontrol,$codAsesoria);
echo "Te diste de baja de esta asesoría!"; 
?>
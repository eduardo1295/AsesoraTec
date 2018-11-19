<?php
require_once('Clases/alumno.php');
$nocontrol = $_POST['noc'];
$codAsesoria = $_POST['cod'];
$alumno = new Alumno();
$alumno->EliminarAsesoria($nocontrol,$codAsesoria);
echo 'Te diste de baja de esta asesoría!'; 
?>
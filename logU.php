<?php 
session_start();
 include('php/Clases/alumno.php');
$alumno = new Alumno();
$alumno->setNo_Control($_POST['nocontrol']);
$alumno->setContraseña($_POST['contra']);
$resultado = $alumno->LogearAlumno($alumno);
echo $resultado;
if($resultado>0){
    header("Location: menu1.php");
}


?>
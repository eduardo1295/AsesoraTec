<?php 
session_start();
 require_once('php/Clases/alumno.php');


$alumno = new Alumno();
$alumno->setNo_Control($_POST['nocontrol']);
$alumno->setContraseña($_POST['contra']);
$resultado = $alumno->LogearAlumno($alumno);
require_once('php/Clases/maestro.php');
$maestro = new Maestro();
$maestro->setNo_Economico($_POST['nocontrol']);
$maestro->setContraseña($_POST['contra']);
$resultado2 = $maestro->LogearMaestro($maestro);
if($resultado>0){
    header("Location: menu1.php");
}
else if($resultado2>0){
    header("Location:menu2.php");
}
else{
session_destroy();
header("Location: login.php");
}
?>
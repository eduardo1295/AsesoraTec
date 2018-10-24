<?php 
session_start();
 require_once('php/Clases/alumno.php');
 require_once('php/Clases/maestro.php');

$alumno = new Alumno();
$alumno->setNo_Control($_POST['nocontrol']);
$alumno->setContraseña($_POST['contra']);
$resultado = $alumno->LogearAlumno($alumno);

$maestro = new Maestro();
$maestro->setNo_Economico($_POST['nocontrol']);
$maestro->setContraseña($_POST['contra']);
$resultado2 = $maestro->LogearMaestro($maestro);



if($resultado>0){
    $nocontrol = $alumno->No_Control;
    
    $_SESSION['nocontrol'] = $alumno->No_Control;
    header("Location: menu1.php?nocontrol=$nocontrol");
}
else if($resultado2>0){
    $_SESSION['noeconomico'] = $maestro->No_Economico;
    header("Location:menu2.php");
}
else{

header("Location: login.php");
}

?>
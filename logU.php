<?php 
session_start();
require_once('php/Clases/alumno.php');
require_once('php/Clases/maestro.php');
require_once('php/Clases/admin.php');
$alumno = new Alumno();
$alumno->setNo_Control($_POST['numero']);
$alumno->setContraseña($_POST['contra']);
$resultado = $alumno->LogearAlumno($alumno);
$maestro = new Maestro();
$maestro->setNo_Economico($_POST['numero']);
$maestro->setContraseña($_POST['contra']);
$resultado2 = $maestro->LogearMaestro($maestro);
$admin = new Admin();
$admin->SetUsuario($_POST['numero']);
$admin->SetContraseña($_POST['contra']);
$resultado3= $admin->LogearAdmin($admin);
if($resultado>0){
    $nocontrol = $alumno->No_Control; 
    
    $_SESSION['nocontrol'] = $nocontrol;
    $_SESSION['logeado'] = "SI";
    header("Location:menu1.php");
}
else if($resultado2>0){
    $_SESSION['noeconomico'] = $maestro->No_Economico;
    $_SESSION['maestrologeado'] = "SI";
    header("Location: menu2.php");
}
else if($resultado3>0){
    $usuario= $admin->Usuario;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['usuariologeado'] = "SI";
   header("Location:MenuAdministrado.php");
}
else{
header("Location: login.php");
}

?>
<?php 
    require('Clases/alumno.php');
    $alumno = new Alumno();
    $alumno->setNo_Control($_POST['noc']);
    $nocontrol = strip_tags($_POST['noc']);
    $nc=$nocontrol;
    $alumno->setContraseña(strip_tags($_POST['pwd']));
    $alumno->setNombre(strip_tags($_POST['nom']));
    $alumno->setAp_Pat(strip_tags($_POST['ap']));
    $alumno->setAp_Mat(strip_tags($_POST['am']));
    $alumno->setCarrera(strip_tags($_POST['car']));
    $alumno->setSemestre(strip_tags($_POST['sem']));
    $alumno->setSexo(strip_tags($_POST['sex']));
    $alumno->setCorreo(strip_tags($_POST['email']));
    $alumno->ActualizarDatos($alumno);
    echo "Perfil guardado!";
?>

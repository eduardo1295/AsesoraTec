<?php 
    require('Clases/alumno.php');
    $alumno = new Alumno();
    $alumno->setNo_Control($_POST['noc']);
    $nocontrol = $_POST['noc'];
    $nc=$nocontrol;
    $alumno->setContraseña($_POST['pwd']);
    $alumno->setNombre($_POST['nom']);
    $alumno->setAp_Pat($_POST['ap']);
    $alumno->setAp_Mat($_POST['am']);
    $alumno->setCarrera($_POST['car']);
    $alumno->setSemestre($_POST['sem']);
    $alumno->setSexo($_POST['sex']);
    $alumno->setCorreo($_POST['email']);
    $alumno->ActualizarDatos($alumno);
    echo "Perfil guardado!";
?>

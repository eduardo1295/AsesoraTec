<?php 
    require('Clases/maestro.php');
    $maestro = new Maestro();
    $maestro->setNo_Economico($_POST['noc']);
    $noecono = $_POST['noc'];
    $nc=$noecono;
    $maestro->setContraseña($_POST['pwd']);
    $maestro->setNombre($_POST['nom']);
    $maestro->setAp_Pat($_POST['ap']);
    $maestro->setAp_Mat($_POST['am']);
    $maestro->setDepartamento($_POST['dep']);
    $maestro->setCorreo($_POST['email']);
    $maestro->ActualizarDatos($maestro);
    echo "Perfil guardado!";
?>
<?php 
    require('Clases/admin.php');
    $materias = new Admin();
    
    $noecono = $_POST['noc'];
    $materias->setCodigo($noecono);
    $materias->setNombrem($_POST['nom']);
    $materias->setTipo($_POST['tp']);
    $materias->setSemestre($_POST['sem']);
    $materias->ActualizarDatos($materias);
    echo "Materia Modificada!";
?>
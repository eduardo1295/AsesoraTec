<?php 
    require_once('Clases/admin.php');
    session_start();
    $materia = new Admin();
    $codigo =$_POST['cod'];
    $nombrem =$_POST['nm'];
    $tipo =$_POST['tp'];
    $semestre =$_POST['sem'];
        
    $materia->setCodigo($_POST['cod']);
    $materia->setNombrem($_POST['nm']);
    $materia->setTipo($_POST['tp']);
    $materia->setSemestre($_POST['sem']);
    $materia->InsertarMateria($materia);
    echo("Materia registrada!");
            
?>
    
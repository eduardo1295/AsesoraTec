<?php 
include('php/Clases/alumno.php');
$alumno = new Alumno();
$alumno->setNo_Control($_POST['nocontrol']);
$alumno->setContraseña($_POST['contraseña']);
   $conexion = abrirBD();
    $SQL= "SELECT * FROM alumno WHERE nocontrol=?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("s",$nocontrol);
    $nocontrol =$alumno->No_Control;
    echo $nocontrol;
    $sentencia_preparada1->execute();
    $row = $sentencia_preparada1->fetch();
    $result =$row['nombre'];
echo $result;
?>
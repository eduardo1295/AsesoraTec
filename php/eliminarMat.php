<?php
session_start();
require_once('Clases/maestro.php');
require_once('Clases/conexion.php');

if (isset($_POST['cod'])) {
    $conexion = abrirBD();
    $codi = $_POST['cod'];
    $nc = $_SESSION['noeconomico'];
    var_dump ($codi);
    $SQL= "UPDATE asesorias SET Activo = 'No' WHERE codigo=? AND NOECON = ?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("ss",$cod,$nom);
    $cod =$codi;
    $nom = $nc;
    $sentencia_preparada1->execute();
    $conexion->close();
 
}
else {
    echo "Nel";
}


?>
<?php
session_start();
require_once('Clases/conexion.php');
require_once('Clases/maestro.php');

$bandera = 0;
$maestro = new maestro();
$clave = $_POST['contra'];
$codigo = $_POST['ap'];
$fecha = $_POST['fec'];
$noecon = $_SESSION['noeconomico'];
$maestro->ObtenerDatos($noecon,$maestro);
$nom_Maestro = $maestro->Nombre.' '. $maestro->Ap_Pat.' '.$maestro->Ap_Mat;
$con = abrirBD();
$SQL ="SELECT COUNT(*) as cantidad, passw as clave FROM PASS WHERE NOECON = ? AND Codigo_Asesoria= ? AND Fecha = ?";
$preparada = $con->prepare($SQL);
$preparada->bind_param("sss",$noe,$cod,$fec);
$noe = $noecon;
$cod = $codigo;
$fec = $fecha;
$preparada->execute();
$result = $preparada->get_result();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $ids =  $row['cantidad'];
        $cla = $row['clave'];
    }
}
if($ids == 0)
    $bandera = 1;
    


$con->close();
if($bandera == 1){
    $con = abrirBD();
    $SQL = "INSERT INTO pass VALUES (?,?,?,?,?)";
    $preparada = $con->prepare($SQL);
    $preparada->bind_param("sssss",$cla,$cod,$fec,$nom,$noe);
    $cla = $clave;
    $cod = $codigo;
    $fec = $fecha;
    $nom = $nom_Maestro;
    $noe = $noecon;
    $preparada->execute();
    $con->close();
    echo "Clave registrada es: ". $clave;
}
else
    echo "Clave registrada es: ". $cla;

?>

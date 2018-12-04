<?php 
session_start();
include 'plantilla.php';
require 'php/Clases/conexion.php';
require 'php/Clases/maestro.php';
require 'php/Clases/asesoria.php';
if($_SESSION['maestrologeado']!='SI'){
    header("Location: login.php");
}
$asesoria = new asesoria();
$maestro = new maestro();
$nocontrol= $_SESSION['noeconomico'];
$maestro->ObtenerDatos($nocontrol,$maestro);
$nc = $nocontrol;
$nombre = utf8_encode($maestro->Nombre);
$appat =  utf8_encode($maestro->Ap_Pat);
$apmat =  utf8_encode($maestro->Ap_Mat);
$nombrecompleto = $nombre." ".$appat." ".$apmat;
$codigo = $_GET['eliminar'];
$asesoria->ObtenerAsesoria($codigo,$nocontrol,$asesoria);
$mat = $asesoria->Nombre;
$conexion = abrirBD();
$SQL = "SELECT`nocontrol`,`nombre`,`Ap_pat`,`Ap_Mat`,`carrera`,`semestre` FROM `alumno`,`asesoriasreg` WHERE `control_alumno` = `nocontrol` AND `codigo_asesoria` = ?";
$STMT = $conexion->prepare($SQL);
$STMT->bind_param("s",$cod);
$cod = $codigo;
$STMT->execute();
$STMT->bind_result($nocont,$nombre,$Ap_pat,$Ap_Mat,$carrera,$semestre);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetXY(20,40);
$pdf->Cell(60,8,"Maestro: $nombrecompleto",0,0,'C');
$pdf->Cell(160,8,"Materia: $mat ",0,0,'C');


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,50);

$pdf->Cell(25,6,"No Control",1,0,"C",1);
$pdf->Cell(120,6,utf8_decode("Nombre"),1,0,"C",1);
$pdf->Cell(25,6,"Semestre",1,1,"C",1);

while($row = $STMT->fetch()){
$pdf->SetX(20);
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,6,utf8_encode($nocont),1,0,"C");
$nombre  = utf8_decode($nombre);
$paterno = utf8_decode($Ap_Mat);
$materno = utf8_decode($Ap_pat);
$pdf->Cell(120,6,$nombre.' '.$paterno.' '. $materno,1,0,"C");
$pdf->Cell(25,6,utf8_encode($semestre),1,1,"C");
}
$pdf->Output();
?>
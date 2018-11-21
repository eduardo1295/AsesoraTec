<?php 
include 'plantilla.php';
require 'php/Clases/conexion.php';
$consulta = "SELECT`nocontrol`,`nombre`,`Ap_pat`,`Ap_Mat`,`carrera`,`semestre` FROM `alumno`,`asesoriasreg` WHERE `control_alumno` = `nocontrol` AND `codigo_asesoria` = 33";
$conexion = abrirBD();
$resultado =$conexion->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,40);
$pdf->Cell(25,6,"No Control",1,0,"C",1);
$pdf->Cell(60,6,utf8_decode("Nombre"),1,0,"C",1);
$pdf->Cell(40,6,"Carrera",1,0,"C",1);
$pdf->Cell(40,6,"Semestre",1,1,"C",1);

while($row = $resultado->fetch_assoc()){
$pdf->SetX(20);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,6,utf8_encode($row['nocontrol']),1,0,"C");
$nombre  = utf8_decode($row['nombre']);
$paterno = utf8_decode($row['Ap_pat']);
$materno = utf8_decode($row['Ap_Mat']);
$pdf->Cell(60,6,$nombre.' '.$paterno.' '. $materno,1,0,"C");
$pdf->Cell(40,6,utf8_encode($row['carrera']),1,0,"C");
$pdf->Cell(40,6,utf8_encode($row['semestre']),1,1,"C");
}
$pdf->Output();
?>
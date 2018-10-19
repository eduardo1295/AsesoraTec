<?php 
include 'plantilla.php';
require 'conexion.php';
$consulta = "Select * from usuarios";
$resultado =$conexion->query($consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,30);
$pdf->Cell(50,6,"USUARIO",1,0,"C",1);
$pdf->Cell(50,6,utf8_decode("CONTRASEÑA"),1,0,"C",1);
$pdf->Cell(70,6,"CORREO",1,1,"C",1);
while($row = $resultado->fetch_assoc()){
$pdf->SetX(20);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,6,utf8_decode($row['Nombre']),1,0,"C");
$pdf->Cell(50,6,utf8_decode($row['Contraseña']),1,0,"C");
$pdf->Cell(70,6,utf8_decode($row['Correo']),1,1,"C");
}
$pdf->Output();
?>
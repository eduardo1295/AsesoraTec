<?php 
include 'plantilla2.php';
require 'php/Clases/conexion.php';
$consulta = "SELECT horarios.Maestro, asesorias.Nombre_Materia,Lunes,Martes,Miercoles,Jueves,Viernes from asesorias,horarios where Cod_Materia = Codigo and TIPO= 'Ciencias Basicas'";
$conexion = abrirBD();
$resultados =$conexion->query($consulta);
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,40);
$pdf->Cell(35,6,"Asesor",1,0,"C",1);
$pdf->Cell(60,6,"Materia",1,0,"C",1);
$pdf->Cell(30,6,"Lunes",1,0,"C",1);
$pdf->Cell(30,6,"Martes",1,0,"C",1);
$pdf->Cell(30,6,"Miercoles",1,0,"C",1);
$pdf->Cell(30,6,"Jueves",1,0,"C",1);
$pdf->Cell(30,6,"Viernes",1,1,"C",1);


while($rows = $resultados->fetch_assoc())
{
$pdf->SetX(20);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(35,6,$rows['Maestro'],1,0,"C");
$pdf->Cell(60,6,$rows['Nombre_Materia'],1,0,"C");
$pdf->Cell(30,6,$rows['Lunes'],1,0,"C");
$pdf->Cell(30,6,$rows['Martes'],1,0,"C");
$pdf->Cell(30,6,$rows['Miercoles'],1,0,"C");
$pdf->Cell(30,6,$rows['Jueves'],1,0,"C");
$pdf->Cell(30,6,$rows['Viernes'],1,1,"C");
}
$pdf->ln(20);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(270,6,'Atentamente',0,1,"C");
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(110,6,'ING.HECTOR I. GUERRERO LAFARGA,',0,0,'C');
$pdf->Cell(200,6,'ING.LAMBERTO VILLEGAS MONTOYA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(110,6,'JEFE DEL DEPTO. DE CS. BASICAS',0,0,'C');
$pdf->Cell(200,6,'PRESIDENTE ACADEMIA DE CS. BASICAS',0,1,'C');
$pdf->Output();
?>
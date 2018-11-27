<?php 
include 'plantillahorarioalumno.php';
require 'php/Clases/conexion.php';
$nc = $_GET['cod'];
$consulta = "SELECT NOECON, nombre,AP_Pat,Ap_Mat,Departamento from maestros where NOECON ='$nc'";
$conexion = abrirBD();
$resultados =$conexion->query($consulta);
while($resul = mysqli_fetch_array($resultados)){ 
    $numeco = $resul[0];
    $Nombrea = $resul[1];
    $Ape_pat = $resul[2];
    $Ape_mat = $resul[3];
    $semestre = $resul[4];
    }
$conexion-> close();
$nombrecompleto = $Nombrea." ".$Ape_pat." ".$Ape_mat;
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetXY(20,45); 
$pdf->SetFont('Arial','B',16);
$pdf->Cell(45,6,"Nombre: "."$numeco",0,0,'C');
$pdf->Cell(130,6,"$nombrecompleto",0,0,'C');
$pdf->Cell(110,6,"Departamento: "."$semestre",0,1,'C');
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,60);
$pdf->Cell(35,6,"Nombre",1,0,"C",1);
$pdf->Cell(60,6,"Materia",1,0,"C",1);
$pdf->Cell(30,6,"Lunes",1,0,"C",1);
$pdf->Cell(30,6,"Martes",1,0,"C",1);
$pdf->Cell(50,6,"Miercoles",1,0,"C",1);
$pdf->Cell(30,6,"Jueves",1,0,"C",1);
$pdf->Cell(30,6,"Viernes",1,1,"C",1);
$pdf->Output();
?>
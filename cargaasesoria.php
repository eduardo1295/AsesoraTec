<?php 
include 'plantillahorarioalumno.php';
require 'php/Clases/conexion.php';
session_start();
$nc = $_SESSION['nocontrol'];
$existe = $alumno->AlumnoExists($nocontrol);
if($existe == 0)
{
    header("Location: login.php");
}
$consulta = "SELECT nocontrol, nombre,AP_Pat,Ap_Mat,Semestre from alumno where nocontrol ='$nc'";
$conexion = abrirBD();
$resultados =$conexion->query($consulta);
while($resul = mysqli_fetch_array($resultados)){ 
    $numcontrol = $resul[0];
    $Nombrea = $resul[1];
    $Ape_pat = $resul[2];
    $Ape_mat = $resul[3];
    $semestre = $resul[4];
    }
$conexion-> close();
$consulta = "SELECT horarios.Maestro, asesorias.Nombre_Materia,Lunes,Martes,Miercoles,Jueves,Viernes from asesoriasreg,horarios,asesorias where asesoriasreg.Control_Alumno = '$numcontrol' and asesoriasreg.Codigo_Asesoria = Cod_Materia and Cod_Materia = Codigo";
$conexion = abrirBD();
$resultados2 =$conexion->query($consulta);

$nombrecompleto = $Nombrea." ".$Ape_pat." ".$Ape_mat;
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetXY(40,45); 
$pdf->SetFont('Arial','B',16);
$pdf->Cell(45,6,"Nombre: "."$nombrecompleto",0,0,'C');
$pdf->Cell(130,6,"No. de control: "."$nc",0,0,'C');
$pdf->Cell(60,6,"Semestre: "."$semestre",0,1,'C');
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(20,75);
$pdf->Cell(35,6,"Asesor",1,0,"C",1);
$pdf->Cell(60,6,"Materia",1,0,"C",1);
$pdf->Cell(30,6,"Lunes",1,0,"C",1);
$pdf->Cell(30,6,"Martes",1,0,"C",1);
$pdf->Cell(30,6,"Miercoles",1,0,"C",1);
$pdf->Cell(30,6,"Jueves",1,0,"C",1);
$pdf->Cell(30,6,"Viernes",1,1,"C",1);

while($rows = $resultados2->fetch_assoc())
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
$pdf->Output();
?>
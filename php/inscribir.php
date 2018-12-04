<?php 
require_once('Clases/alumno.php');
require_once('Clases/conexion.php');
session_start();
$nocontrol = $_SESSION['nocontrol'];
$codAsesoria = $_POST['cod'];
$noecon = $_POST['noecon'];
$alumno = new Alumno();
$conn = abrirBD();
$yainscrito = $alumno->YaInscrito($nocontrol,$codAsesoria,$noecon);
$consultaHorario = "SELECT LUNES,MARTES,MIERCOLES,JUEVES,VIERNES FROM HORARIOS WHERE COD_MATERIA='$codAsesoria' AND NOECON=$noecon";
$resHorario = $conn->query($consultaHorario);
$horario = array(); 
$pruebaLunes="";
$pruebaMartes="";
$pruebaMiercoles="";
$pruebaJueves="";
$pruebaViernes="";
while($row = $resHorario->fetch_assoc())
{   
        $viernes = $row['VIERNES'];
        $pruebaViernes=$viernes;
        $jueves = $row['JUEVES'];
        $pruebaJueves = $jueves;
        $miercoles = $row['MIERCOLES'];
        $pruebaMiercoles = $miercoles;
        $martes = $row['MARTES'];
        $pruebaMartes = $martes;
        $lunes =$row['LUNES'];
        $pruebaLunes = $lunes;
}
$auxLun ="";
$auxMar="";
$auxMie="";
$auxJue="";
$auxVie="";
for($i=0;$i<strlen((string)$pruebaLunes);$i++)
{
    if($pruebaLunes[$i]!=' ')
        $auxLun.=$pruebaLunes[$i];
    else
        break;
}
$horaLunes = explode(' ',$pruebaLunes);
$auxLun = $horaLunes[0];
$horaMartes = explode(' ',$pruebaMartes);
$auxMar = $horaMartes[0];
$horaMiercoles = explode(' ',$pruebaMiercoles);
$auxMie = $horaMiercoles[0];
$horaJueves = explode(' ',$pruebaJueves);
$auxJue = $horaJueves[0];
$horaViernes = explode(' ',$pruebaViernes);
$auxVie = $horaViernes[0];
array_push($horario,$auxVie);
array_push($horario,$auxJue);
array_push($horario,$auxMie);
array_push($horario,$auxMar);
array_push($horario,$auxLun);
$cruza = $alumno->VerificarHorario($codAsesoria,$noecon,$nocontrol,$horario);
 if($yainscrito>0)
 {
     echo "Ya estabas inscrito a esta asesoría.";
 }
 else if(!$cruza)
 {
     $alumno->InscribirAsesoria($nocontrol,$codAsesoria,$noecon);
     echo "Te inscribiste a la asesoría!";
 }
 else{
     echo "Este horario se cruza con tus asesorías."; 
 }
?>
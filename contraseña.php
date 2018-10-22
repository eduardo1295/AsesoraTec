<?php 
include('php/Clases/Alumno.php');
$alumno = new Alumno();
$alumno->setNo_Control($_POST['id']);
if($alumno->CorreoAlumno($alumno)){
    echo "El la contraseña se envio correctamente";
}
?> 
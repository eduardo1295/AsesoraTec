<?php 
    require('Clases/alumno.php');
    $alumno = new Alumno();
    $alumno->setNo_Control($_POST['noc']);
    $nocontrol = strip_tags($_POST['noc']);
    $nc=$nocontrol;
    $contraseña =strip_tags($_POST['pwd']);
    $nombre =strip_tags($_POST['nom']);
    $appat =strip_tags($_POST['ap']);
    $apmat =strip_tags($_POST['am']);
    $carrera =strip_tags($_POST['car']);
    $semestre =strip_tags($_POST['sem']);
    $sexo=strip_tags($_POST['sex']);
    $correo = strip_tags($_POST['email']);
if(strlen($nc)!=8)
{
    echo "El número de control debe ser de 8 caracteres";
}
else if(strlen($nombre)>50)
{
echo "Nombre demasiado largo (Máx. 50 carac.)";
}
else if(strlen($contraseña)>20)
{
echo "Contraseña demasiado larga (Máx. 20 carac.)";
}
else if(strlen($appat)>50)
{
echo "Apellido paterno demasiado largo (Máx. 50 carac.)";
}
else if(strlen($apmat)>50)
{
echo "Apellido materno demasiado largo (Máx. 50 carac.)";
}
else if(strlen($correo)>128)
{
echo "Correo demasiado largo (Máx. 128 carac.)";
}
else if(strlen($carrera)>50)
{
echo "El nombre de la carrera es demasiado largo (Máx. 50 carac.)";
}
else if(!is_numeric($semestre))
{
    echo "El semestre debe ser conformado solo por números!";
}
else{
    if($nocontrol!=""&&$contraseña!=""&&$nombre!=""&&$appat!=""&&$apmat!=""&&$semestre!=""&&$correo!=""){
        $alumno->setContraseña(strip_tags($_POST['pwd']));
        $alumno->setNombre(strip_tags($_POST['nom']));
        $alumno->setAp_Pat(strip_tags($_POST['ap']));
        $alumno->setAp_Mat(strip_tags($_POST['am']));
        $alumno->setCarrera(strip_tags($_POST['car']));
        $alumno->setSemestre(strip_tags($_POST['sem']));
        $alumno->setSexo(strip_tags($_POST['sex']));
        $alumno->setCorreo(strip_tags($_POST['email']));
        $alumno->ActualizarDatos($alumno);
        echo "Perfil guardado!";
    }
    else{
        echo ("Faltan llenar campos");
    }
}
?>

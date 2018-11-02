
<?php 
    require_once('Clases/alumno.php');
    session_start();
    $alumno = new Alumno();
    $nocontrol =$_POST['noc'];
    $contraseña =$_POST['pwd'];
    $nombre =$_POST['nom'];
    $appat =$_POST['ap'];
    $apmat =$_POST['am'];
    $carrera =$_POST['car'];
    $semestre =$_POST['sem'];
    $sexo=$_POST['sex'];
    $correo = $_POST['email'];
 if($nocontrol!=""&&$contraseña!=""&&$nombre!=""&&$appat!=""&&$apmat!=""&&$semestre!=""&&$correo!="")
{
    $existe = $alumno->AlumnoExists($_POST['noc']);
    if($existe>0)
    {
    echo("Ya existe un alumno registrado con ese numero de control!");
    }
    else
    {
        $alumno->setNo_Control($_POST['noc']);
        $alumno->setContraseña($_POST['pwd']);
        $alumno->setNombre($_POST['nom']);
        $alumno->setAp_Pat($_POST['ap']);
        $alumno->setAp_Mat($_POST['am']);
        $alumno->setCarrera($_POST['car']);
        $alumno->setSemestre($_POST['sem']);
        $alumno->setSexo($sexo);
        $alumno->setCorreo($_POST['email']);
        $alumno->InsertarAlumno($alumno);
        echo("Alumno registrado!");
    }    
}
else
{
        echo("Faltan campos por llenar!");
}
?>
    
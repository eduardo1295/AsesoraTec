
<?php 
    require_once('Clases/alumno.php');
    session_start();
    $alumno = new Alumno();
    $nocontrol = strip_tags($_POST['noc']);
    $contraseña =strip_tags($_POST['pwd']);
    $nombre =strip_tags($_POST['nom']);
    $appat =strip_tags($_POST['ap']);
    $apmat =strip_tags($_POST['am']);
    $carrera =strip_tags($_POST['car']);
    $semestre =strip_tags($_POST['sem']);
    $sexo=strip_tags($_POST['sex']);
    $correo = strip_tags($_POST['email']);
if(strlen($nocontrol)!=8)
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
  else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$correo))
  {
    echo "El formato de un correo electrónico debe ser parecido a: ejemplo@dominio.com";
  }
else
{
    if($nocontrol!=""&&$contraseña!=""&&$nombre!=""&&$appat!=""&&$apmat!=""&&$semestre!=""&&$correo!="")
    {
        $client = new SoapClient("https://siia.lapaz.tecnm.mx/webserviceitlp.asmx?WSDL");
        $result = $client->estaInscrito(array('control' =>$nocontrol, 'contrasena' => '*3%f&Y2b'))->estaInscritoResult;
        if($result == false)
         {
            echo "El alumno no esta vigente en el Instituto Tecnológico de La Paz";
         }
        else
        {
        $existe = $alumno->AlumnoExists($_POST['noc']);
        if($existe>0)
        {
        echo("Ya existe un alumno registrado con ese número de control!");
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
            header("Refresh: 3; URL=login.php");
            echo("Alumno registrado!");
         }
      }
    }
    else
    {
    echo("Faltan campos por llenar!");
    }  
}
?>
    
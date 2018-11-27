<?php 
    require('Clases/maestro.php');
    $maestro = new Maestro();
    $maestro->setNo_Economico($_POST['noc']);
    $noecono = $_POST['noc'];
    $nc=$noecono;
    $pass = ($_POST['pwd']);
    $nombre = strip_tags($_POST['nom']);
    $appat = strip_tags($_POST['ap']);
    $apmat = strip_tags($_POST['am']);
    $dep = strip_tags($_POST['dep']);
    $correo = strip_tags($_POST['email']);

if(strlen($nc)!=4)
{
    echo "El número economico debe ser de 3 caracteres";
}
else if(strlen($nombre)>50)
{
echo "Nombre demasiado largo (Máx. 50 carac.)";
}
else if(strlen($pass)>20)
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
else if(strlen($dep)>50)
{
echo "El nombre de la carrera es demasiado largo (Máx. 50 carac.)";
}
else if(strlen($correo)>128)
{
echo "Correo demasiado largo (Máx. 128 carac.)";
}

else
{
    if($noeconomico!=""&&$pass!=""&&$nombre!=""&&$appat!=""&&$apmat!="" && $dep!=""&&$correo!="")
    {
        $maestro = new Maestro();
        $existe = $maestro->MaestroExists($noeconomico);
        $client = new SoapClient("https://siia.lapaz.tecnm.mx/webserviceitlp.asmx?WSDL");
        $result = $client->maestroVigente(array('numeroEconomico' => $noeconomico, 'contrasena' => '*3%f&Y2b'))->maestroVigenteResult;	 
        if($result == false)
        {
            echo("El número económico no esta registrado en el Instituto Tecnológico de La Paz");
        }
        else
        {
            $maestro->setContraseña($_POST['pwd']);
            $maestro->setNombre($_POST['nom']);
            $maestro->setAp_Pat($_POST['ap']);
            $maestro->setAp_Mat($_POST['am']);
            $maestro->setDepartamento($_POST['dep']);
            $maestro->setCorreo($_POST['email']);
            $maestro->ActualizarDatos($maestro);
            echo "Perfil guardado!";
         }
      
    }
    else
    {
    echo("Faltan campos por llenar!");
    }  
}
    

?>
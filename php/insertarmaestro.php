
<?php 
require_once('Clases/maestro.php');
$noeconomico = strip_tags($_POST['noec']);
$pass = strip_tags($_POST['pwd']);
$nombre = strip_tags($_POST['nom']);
$appat = strip_tags($_POST['ap']);
$apmat = strip_tags($_POST['am']);
$correo = strip_tags($_POST['email']);
$depto = strip_tags($_POST['dep']);
if($noeconomico!=""&&$pass!=""&&$nombre!=""&&$appat!=""&&$apmat!=""&&$correo!="")
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
        if($existe>0)
        {
            echo("El maestro ya existe!");
        }
        else
        {
       
        $maestro->setNo_Economico($noeconomico);
        $maestro->setContraseña($pass);
        $maestro->setNombre($nombre);
        $maestro->setAp_Pat($appat);
        $maestro->setAp_Mat($apmat);
        $maestro->setDepartamento($depto);
        $maestro->setCorreo($correo);
        $maestro->InsertarMaestro($maestro);
        echo("Maestro registrado!");
        }
    }
}
else
{
    echo("Faltan campos por llenar");
}
?>

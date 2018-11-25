
<?php 
require_once('Clases/maestro.php');
$noeconomico = $_POST['noec'];
$pass = $_POST['pwd'];
$nombre = $_POST['nom'];
$appat = $_POST['ap'];
$apmat = $_POST['am'];
$correo = $_POST['email'];
$depto = $_POST['dep'];
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

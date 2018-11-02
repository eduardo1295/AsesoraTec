
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
else
{
    echo("Faltan campos por llenar");
}
?>

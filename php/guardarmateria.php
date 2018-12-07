<?php 
    require('Clases/admin.php');
    $materias = new Admin();
    $noecono = strip_tags($_POST['noc']);
    $nombre= strip_tags($_POST['nom']);
    $tipo=strip_tags($_POST['tp']);
    $semestre= strip_tags($_POST['sem']);

if(strlen($noecono)!=8)
{
    echo "El codigo de la materia debe ser de 7 caracteres";
}
else if(strlen($nombre)>50)
{
echo "Nombre demasiado largo (Máx. 50 carac.)";
}
else if(strlen($tipo)>50)
{
echo "Tipo de Materia demasiado larga (Máx. 20 carac.)";
}
else if(!is_numeric($semestre))
{
    echo "El semestre debe ser conformado solo por números!";
}
else
{
    if($noecono!=""&&$nombre!=""&&$tipo!=""&&$semestre!="")
    {

    $materias->setCodigo($noecono);
    $materias->setNombrem(utf8_decode($_POST['nom']));
    $materias->setTipo(utf8_decode($_POST['tp']));
    $materias->setSemestre($_POST['sem']);
    $materias->ActualizarDatos($materias);
    echo "Materia Modificada!";
    }
    else
    {
        echo ("Faltan campos por llenar");
    }
}
?>
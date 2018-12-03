<?php 
    require_once('Clases/admin.php');
    session_start();
    $materia = new Admin();
    $codigo =$_POST['cod'];
    $nombrem =$_POST['nm'];
    $tipo =$_POST['tp'];
    $semestre =$_POST['sem'];
if(strlen($codigo)!=8)
{
    echo "El codigo de la materia debe ser de 7 caracteres";
}
else if(strlen($nombrem)>50)
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
    if($materia->MateriaExists($_POST['cod'])){
        echo "La Materia Ya existe";
    }
    else
     {
    if($codigo!=""&&$nombrem!=""&&$tipo!=""&&$semestre!="")
    {
        
    $materia->setCodigo($_POST['cod']);
    $materia->setNombrem($_POST['nm']);
    $materia->setTipo($_POST['tp']);
    $materia->setSemestre($_POST['sem']);
    $materia->InsertarMateria($materia);
    echo("Materia registrada!");
    }
    else{
        echo "Faltan Campos por llenar";
    }
}
}
            
?>
    
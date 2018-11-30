<?php
require_once('conexion.php');
class Asesoria{
    public $codigo;
    public $noMaestro;
    Public $Nombre_Materia;
    public $area;
    public $nombreMaestro;
    public $semestre;

    function __construct($codigo,$noMaestro,$Nombre_Materia,$area,$nombreMaestro,$senestre){
        $this->codigo = $codigo;
        $this->noMaestro = $noMaestro;
        $this->Nombre_Materia = $Nombre_Materia;
        $this->area = $area;
        $this->nombreMaestro = $nombreMaestro;
        $this->semestre = $semestre;
    }
}


?>
<?php 
require_once('conexion.php');
class Asesoria{
    public $Codigo;
    public $Nombre;
    public $Nom_Maestro;
    public $Semestre;
    public $Departamento;
    public $Activo;
    public $NoEconomico;
    public function _construct(){
        $Codigo ="";
        $Nombre="";
        $Nom_Maestro = "";
        $Semestre =0;
        $Departamento = "";
        $Activo="";
        $NoEconomico;
    }
    public function setCodigo($codigo){
        $this->Codigo = $codigo;
    }
    public function setNombre($nombre){
        $this->Nombre = $nombre;
    }
    public function setNom_Maestro($nom_maestro){
        $this->Nom_Maestro = $nom_maestro;
    }
    public function setSemestre($semestre){
        $this->Semestre = $semestre;
    }
    public function setDepartamento($departamento){
        $this->Departamento = $departamento;
    }
    public function setActivo($activo){
        $this->Activo = $activo;
    }
    public function setNoEcon($noec)
    {
        $this->NoEconomico = $noec;
    }
    public function ObtenerAsesoria($cod,$asesoria){
            try
            {
             $conn = abrirBD();
             if($sentencia_preparada =$conn->prepare("SELECT * FROM ASESORIAS WHERE CODIGO=?"))
                 {
                     $sentencia_preparada->bind_param('s',$codigo);
                     $codigo =$cod;
                     $sentencia_preparada->execute();
                     $sentencia_preparada->bind_result($codi,$nombrem,$materia,$depar,$semestre,$activo,$noecon);
                     while($sentencia_preparada->fetch()){
                         $asesoria->setNombre($materia);
                         $asesoria->setNom_Maestro($nombrem);
                         $asesoria->setDepartamento($depar);
                         $asesoria->setSemestre($semestre);
                         $asesoria->setNoEcon($noecon);
                         $asesoria->setActivo($activo);
                        }
                    $conn->close();
                }
            }
            catch(Exception $e)
            {
             $error = $e->getMessage();
             echo $error;
            }
    }
    public function AsesoriaExiste($cod,$noecon)
    {
        try
        {
            $resultado=0;
         $conn = abrirBD();
         if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ASESORIAS WHERE CODIGO=? AND NOECON=? AND ACTIVO ='Si'"))
             {
                 $sentencia_preparada->bind_param('ss',$codigo,$numecon);
                 $codigo =$cod;
                 $numecon = $noecon;
                 $sentencia_preparada->execute();
                 $sentencia_preparada->bind_result($numero);
                 while($sentencia_preparada->fetch()){
                 $resultado = $numero;
                 }
                 $conn->close();
             }
            return $resultado;
        }
        catch(Exception $e)
        {
         $error = $e->getMessage();
         echo $error;
        }

    }
    public function EstoyRegistrado($cod,$nocontrol)
    {
        try
        {
            $resultado=0;
         $conn = abrirBD();
         if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ASESORIASREG WHERE CODIGO_ASESORIA=? AND CONTROL_ALUMNO=?"))
             {
                 $sentencia_preparada->bind_param('ss',$codigo,$nocon);
                 $codigo =$cod;
                 $nocon = $nocontrol;
                 $sentencia_preparada->execute();
                 $sentencia_preparada->bind_result($numero);
                 while($sentencia_preparada->fetch()){
                 $resultado = $numero;
                 }
                 $conn->close();
             }
            return $resultado;
        }
        catch(Exception $e)
        {
         $error = $e->getMessage();
         echo $error;
        }

    }
}
?>
<?php 
include('conexion.php');
class Alumno{
    public $No_Control;
    public $Contraseña;
    public $Nombre;
    public $Ap_Pat;
    public $Ap_Mat;
    public $Carrera;
    public $Semestre;
    public $Correo;
    public $Sexo;
    public function setSexo($sexo){
        $this->Sexo =$sexo;
    }
    public function setNo_Control($nocontrol) {
       $this->No_Control =$nocontrol;
    }
    public function setContraseña($contraseña) {
        $this->Contraseña =$contraseña;
    }
    public function setNombre($nombre) {
         $this->Nombre=$nombre;
    }
    public function setAp_Pat($apellidop) {
        $this->Ap_Pat=$apellidop;
    }
    public function setAp_Mat($apellidom) {
         $this->Ap_Mat=$apellidom;
    }
    public function setCarrera($carrera) {
        $this->Carrera = $carrera;
    }
    public function setSemestre($semestre) {
        $this->Semestre =$semestre;
    }
    public function setCorreo($correo) {
        $this->Correo =$correo;
    }
    public function _construct(){
         $this->No_Control ="";
         $this->Contraseña ="";
         $this->Nombre ="";
         $this->Ap_Pat ="";
         $this->Ap_Mat ="";
         $this->Carrera ="";
         $this->Semestre =0;
         $this->Correo ="";
    }
   public function InsertarAlumno($alumno){
       try{
        $conexion = abrirBD();
        $SQL= "INSERT INTO ALUMNO VALUES(?,?,?,?,?,?,?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("ssssssiss",$nocontrol,$contraseña,$nombre,$apellidop,$apellidom,$carrera,$semestre,$correo,$sexo);
        $nocontrol =$alumno->No_Control;
        $contraseña =$alumno->Contraseña;
        $nombre =$alumno->Nombre;
        $apellidop =$alumno->Ap_Pat;
        $apellidom =$alumno->Ap_Mat;
        $carrera =$alumno->Carrera;
        $semestre =$alumno->Semestre;
        $correo =$alumno->Correo;
        $sexo = $alumno->Sexo;
        $sentencia_preparada1->execute();
        $conexion->close();
       }
       catch (Exception $e){
        $error = $e->getMessage();
        echo $error;
    }
   }
   public function LogearAlumno($alumno){
    try{
    $conexion = abrirBD();
    $SQL= "SELECT count(*) FROM alumno WHERE nombre=?";
    $sentencia_preparada1 = $conexion->prepare($SQL);
    $sentencia_preparada1->bind_param("s",$nocontrol);
    $nocontrol =$alumno->No_Control;
    $contraseña = $alumno->Contraseña;
    $sentencia_preparada1->execute();
    $sentencia_preparada1->bind_result($numero);
    $row = $sentencia_preparada1->fetch();
    $result =$row['count(*)'];
    return $result;
}
    catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
    }
   }
}
?>
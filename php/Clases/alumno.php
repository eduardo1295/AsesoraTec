<?php 
require('conexion.php');
class Alumno{
    private $No_Control;
    private $Usuario;
    private $Contraseña;
    private $Nombre;
    private $Ap_Pat;
    private $Ap_Mat;
    private $Carrera;
    private $Semestre;
    private $Correo;
    public function No_Control() {
        return $this->No_Control;
    }
    public function Usuario() {
        return $this->Usuario;
    }
    public function Contraseña() {
        return $this->Contraseña;
    }
    public function Nombre() {
        return $this->Nombre;
    }
    public function Ap_Pat() {
        return $this->Ap_Pat;
    }
    public function Ap_Mat() {
        return $this->Ap_Mat;
    }
    public function Carrera() {
        return $this->Carrera;
    }
    public function Semestre() {
        return $this->Semestre;
    }
    public function Correo() {
        return $this->Correo;
    }
    public function _construct($NoControl,$Usuario,$Contraseña,$Nombre,$Ap_Pat,$ApMat,$Carrera,$Semestre,$Correo){
         $this->No_Control =$NoControl;
         $this->Usuario =$Usuario;
         $this->Contraseña =$Contraseña;
         $this->Nombre =$Nombre;
         $this->Ap_Pat =$Ap_Pat;
         $this->Ap_Mat =$ApMat;
         $this->Carrera =$Carrera;
         $this->Semestre =$Semestre;
         $this->Correo =$Correo;
    }
   public function InsertarAlumno(){
       
        $conexion = abrirBD();
        $SQL= "INSERT INTO ALUMNO VALUES(?,?,?,?,?,?,?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("sssssssss",$Numero,$usuario,$$contraseña,$nombre,$apellidop,$apellidom,$carrera,$semestre,$correo);
        $usuario =$_POST['usuario'];
        $contraseña =$_POST['contraseña'];
        $sentencia_preparada1->execute();
        $sentencia_preparada1->bind_result($numero);
        $row = $sentencia_preparada1->fetch();
   }
}
?>
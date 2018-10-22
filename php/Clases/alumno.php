<?php 
require_once('conexion.php');
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
    try
    {
        $resultado=0;
        $conn = abrirBD();
    if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ALUMNO WHERE NOCONTROL=? AND PASS=?"))
        {
            $sentencia_preparada->bind_param('ss',$nocontrol,$pass);
            $nocontrol =$alumno->No_Control;
            $pass = $alumno->Contraseña;
            $sentencia_preparada->execute();
            $sentencia_preparada->bind_result($numero);
            while($sentencia_preparada->fetch()){
            $resultado = $numero;
            }
            $conn->close();
        }

        return $resultado;
    }
    catch (Exception $e)
    {
    $error = $e->getMessage();
    echo $error;
    }
   }
   public function AlumnoExists($nc){
       try
       {
        $conn = abrirBD();
        if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ALUMNO WHERE NOCONTROL=?"))
            {
                $sentencia_preparada->bind_param('s',$nocontrol);
                $nocontrol =$nc;
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
   public function CorreoAlumno($alumno){
    try
    {
           $correoObtenido="";
           $contra;
           $conexion = abrirBD();
        if($sentencia_preparada =$conexion->prepare("SELECT CORREO,PASS FROM ALUMNO WHERE NOCONTROL=?"))
        {
            $sentencia_preparada->bind_param('s',$nocontrol);
            $nocontrol =$alumno->No_Control;
            $sentencia_preparada->execute();
            $sentencia_preparada->bind_result($correo,$pass);
            while($row =$sentencia_preparada->fetch()){
            $correoObtenido = $correo;
            $contra=$pass;
    
            }
            echo $correoObtenido;
            mail(utf8_decode($correoObtenido),utf8_decode("Contraseña olvidada"),utf8_decode("Tu contraseña olvidada es: ".$contra),utf8_decode("From: fer_inzunzavelarde@hotmail.com"));
       }
    }
       catch(Exception $e){
        $error = $e->getMessage();
        echo $error;
       }
   }
   public function ObtenerDatos($nc,$alumno){
       try
       {
        $conn = abrirBD();
        if($sentencia_preparada =$conn->prepare("SELECT * FROM ALUMNO WHERE NOCONTROL=?"))
        {
            $sentencia_preparada->bind_param('s',$nocontrol);
            $nocontrol =$nc;
            $sentencia_preparada->execute();
            $sentencia_preparada->bind_result($numc,$pass,$nombre,$appat,$apmat,$carrera,$semestre,$correo,$sexo);
            while($sentencia_preparada->fetch()){
            $alumno->setNo_Control($numc);
            $alumno->setContraseña($pass);
            $alumno->setNombre($nombre);
            $alumno->setAp_Pat($appat);
            $alumno->setAp_Mat($apmat);
            $alumno->setCarrera($carrera);
            $alumno->setSemestre($semestre);
            $alumno->setCorreo($correo);
            $alumno->setSexo($sexo);
            }
            $conn->close();
        }
       }
       catch(Exception $e)
       {
           $error = $e->getMessage();
           echo error;
       }
   }
   public function ActualizarDatos($alumno){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("UPDATE ALUMNO SET PASS=?,NOMBRE=?,AP_PAT=?,AP_MAT=?,CARRERA=?,SEMESTRE=?,CORREO=?,SEXO=? WHERE NOCONTROL=?"))
     {
         $sentencia_preparada->bind_param('sssssisss',$pass,$nombre,$appat,$apmat,$carrera,$semestre,$correo,$sexo,$nocontrol);
         $nocontrol = $alumno->No_Control;
         $pass= $alumno->Contraseña;
         $nombre = $alumno->Nombre;
         $appat = $alumno->Ap_Pat;
         $apmat = $alumno->Ap_Mat;
         $carrera = $alumno->Carrera;
         $semestre= $alumno->Semestre;
         $correo= $alumno->Correo;
         $sexo = $alumno->Sexo;
         $sentencia_preparada->execute();
         $conn->close();
     }
    }
    catch(Exception $e)
    {
        $error = $e->getMessage();
        echo error;
    }
}
}
?>
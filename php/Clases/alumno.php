<?php 
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

}
?>
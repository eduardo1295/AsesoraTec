<?php 
require_once('conexion.php');
class Admin{
    public $Usuario;
    public $Contraseña;
    public $Nombre;
    public $Ap_Pat;
    public $Ap_Mat;
    public $Correo;
    public function setUsuario($usuario) {
       $this->Usuario =$usuario;
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

    public function setCorreo($correo) {
        $this->Correo =$correo;
    }
    public function _construct(){
         $this->Usuario ="";
         $this->Contraseña ="";
         $this->Nombre ="";
         $this->Ap_Pat ="";
         $this->Ap_Mat ="";
         $this->Correo ="";
    }

   
   public function LogearAdmin($admin){
    try
    {
        $resultado=0;
        $conn = abrirBD();
    if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM administrador WHERE USUARIO=? AND PASS=?"))
        {
            $sentencia_preparada->bind_param('ss',$usuario,$pass);
            $usuario =$admin->Usuario;
            $pass = $admin->Contraseña;
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
}
?>
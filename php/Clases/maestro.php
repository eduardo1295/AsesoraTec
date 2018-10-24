<?php 
require_once('conexion.php');
class Maestro{
    public $No_Economico;
    public $Contraseña;
    public $Nombre;
    public $Ap_Pat;
    public $Ap_Mat;
    public $Departamento;
    public $Correo;
    public function setNo_Economico($noeconomico) {
       $this->No_Economico =$noeconomico;
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
    public function setDepartamento($dep) {
        $this->Departamento = $dep;
    }
    public function setCorreo($correo) {
        $this->Correo =$correo;
    }
    public function _construct(){
         $this->No_Economico ="";
         $this->Contraseña ="";
         $this->Nombre ="";
         $this->Ap_Pat ="";
         $this->Ap_Mat ="";
         $this->Departamento ="";
         $this->Correo ="";
    }
   public function InsertarMaestro($maestro){
       try{
        $conexion = abrirBD();
        $SQL= "INSERT INTO MAESTROS VALUES(?,?,?,?,?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("sssssss",$noeconomico,$contraseña,$nombre,$apellidop,$apellidom,$departamento,$correo);
        $noeconomico =$maestro->No_Economico;
        $contraseña =$maestro->Contraseña;
        $nombre =$maestro->Nombre;
        $apellidop =$maestro->Ap_Pat;
        $apellidom =$maestro->Ap_Mat;
        $departamento =$maestro->Departamento;
        $correo =$maestro->Correo;
        $sentencia_preparada1->execute();
        $conexion->close();
       }
       catch (Exception $e){
        $error = $e->getMessage();
        echo $error;
    }
   }
   public function AgregarAsesoria($codigo,$nombre,$area,$noMaestro){
    try{
     $conexion = abrirBD();
     $SQL= "INSERT INTO ASESORIA VALUES(?,?,?,?)";
     $sentencia_preparada1 = $conexion->prepare($SQL);
     $sentencia_preparada1->bind_param("isss",$cod,$NoMae,$nom,$are);
     $cod = $codigo;
     $NoMae = $noMaestro;
     $nom = $nombre;
     $are = $area;
     $sentencia_preparada1->execute();
     $conexion->close();
    }
    catch (Exception $e){
     $error = $e->getMessage();
     echo $error;
}
}

   public function LogearMaestro($maestro){
    try
    {
        $resultado=0;
        $conexion = abrirBD();
    if($sentencia_preparada =$conexion->prepare("SELECT count(*) FROM MAESTROS WHERE NOECON=? AND PASS=?"))
        {
            $sentencia_preparada->bind_param('ss',$noecon,$pass);
            $noecon =$maestro->No_Economico;
            $pass = $maestro->Contraseña;
            $sentencia_preparada->execute();
            $sentencia_preparada->bind_result($numero);
            while($sentencia_preparada->fetch()){
            $resultado = $numero;
            }
            $conexion->close();
        }
      
        return $resultado;
    }
    catch (Exception $e)
    {
    $error = $e->getMessage();
    echo $error;
    }
   }
   public function MaestroExists($ne){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM MAESTROS WHERE NOECON=?"))
         {
             $sentencia_preparada->bind_param('s',$noecon);
             $noecon =$ne;
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
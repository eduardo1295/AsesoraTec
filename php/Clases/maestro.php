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
   public function AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre){
    try{
     $conexion = abrirBD();
     $SQL= "INSERT INTO ASESORIAS VALUES(?,?,?,?,?)";
     $sentencia_preparada1 = $conexion->prepare($SQL);
     $sentencia_preparada1->bind_param("sssss",$cod,$No_Maestro,$nom_Materia,$depto,$sem);
     $cod =  utf8_encode($codigo);
     $No_Maestro = utf8_decode($nombreMaestro);
     $nom_Materia = utf8_decode($nombreMateria);
     $depto = utf8_decode($departamento);
     $sem = utf8_decode($semestre);
     $sentencia_preparada1->execute();
     $conexion->close();
    }
    catch (Exception $e){
     $error = $e->getMessage();
     echo $error;
     }
    }

    public function ActualizarAsesoria($codigo,$nombreMaestro,$nombreMateria,$departamento,$semestre){
        try{
         $conexion = abrirBD();
         $SQL= "UPDATE asesorias SET No_Maestro = ?, Nombre_Materia = ? ,Departamento = ?, Semestre = ? WHERE Codigo = ?";
         $sentencia_preparada1 = $conexion->prepare($SQL);
         $sentencia_preparada1->bind_param("sssss",$No_Maestro,$nom_Materia,$depto,$sem,$cod);
         $No_Maestro = utf8_decode($nombreMaestro);
         $nom_Materia = utf8_decode($nombreMateria);
         $depto = utf8_decode($departamento);
         $sem = utf8_decode($semestre);
         $cod =  utf8_encode($codigo);
         $sentencia_preparada1->execute();
         $conexion->close();
        }
        catch (Exception $e){
         $error = $e->getMessage();
         echo $error;
         }
        }
    public function AgregarHorario($codigo,$noecom,$salon,$Horario){
        try{
        $maestro = new maestro();
        $maestro->ObtenerDatos($noecom,$maestro);
        $nombreCompleto = $maestro->Nombre ." ".$maestro->Ap_Pat." ".$maestro->Ap_Mat;
        $conexion = abrirBD();
        $SQL= "INSERT INTO HORARIOS VALUES(?,?,?,?,?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("sssssss",$cod_Mat,$mae,$lun,$mar,$mie,$jue,$vie);
        $cod_Mat = utf8_encode($codigo);
        $mae = $nombreCompleto;
        $lun = $Horario[0].' '.$salon[0];
        $mar = $Horario[1].' '.$salon[1];
        $mie = $Horario[2].' '.$salon[2];
        $jue = $Horario[3].' '.$salon[3];
        $vie = $Horario[4].' '.$salon[4];
        $sentencia_preparada1->execute();
         $conexion->close();
        }
        catch (Exception $e){
         $error = $e->getMessage();
         echo $error;
         }
    }

    public function ActualizarHorario($codigo,$noecom,$salon,$Horario){
        try{
            $maestro = new maestro();
            $maestro->ObtenerDatos($noecom,$maestro);
            $nombreCompleto = $maestro->Nombre ." ".$maestro->Ap_Pat." ".$maestro->Ap_Mat;
            $conexion = abrirBD();
            $SQL= "UPDATE HORARIOS SET Lunes = ?, Martes = ?, Miercoles = ?, Jueves = ?, Viernes = ? WHERE Cod_Materia =?";
            $sentencia_preparada1 = $conexion->prepare($SQL);
            $sentencia_preparada1->bind_param("ssssss",$lun,$mar,$mie,$jue,$vie,$cod_Mat);
            $lun = $Horario[0].' '.$salon[0];
            $mar = $Horario[1].' '.$salon[1];
            $mie = $Horario[2].' '.$salon[2];
            $jue = $Horario[3].' '.$salon[3];
            $vie = $Horario[4].' '.$salon[4];
            $cod_Mat = utf8_encode($codigo);
            $sentencia_preparada1->execute();
            $conexion->close();
        }
        catch (Exception $e){
             $error = $e->getMessage();
             echo $error;
        }
    }
    public function AgregarAsesor($codigo,$noecon,$nocontrol,$nombreAsesorado){
        try{
            $conexion = abrirBD();
            $SQL= "INSERT INTO asesorados VALUES(?,?,?,?)";
            $sentencia_preparada1 = $conexion->prepare($SQL);
            $sentencia_preparada1->bind_param("ssss",$cod,$noen,$nocont,$nomb);
            $cod = $codigo;
            $noen = $noecon;
            $nocont = $nocontrol;
            $nomb = $nombreAsesorado;
            $sentencia_preparada1->execute();
            $conexion->close();
        }
        catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }
    }
    public function ActualizarAsesor($codigo,$noecon,$nocontrol,$nombreAsesorado){
        try{
            $conexion = abrirBD();
            $SQL= "SELECT COUNT(*) FROM ASESORADOS WHERE noAsesoria = '$codigo' AND noControl = '$nocontrol' ";
            $STMT = $conexion->prepare($SQL);
            $STMT->execute();
            $STMT->bind_result($nombre);
            while( $fila = $STMT->fetch()){
                $resultado = $nombre;
            }
            $conexion->close();
            $conexion = abrirBD();
            if($resultado == 0){
                $SQL= "INSERT INTO asesorados VALUES(?,?,?,?)";
                $sentencia_preparada1 = $conexion->prepare($SQL);
                $sentencia_preparada1->bind_param("ssss",$cod,$noen,$nocont,$nomb);
                $cod = $codigo;
                $noen = $noecon;
                $nocont = $nocontrol;
                $nomb = $nombreAsesorado;
                $sentencia_preparada1->execute();
                $conexion->close();
            }
            else {
                $SQL= "UPDATE asesorados SET nocontrol = ?, Nombre =? WHERE NoAsesoria =? ";
                $sentencia_preparada1 = $conexion->prepare($SQL);
                $sentencia_preparada1->bind_param("sss",$nocont,$nomb,$cod);
                $nocont = $nocontrol;
                $nomb = $nombreAsesorado;
                $cod = $codigo;
                $sentencia_preparada1->execute();
                $conexion->close();
            }
        }
        catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }
    }
    public function EliminarAsesor($codigo){
        try{
            $conexion = abrirBD();
            $SQL= "DELETE FROM ASESORADOS WHERE noAsesoria = ? ";
            $sentencia_preparada1 = $conexion->prepare($SQL);
            $sentencia_preparada1->bind_param("s",$cod);
            $cod = $codigo;
            $sentencia_preparada1->execute();
            $conexion->close();
        }
        catch (Exception $e){
            $error = $e->getMessage();
            echo $error;
        }
    }
    public function RegresarNombre($nocontrol){
        try {
            $conexion = abrirBD();
            $SQL = "SELECT nombre FROM maestros WHERE noecon = 33";
            $STMT = $conexion->prepare($SQL);
            $STMT->execute();
            $STMT->bind_result($nombre);
            while( $fila = $STMT->fetch()){
                $resultado = $nombre;
            }
                

        } catch (PDOException $e) {
            echo "ERROR: ".$SQL."<br>".$e->getMessage();
        }   
        $conexion->close(); 
        return $resultado;
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
public function ObtenerDatos($ne,$maestro){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("SELECT * FROM MAESTROS WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon =$ne;
         $sentencia_preparada->execute();
         $sentencia_preparada->bind_result($nume,$pass,$nombre,$appat,$apmat,$depto,$correo);
         while($sentencia_preparada->fetch()){
         $maestro->setNo_Economico($nume);
         $maestro->setContraseña($pass);
         $maestro->setNombre($nombre);
         $maestro->setAp_Pat($appat);
         $maestro->setAp_Mat($apmat);
         $maestro->setDepartamento($depto);
         $maestro->setCorreo($correo);
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
}
?>
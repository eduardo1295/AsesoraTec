<?php 
require_once('conexion.php');
class Admin{
    public $Usuario;
    public $Contraseña;
    public $Nombre;
    public $Ap_Pat;
    public $Ap_Mat;
    public $Depa;
    public $Correo;
    public $Codigo;
    public $Nombrem;
    public $Tipo;
    public $Semestre;
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

    public function SetDepartamento($departamento){
        $this->Depa=$departamento;
    }

    public function setCorreo($correo) {
        $this->Correo =$correo;
    }
    public function setCodigo($codigoo) {
        $this->Codigo=$codigoo;
    }
    public function setNombrem($nombremat) {
         $this->Nombrem=$nombremat;
    }

    public function SetTipo($tipoo){
        $this->Tipo=$tipoo;
    }

    public function setSemestre($semestree) {
        $this->Semestre =$semestree;
    }
    public function _construct(){
         $this->Usuario ="";
         $this->Contraseña ="";
         $this->Nombre ="";
         $this->Ap_Pat ="";
         $this->Ap_Mat ="";
         $this->Correo ="";
         $this->Codigo ="";
         $this->Nombrem ="";
         $this->Tipo ="";
         $this->Semestre ="";
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
   public function ObtenerDatos($nc,$admin){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("SELECT * FROM administrador WHERE Usuario=?"))
     {
         $sentencia_preparada->bind_param('s',$usuario);
         $usuario =$nc;
         $sentencia_preparada->execute();
         $sentencia_preparada->bind_result($usuario,$pass,$nombre,$appat,$apmat,$departamento,$correo);
         while($sentencia_preparada->fetch()){
         $admin->setUsuario($usuario);
         $admin->setContraseña($pass);
         $admin->setNombre($nombre);
         $admin->setAp_Pat($appat);
         $admin->setAp_Mat($apmat);
         $admin->SetDepartamento($departamento);
         $admin->setCorreo($correo);
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

public function ActualizarDatos($materia){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("UPDATE materias SET Nombre=?,Tipo=?,Semestre=? WHERE Codigo=?"))
     {
         $sentencia_preparada->bind_param('ssss',$nombremat,$tipoo,$semestree,$codigoo);
         $codigoo =$materia->Codigo;
         $nombremat =$materia->Nombrem;
         $tipoo =$materia->Tipo;
         $semestree =$materia->Semestre;
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
public function InsertarMateria($materias){
    try{
     $conexion = abrirBD();

     if($SQL= "INSERT INTO materias VALUES(?,?,?,?)"){
     $sentencia_preparada1 = $conexion->prepare($SQL);
     $sentencia_preparada1->bind_param("sssi",$codigoo,$nombremat,$tipoo,$semestree);
     $codigoo =$materias->Codigo;
     $nombremat =$materias->Nombrem;
     $tipoo =$materias->Tipo;
     $semestree =$materias->Semestre;
     $sentencia_preparada1->execute();
     $conexion->close();
     }
    }
    catch (Exception $e){
     $error = $e->getMessage();
     echo $error;
 }
}
public function EliminarMateria($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM materias WHERE Codigo=?"))
     {
         $sentencia_preparada->bind_param('s',$codigoo);
         $codigoo = $nc;
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
public function EliminarMaestro($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM maestros WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarAsesorados($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM asesorados WHERE noEcon=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarAsesorias($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM asesorias WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarAsesoriasreg($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM asesoriasreg WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarAsistenciaReg($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM asistenciasreg WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarHorarios($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM horarios WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function EliminarPass($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM pass WHERE NOECON=?"))
     {
         $sentencia_preparada->bind_param('s',$noecon);
         $noecon = $nc;
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
public function AgregarHorario($codigo,$noecom,$salon,$Horario){
    try{
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
public function AgregarAsesor($codigo,$nocontrol,$nombreAsesorado){
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
public function ActualizarJefeSistemas($nombrejs){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("UPDATE jefes set jefedptosi = ?"))
     {
         $sentencia_preparada->bind_param('s',$nombree);
         $nombree = $nombrejs;
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
public function ActualizarPreSistemas($presisi){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare(" UPDATE jefes set presiasi = ?"))
     {
         $sentencia_preparada->bind_param('s',$nombree);
         $nombree = $presisi;
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
public function ActualizarJefeCb($jefecb){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare(" UPDATE jefes set jefedptocb = ?"))
     {
         $sentencia_preparada->bind_param('s',$nombree);
         $nombree = $jefecb;
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
public function ActualizarPresiCb($presicb){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare(" UPDATE jefes set presiacb = ?"))
     {
         $sentencia_preparada->bind_param('s',$nombree);
         $nombree = $presicb;
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
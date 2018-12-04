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
           $contra ="";
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
   public function InscribirAsesoria($nc,$codigoAsesoria,$noecon){
    try{
        $conexion = abrirBD();
        $SQL= "INSERT INTO ASESORIASREG VALUES(?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("sss",$nocontrol,$codigoA,$noe);
        $nocontrol =$nc;
        $codigoA = $codigoAsesoria;
        $noe = $noecon;
        $sentencia_preparada1->execute();
        $conexion->close();
       }
       catch (Exception $e){
        $error = $e->getMessage();
        echo $error;
    }
}
public function YaInscrito($nc,$codigoAsesoria,$noecon){
    try
    {
        $resultado=0;
        $conn = abrirBD();
    if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ASESORIASREG WHERE CONTROL_ALUMNO=? AND CODIGO_ASESORIA=? AND NOECON=?"))
        {
            $sentencia_preparada->bind_param('sss',$nocontrol,$cod,$ne);
            $nocontrol =$nc;
            $cod = $codigoAsesoria;
            $ne =$noecon;
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
public function EliminarAlumno($nc){
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM ALUMNO WHERE NOCONTROL=?"))
     {
         $sentencia_preparada->bind_param('s',$nocontrol);
         $nocontrol = $nc;
         $sentencia_preparada->execute();
         $conn->close();
     }
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM ASESORIASREG WHERE CONTROL_ALUMNO=?"))
     {
         $sentencia_preparada->bind_param('s',$nocontrol);
         $nocontrol = $nc;
         $sentencia_preparada->execute();
         $conn->close();
     }
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM ASISTENCIASREG WHERE CONTROL_ALUMNO=?"))
     {
         $sentencia_preparada->bind_param('s',$nocontrol);
         $nocontrol = $nc;
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
public function EliminarAsesoria($nc,$codigoAsesoria,$noecon)
{
    try
    {
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM ASESORIASREG WHERE CONTROL_ALUMNO	=? AND CODIGO_ASESORIA=? AND NOECON=?"))
     {
         $sentencia_preparada->bind_param('sss',$nocontrol,$codigo,$noe);
         $nocontrol = $nc;
         $codigo = $codigoAsesoria;
         $noe = $noecon;
         $sentencia_preparada->execute();
         $conn->close();
     }
     $conn = abrirBD();
     if($sentencia_preparada =$conn->prepare("DELETE FROM ASISTENCIASREG WHERE CONTROL_ALUMNO=? AND CODIGO_ASESORIA=? AND NOECON=?"))
     {
         $sentencia_preparada->bind_param('sss',$nocontrol,$codigo,$noe);
         $nocontrol = $nc;
         $codigo = $codigoAsesoria;
         $noe = $noecon;
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
public function AsistenciaYaRegistrada($nc,$fecha,$codA,$ne)
{
    try
        {
            $resultado=0;
            $conn = abrirBD();
        if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM ASISTENCIASREG WHERE CONTROL_ALUMNO =? AND CODIGO_ASESORIA=? AND FECHA=? AND NOECON=?"))
            {
                $sentencia_preparada->bind_param('ssss',$nocontrol,$codigo,$fechaHoy,$maestro);
                $nocontrol = $nc;
                $codigo = $codA;
                $fechaHoy = $fecha;
                $maestro = $ne;
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
    public function RegistrarAsistencia($nc,$fecha,$codigoAsesoria,$maes,$cd)
    {
        try
        {
        $conn = abrirBD();
        $conexion = abrirBD();
        $SQL= "INSERT INTO ASISTENCIASREG VALUES(?,?,?,?,?)";
        $sentencia_preparada1 = $conexion->prepare($SQL);
        $sentencia_preparada1->bind_param("sssss",$nocontrol,$codigoA,$fecha,$contraseñaDiaria,$maestro);
        $nocontrol = $nc;
        $fechaD = $fecha;
        $maestro = $maes;
        $codigoA = $codigoAsesoria;
        $contraseñaDiaria = $cd;
        $sentencia_preparada1->execute(); 
        $conn->close();
      }
        catch(Exception $e)
        {
            $error = $e->getMessage();
            echo $error;
        }  
    }
    public function ValidaContra($contraseña,$codA,$fecha,$ne){
        try
        {
            $resultado=0;
            $conn = abrirBD();
        if($sentencia_preparada =$conn->prepare("SELECT count(*) FROM PASS WHERE PASSW=? AND CODIGO_ASESORIA=? AND FECHA=? AND NOECON=?"))
            {
                $sentencia_preparada->bind_param('ssss',$pass,$codigo,$fechaHoy,$noecon);
                $pass = $contraseña;
                $codigo = $codA;
                $fechaHoy = $fecha;
                $noecon= $ne;
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
       public function EliminarAsesoriasReg($nc)
       {
        try
        {
         $conn = abrirBD();
         if($sentencia_preparada =$conn->prepare("DELETE FROM ASESORIASREG WHERE CONTROL_ALUMNO	=? "))
         {
             $sentencia_preparada->bind_param('s',$nocontrol);
             $nocontrol = $nc;
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
       public function EliminarAsistenciasReg($nc)
       {
        try
        {
         $conn = abrirBD();
         if($sentencia_preparada =$conn->prepare("DELETE FROM ASISTENCIASREG WHERE CONTROL_ALUMNO=?"))
         {
             $sentencia_preparada->bind_param('s',$nocontrol);
             $nocontrol = $nc;
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
    public function VerificarHorario($codigo,$noecon,$nocontrol,$horario)
    {
        try
        {
            $conn = abrirBD();
            $consultaAsesoriasAlumno = "SELECT CODIGO_ASESORIA,NOECON FROM ASESORIASREG WHERE CONTROL_ALUMNO=$nocontrol";
            $selectAsesorias = $conn->query($consultaAsesoriasAlumno);
            $lunesForaneo = $horario[4];
            $martesForaneo= $horario[3];
            $miercolesForaneo = $horario[2];
            $juevesForaneo = $horario[1];
            $viernesForaneo = $horario[0];
            $horasLunesForaneo;
            $horasMartesForaneo;
            $horasMiercolesForaneo;
            $horasJuevesForaneo;
            $horasViernesForaneo;
            if($lunesForaneo!="")
            {
                $horasLunesForaneo = explode("-",$lunesForaneo);
            }
            if($martesForaneo!="")
            {
                $horasMartesForaneo = explode("-",$martesForaneo);
            }
            if($miercolesForaneo!="")
            {
                $horasMiercolesForaneo = explode("-",$miercolesForaneo);
            }
            if($juevesForaneo!="")
            {
                $horasJuevesForaneo = explode("-",$juevesForaneo);
            }
            if($viernesForaneo!="")
            {
                $horasViernesForaneo = explode("-",$viernesForaneo);
            }
            /*
            
            echo $horasMartesForaneo[0];
            if(isset($horasMartesForaneo[1]))
            echo $horasMartesForaneo[1];
            echo $horasMiercolesForaneo[0];
            if(isset($horasMiercolesForaneo[1]))
            echo $horasMiercolesForaneo[1];
            echo $horasJuevesForaneo[0];
            if(isset($horasJuevesForaneo[1]))
            echo $horasJuevesForaneo[1];
            echo $horasViernesForaneo[0];
            if(isset($horasViernesForaneo[1]))
            echo $horasViernesForaneo[1];
            */
            if($selectAsesorias->num_rows>0)
            {
                while($fila = $selectAsesorias->fetch_assoc())
                {   
                $codAsesoria = $fila['CODIGO_ASESORIA'];
                $noe = $fila['NOECON'];
                $selectHorarioAlumno = "SELECT LUNES,MARTES,MIERCOLES,JUEVES,VIERNES FROM HORARIOS WHERE NOECON='$noe' AND COD_MATERIA='$codAsesoria'";
                $regHorario = $conn->query($selectHorarioAlumno);
                while($row = $regHorario->fetch_assoc())
                {
                  $lunesTabla = $row['LUNES'];
                  $martesTabla = $row['MARTES'];
                  $miercolesTabla = $row['MIERCOLES'];
                  $juevesTabla = $row['JUEVES'];
                  $viernesTabla = $row['VIERNES'];
                if(isset($lunesTabla) &&$lunesTabla!="")
                {
                    $horaLunesSeparada = explode(" ",$lunesTabla);
                    $horasInicioYFinalLunes = explode("-",$horaLunesSeparada[0]);
                }
                if(isset($martesTabla)&&$martesTabla!="")
                {
                    $horaMartesSeparada = explode(" ",$martesTabla);
                    $horasInicioYFinalMartes = explode("-",$horaMartesSeparada[0]);
                }
                if(isset($miercolesTabla)&&$miercolesTabla!="")
                {
                    $horaMiercolesSeparada = explode(" ",$miercolesTabla);
                    $horasInicioYFinalMiercoles = explode("-",$horaMiercolesSeparada[0]);
                }
                if(isset($juevesTabla)&&$juevesTabla!="")
                {
                    $horaJuevesSeparada = explode(" ",$juevesTabla);
                    $horasInicioYFinalJueves = explode("-",$horaJuevesSeparada[0]);
                }
               
                if(isset($viernesTabla)&&$viernesTabla!="")
                {
                    $horaViernesSeparada = explode(" ",$viernesTabla);
                    $horasInicioYFinalViernes = explode("-",$horaViernesSeparada[0]);
                }
                if($lunesForaneo!=""&&isset($horasInicioYFinalLunes[1]))
                {
                    if((int)$horasInicioYFinalLunes[0]==(int)$horasLunesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalLunes[1]==(int)$horasLunesForaneo[1])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalLunes[0]<(int)$horasLunesForaneo[1] &&(int)$horasInicioYFinalLunes[0]>(int)$horasLunesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalLunes[1]>(int)$horasLunesForaneo[0] &&(int)$horasInicioYFinalLunes[1]<(int)$horasLunesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalLunes[0]<(int)$horasLunesForaneo[0] &&(int)$horasInicioYFinalLunes[1]>(int)$horasLunesForaneo[0])
                    {
                        return true; 
                    }
                       
                        
                }
                if($martesForaneo!=""&&isset($horasInicioYFinalMartes[1]))
                {
                    if((int)$horasInicioYFinalMartes[0]==(int)$horasMartesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMartes[1]==(int)$horasMartesForaneo[1])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMartes[0]<(int)$horasMartesForaneo[1] &&(int)$horasInicioYFinalMartes[0]>(int)$horasMartesForaneo[0]&&$horasMartesForaneo[1]>$horasInicioYFinalMartes[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMartes[1]>(int)$horasMartesForaneo[0] &&(int)$horasInicioYFinalMartes[1]<(int)$horasMartesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMartes[0]<(int)$horasMartesForaneo[0] &&(int)$horasInicioYFinalMartes[1]>(int)$horasMartesForaneo[0])
                    {
                        return true; 
                    }
                       
                }
                if($miercolesForaneo!=""&&isset($horasInicioYFinalMiercoles[1]))
                {
                    if((int)$horasInicioYFinalMiercoles[0]==(int)$horasMiercolesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMiercoles[1]==(int)$horasMiercolesForaneo[1])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMiercoles[0]<(int)$horasMiercolesForaneo[1] &&(int)$horasInicioYFinalMiercoles[0]>(int)$horasMiercolesForaneo[0]&&(int)$horasMiercolesForaneo[1]>(int)$horasInicioYFinalMiercoles[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMiercoles[1]>(int)$horasMiercolesForaneo[0] &&(int)$horasInicioYFinalMiercoles[1]<(int)$horasMiercolesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalMiercoles[0]<(int)$horasMiercolesForaneo[0] &&(int)$horasInicioYFinalMiercoles[1]>(int)$horasMiercolesForaneo[0])
                    {
                        return true; 
                    }
                        
                }
                if($juevesForaneo!=""&&isset($horasInicioYFinalJueves[1]))
                {
                    if((int)$horasInicioYFinalJueves[0]==(int)$horasJuevesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalJueves[1]==(int)$horasJuevesForaneo[1])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalJueves[0]<(int)$horasJuevesForaneo[1] &&(int)$horasInicioYFinalJueves[0]>(int)$horasJuevesForaneo[0]&&$horasJuevesForaneo[1]>$horasInicioYFinalJueves[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalJueves[1]>(int)$horasJuevesForaneo[0] &&(int)$horasInicioYFinalJueves[1]<(int)$horasJuevesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalJueves[0]<(int)$horasJuevesForaneo[0] &&(int)$horasInicioYFinalJueves[1]>(int)$horasJuevesForaneo[0])
                    {
                        return true; 
                    }
                       
                        
                }
                if($viernesForaneo!=""&&isset($horasInicioYFinalViernes[1]))
                {
                    if((int)$horasInicioYFinalViernes[0]==(int)$horasViernesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalViernes[1]==(int)$horasViernesForaneo[1])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalViernes[0]<(int)$horasViernesForaneo[1] &&(int)$horasInicioYFinalViernes[0]>(int)$horasViernesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalViernes[1]>(int)$horasViernesForaneo[0] &&(int)$horasInicioYFinalViernes[1]<(int)$horasViernesForaneo[0])
                    {
                        return true;
                    }
                    if((int)$horasInicioYFinalViernes[0]<(int)$horasViernesForaneo[0] &&(int)$horasInicioYFinalViernes[1]>(int)$horasViernesForaneo[0])
                    {
                        return true; 
                    }
                       
                }
             }
            }

          }
          else
            return false;
        }
        catch (Exception $e)
        {
        $error = $e->getMessage();
        echo $error;
        }
    }
}
?>
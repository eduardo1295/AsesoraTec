<?php
require_once('Clases/maestro.php');
session_start();
$vacio = 1;
$diaOcupado= 0;
$materiaOcupada = "";
$horaOcupada = "";
$dias = array("Lunes","Martes","Miecoles","Jueves","Viernes");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $opcion = $_POST['opcion'];
        $maestro = new Maestro();
        $codigo = $_POST['codigo'];
        $maestro->ObtenerDatos($_SESSION['noeconomico'],$maestro);
        $noecon = $_SESSION['noeconomico'];
        $nombreMaestro = utf8_encode($maestro->Nombre)." ".utf8_encode($maestro->Ap_Pat)." ". utf8_encode($maestro->Ap_Mat);
        $nombreMateria = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $semestre = $_POST['semestre'];
        $Horario =$_POST['horario'];
        $salon =$_POST['salon'];
        $asesor = $_POST['asesor'];
        $nocontrol= $_POST['nocontrol'];
        $bandera = horarioCompleto($Horario,$salon);
        $res = horarioVacio($Horario,$salon);
        $horamin = array();
        $horamax = array();
        if($opcion == "Agregar"){
            if($res == 1)
            {  
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $tipo != "" && $semestre !="" && $bandera == 0)
            {   

                if($asesor != "" && $nocontrol != ""){
                    $client = new SoapClient("https://siia.lapaz.tecnm.mx/webserviceitlp.asmx?WSDL");
                    $result = $client->estaInscrito(array('control' =>$nocontrol, 'contrasena' => '*3%f&Y2b'))->estaInscritoResult;
                        if($result == false){
                            echo "El alumno no esta vigente en el Instituto Tecnológico de La Paz";
                        }
                        else {
                            $hora = ValidarHorario($Horario);
                            if($hora == 1)
                                echo "El formato para el horario no es correcto!";
                             else
                            {
                                for ($i=0; $i < count($Horario) ; $i++) { 
                                    if ($Horario[$i] != "") {
                                        $aux = explode("-",$Horario[$i]);
                                        array_push($horamin,$aux[0]);
                                        array_push($horamax,$aux[1]);
                                    }
                                    else {
                                        array_push($horamin,"");
                                        array_push($horamax,"");
                                    }
                                }
                                //Aqui Empieza
                                $horarioLibre = true;
                                $horarioLibre =  horarioCruza($noecon,$horamin,$horamax,$maestro);
                                //Aqui Empieza
                                $SalonLibre = true;
                                $SalonLibre = salonEstaOcupado($noecon,$maestro,$horamin,$horamax,$salon);
                                //Aqui Termina
                                if($horarioLibre == true){
                                    if($SalonLibre == true){
                                        $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre,$_SESSION['noeconomico']);
                                        if($correcto ==1){
                                        $maestro->AgregarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                                        $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario,$_SESSION['noeconomico'],$nombreMaestro,$nombreMateria);
                                        echo ("La asesoría se registro correctamente");
                                        }
                                        else
                                            echo "La asesoria ya ha sido registrada";  
                                    }
                                    else{
                                        echo "El salón ya se encuentre ocupado";

                                    }
                                }
                                else{
                                    echo "El horario se cruza el día ".$dias[$diaOcupado];
                                }
                                
                            }   
                        }
                }
                else if ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $hora = ValidarHorario($Horario);
                    if($hora == 1){
                        echo "El formato para el horario no es correcto!";
                    }
                    else {
                        for ($i=0; $i < count($Horario) ; $i++) { 
                            if ($Horario[$i] != "") {
                                $aux = explode("-",$Horario[$i]);
                                array_push($horamin,$aux[0]);
                                array_push($horamax,$aux[1]);
                            }
                            else {
                                array_push($horamin,"");
                                array_push($horamax,"");
                            }
                        }
                        //Aqui Empieza
                        $horarioLibre = true;
                        $horarioLibre =  horarioCruza($noecon,$horamin,$horamax,$maestro);
                        
                        //Aqui Empieza
                        $SalonLibre = true;
                        $SalonLibre = salonEstaOcupado($noecon,$maestro,$horamin,$horamax,$salon);
                        //Aqui Termina
                        if ($horarioLibre == 1) {
                            if($SalonLibre == 1){
                                $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre,$_SESSION['noeconomico']);    
                                if($correcto == 1){
                                    $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario,$_SESSION['noeconomico'],$nombreMaestro,$nombreMateria);
                                    echo "La asesoría se registro correctamente";
                                }
                                else
                                echo "La asesoria ya ha sido registrada";
                            }
                            else{
                                echo "El salón se encuentra ocupado el día ".$dias[$diaOcupado];
                            }
                        }
                        else {
                            //echo "La asesoría se cruza el día ".$dias[$diaOcupado]." en la materia ".$materiaOcupada." con el horario de : ".$horaOcupada.'.';
                            echo "La asesoría se cruza con ".$materiaOcupada ." el día ".$dias[$diaOcupado] . " en el horario de :" .$horaOcupada;
                        }
                } 
            }
                }
                else{
                    echo ("Falta ingresar los datos");
                }
            }
            else {
            {echo "El horario esta vacío";}
            }
        }

        elseif ($opcion == "Editar") {
            $res = horarioVacio($Horario,$salon);
            if ($res == 1) {
                if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $tipo != "" && $semestre !="" && $bandera == 0){
                    $hora = ValidarHorario($Horario);
                    if ($hora != 1) {
                        for ($i=0; $i < count($Horario) ; $i++) { 
                            if ($Horario[$i] != "") {
                                $aux = explode("-",$Horario[$i]);
                                array_push($horamin,$aux[0]);
                                array_push($horamax,$aux[1]);
                            }
                            else {
                                array_push($horamin,"");
                                array_push($horamax,"");
                            }
                            
                        }
                        //Aqui Empieza
                        $horarioLibre = true;
                        $horarioLibre =  horarioCruzaEditar($noecon,$horamin,$horamax,$maestro,$codigo);
                        $SalonLibre = true;
                        $SalonLibre = salonEstaOcupado($noecon,$maestro,$horamin,$horamax,$salon);

                        if ($horarioLibre == 1) {
                            if ($SalonLibre == 1) {
                                if($asesor != "" && $nocontrol != ""){
                                    $maestro->ActualizarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                                    echo ("Se ha editado correctamente la asesoría");
                                }
                                elseif ($asesor != "" || $nocontrol != "")
                                    echo "Faltan datos del asesorado";
                                else {
                                    $maestro->EliminarAsesor($codigo);
                                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                                    echo ("Se ha editado correctamente la asesoría");
                                }
                            }
                            else {
                                echo "El salón se encuentra ocupado el día ".$dias[$diaOcupado];
                            }
                            
                        }
                        else {
                            echo "La asesoría se cruza con ".$materiaOcupada ." el día ".$dias[$diaOcupado] . " en el horario de :" .$horaOcupada;
                        }
                    }
                    else {
                        echo "El formato del horario no es correcto.";
                    }
                }
                else{
                    echo ("Falta ingresar los datos");
                }
            }
            else {
                echo "El horario se encuentra vacio";
            }
            
        }   
}
function horarioCompleto($horario,$salon)
{
    for ($i=0; $i < 5 ; $i++) { 
        if ($horario[$i] != "") {
            if($salon[$i] == ""){
                return 1;
            }
        }
        elseif($salon[$i] != "") {
            return 1;
        }
    }
    return 0;
}
function horarioVacio($horario,$salon)
{
    
    $resultado = 0;
    for ($i=0; $i < 5 ; $i++) { 
        if ($horario[$i] == $salon[$i] && $horario[$i]=="") {
        }
        else {
            $resultado=1;
            break;
        }
    }
    return $resultado;
}
function ValidarHorario($horario)
{
    $resultado = 0;
    for($i = 0;$i < 5;$i++)
    {
        if(!preg_match("/[0-9]{1,2}[-]{1}[0-9]{1,2}/",$horario[$i]) &&$horario[$i]!="")
        {
        return 1;
        }
    }
    return $resultado;
}
function horarioCruza($noecon,$horamin,$horamax,$maestro){
    global $diaOcupado,$materiaOcupada,$horaOcupada;
    $w = 0;
    $aux = 0;
    $horarioOcupado = $maestro->cargarHorarios($noecon);
    
    if (isset($horarioOcupado)) {
        for($x=0; $x < count($horarioOcupado) ; $x++){
            if ($w == 6){
                $w = 0;
            } 
            if($x == $aux){
                $materiaOcupada = utf8_encode($horarioOcupado[$x]);
                $aux = $aux +6;
                
            }
            else{
                if ($horarioOcupado[$x] != "") {
                    $valor = explode(" ",$horarioOcupado[$x]);
                    $auxhora = $valor[0];
                    $auxsalon = $valor[1];
                    $divhora = explode('-',$auxhora);
                    if(isset($divhora[0]) && isset($divhora[1])){
                        if($divhora[0] == $horamin[$w]){
                            $horaOcupada = $auxhora;
                            /*$horarioLibre = false;*/
                            $diaOcupado = $w;
                            return false;
                            break;
                        }
                        if((int)$divhora[0] > (int)$horamin[$w] && (int)$divhora[0] < (int)$horamax[$w] || (int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[0] > (int)$horamax[$w]){
                            /*$horarioLibre = false;*/
                            $horaOcupada = $divhora;
                            $diaOcupado = $w;
                            return false;
                            break;
                        }
                        if((int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[1] > (int)$horamin[$w]){
                            $diaOcupado = $w;
                            $horaOcupada = $divhora;
                            return false;
                            break;
                        }        
                    }
                }
                $w = $w + 1;
            }
            
        }
    }
    else {
        $w = $w + 1;
    }
    return true;
}
function horarioCruzaEditar($noecon,$horamin,$horamax,$maestro,$codigomat){
    global $diaOcupado,$materiaOcupada,$horaOcupada;
    $w = 0;
    $horarioOcupado = $maestro->cargarHorariosEditar($noecon,$codigomat);
    if (isset($horarioOcupado)) {
        for($x=0; $x < count($horarioOcupado) ; $x++){
            if ($w == 5){
                $w = 0;
            } 
            if($x == $aux){
                $materiaOcupada = utf8_encode($horarioOcupado[$x]);
                $aux = $aux +6;
            }
            if ($horarioOcupado[$x] != "") {
                $valor = explode(" ",$horarioOcupado[$x]);
                $auxhora = $valor[0];
                $auxsalon = $valor[1];
                $divhora = explode('-',$auxhora);
                if(isset($divhora[0]) && isset($divhora[1])){
                    if($divhora[0] == $horamin[$w]){
                        $diaOcupado = $w;
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if((int)$divhora[0] > (int)$horamin[$w] && (int)$divhora[0] < (int)$horamax[$w] || (int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[0] > (int)$horamax[$w]){
                        $diaOcupado = $w;
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if((int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[1] > (int)$horamin[$w]){
                        $diaOcupado = $w;
                        return false;
                        break;
                    }        
                }
            }
            $w = $w + 1;
        }
    }
    else {
        $w = $w + 1;
    }
    return true;
}


function salonEstaOcupado($noecon,$maestro,$horamin,$horamax,$salon){
    global $diaOcupado;
    $w = 0;
    $SalonOcupado = $maestro->cargarTodosHorarios($noecon);
    if (isset($SalonOcupado)) {
        for($x=0; $x < count($SalonOcupado) ; $x++){
            if ($w == 5){
                $w = 0;
            } 
            if ($SalonOcupado[$x] != "") {
                $valor = explode(" ",$SalonOcupado[$x]);
                $auxhora = $valor[0];
                $auxsalon = $valor[1];
                $divhora = explode('-',$auxhora);
                if(isset($divhora[0]) && isset($divhora[1])){
                    if((int)$divhora[0] == (int)$horamin[$w]){
                        if($auxsalon == $salon[$w]){
                            $diaOcupado = $w;
                            return false;
                            break;
                        }
                    }
                    if((int)$divhora[0] > (int)$horamin[$w] && (int)$divhora[0] < (int)$horamax[$w] || (int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[0] > (int)$horamax[$w]){
                        if($auxsalon == $salon[$w]){
                            $diaOcupado = $w;
                            return false;
                            break;
                        }
                    }
                    if((int)$divhora[0] < (int)$horamin[$w] && (int)$divhora[1] > (int)$horamin[$w]){
                        if($auxsalon == $salon[$w]){
                            $diaOcupado = $w;
                            return false;
                            break;
                        }
                    }        
                }
            }
            $w = $w + 1;
        }
    }
    else {
        $w = $w + 1;
    }
    return true;
}
?>
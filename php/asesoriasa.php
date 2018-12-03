<?php
require_once('Clases/maestro.php');
session_start();
$maestro = new maestro();
$noecon = $_POST['eco'];
$maestro->ObtenerDatos($noecon,$maestro);
$nombreMaestro = utf8_encode($maestro->Nombre)." ".utf8_encode($maestro->Ap_Pat)." ". utf8_encode($maestro->Ap_Mat);
$codigo = $_POST['codigo'];
$nombreMateria = $_POST['nombre'];
$tipo = $_POST['tipo'];
$semestre = $_POST['semestre'];
$Horario =$_POST['horario'];
$salon =$_POST['salon'];
$asesor = $_POST['asesor'];
$nocontrol= $_POST['nocontrol'];
$bandera = horarioCompleto($Horario,$salon);
$res = horarioVacio($Horario,$salon);
$res = horarioVacio($Horario,$salon);
$horamin = array();
$horamax = array();
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
            //Aqui Empieza
            //$SalonLibre = true;
            //$SalonLibre = salonEstaOcupado($noecon,$maestro,$horamin,$horamax,$salon);
            //Aqui Termina
            if ($horarioLibre == true) {
                if($asesor != "" && $nocontrol != ""){
                    $maestro->ActualizarAsesor($codigo,$noecon,$nocontrol,$asesor);
                    $maestro->ActualizarHorario($codigo,$noecon,$salon,$Horario);
                    echo ("Se a editado correctamente la asesoría");
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $maestro->EliminarAsesor($codigo);
                    $maestro->ActualizarHorario($codigo,$noecon,$salon,$Horario);
                    echo ("Se a editado correctamente la asesoría");
                }
            }
            else {
                echo "El horario se cruza con sus asesorias";
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
    $w = 0;
    $horarioOcupado = $maestro->cargarHorarios($noecon);
    if (isset($horarioOcupado)) {
        
        for($x=0; $x < count($horarioOcupado) ; $x++){
            if ($w == 5){
                $w = 0;
            } 
            if ($horarioOcupado[$x] != "") {
                $valor = explode(" ",$horarioOcupado[$x]);
                $auxhora = $valor[0];
                $auxsalon = $valor[1];
                $divhora = explode('-',$auxhora);
                if(isset($divhora[0]) && isset($divhora[1])){
                    if($divhora[0] == $horamin[$w]){
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if($divhora[0] > $horamin[$w] && $divhora[0] < $horamax[$w] || $divhora[0] < $horamin[$w] && $divhora[0] > $horamax[$w]){
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if($divhora[0] < $horamin[$w] && $divhora[1] > $horamin[$w]){
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
function horarioCruzaEditar($noecon,$horamin,$horamax,$maestro,$codigomat){
    $w = 0;
    $horarioOcupado = $maestro->cargarHorariosEditar($noecon,$codigomat);
    if (isset($horarioOcupado)) {
        for($x=0; $x < count($horarioOcupado) ; $x++){
            if ($w == 5){
                $w = 0;
            } 
            if ($horarioOcupado[$x] != "") {
                $valor = explode(" ",$horarioOcupado[$x]);
                $auxhora = $valor[0];
                $auxsalon = $valor[1];
                $divhora = explode('-',$auxhora);
                if(isset($divhora[0]) && isset($divhora[1])){
                    if($divhora[0] == $horamin[$w]){
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if($divhora[0] > $horamin[$w] && $divhora[0] < $horamax[$w] || $divhora[0] < $horamin[$w] && $divhora[0] > $horamax[$w]){
                        /*$horarioLibre = false;*/
                        return false;
                        break;
                    }
                    if($horamin[$w] < $divhora[0] ){
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
                    if($divhora[0] == $horamin[$w]){
                        if($auxsalon == $salon[$w]){
                            return false;
                            break;
                        }
                    }
                    if($divhora[0] > $horamin[$w] && $divhora[0] < $horamax[$w] || $divhora[0] < $horamin[$w] && $divhora[0] > $horamax[$w]){
                        if($auxsalon == $salon[$w]){
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
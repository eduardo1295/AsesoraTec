<?php
require_once('Clases/maestro.php');
session_start();
$vacio = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $opcion = $_POST['opcion'];
        $maestro = new Maestro();
        $codigo = $_POST['codigo'];
        $maestro->ObtenerDatos($_SESSION['noeconomico'],$maestro);
        $nombreMaestro = $maestro->Nombre." ".$maestro->Ap_Pat." ".$maestro->Ap_Mat;
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
                                $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre,$_SESSION['noeconomico']);
                                if($correcto ==1){
                                $maestro->AgregarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                                $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario,$_SESSION['noeconomico']);
                                echo ("Se a Registrado Correctamente");
                                }
                                else
                                     echo "La asesoria ya ha sido registrada";  
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
                        //Aqui Empieza
                        $horarioLibre = true;
                        $w = 0;
                        $horarioOcupado = $maestro->cargarHorarios($_SESSION['noeconomico']);
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
                                            $horarioLibre = false;
                                            break;
                                        }
                                        if($divhora[0] > $horamin[$w] && $divhora[0] < $horamax[$w] || $divhora[0] < $horamin[$w] && $divhora[0] > $horamax[$w]){
                                            $horarioLibre = false;
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
                        //Aqui Termina
                        if ($horarioLibre == true) {
                        
                            $correcto = $maestro->AgregarAsesoria($codigo,$nombreMaestro,$nombreMateria,$tipo,$semestre,$_SESSION['noeconomico']);    
                            if($correcto == 1){
                            $maestro->AgregarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario,$_SESSION['noeconomico']);
                            echo "La asesoria se registro correctamente";
                            }
                            else
                            echo "La asesoria ya ha sido registrada";
                        }
                        else {
                            echo "El horario cruza";
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
            if($codigo != "" && $nombreMaestro != "" && $nombreMateria != "" && $tipo != "" && $semestre !="" && $bandera == 0){
                if($asesor != "" && $nocontrol != ""){
                    $maestro->ActualizarAsesor($codigo,$_SESSION['noeconomico'],$nocontrol,$asesor);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("aaaaaaaaaaaaaaaaaaaaaaaaaaaa");
                }
                elseif ($asesor != "" || $nocontrol != "")
                    echo "Faltan datos del asesorado";
                else {
                    $maestro->EliminarAsesor($codigo);
                    $maestro->ActualizarHorario($codigo,$_SESSION['noeconomico'],$salon,$Horario);
                    echo ("bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb");
                }
            
            }
            else{
                echo ("Falta ingresar los datos");
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
?>
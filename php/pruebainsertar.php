<?php

$client = new SoapClient("https://siia.lapaz.tecnm.mx/webserviceitlp.asmx?WSDL");
    $result = $client->estaInscrito(array('control' =>'20310500', 'contrasena' => '*3%f&Y2b'))->estaInscritoResult;
    if($result == true){
        echo 'si existe';
    }else{
        echo'no existe';
    }
?>
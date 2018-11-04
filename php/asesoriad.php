<?php
require_once('Clases/asesoria.php');
session_start();
    $codigo = $_POST['codigo'];
    $asesoria = new Asesoria();
    $asesoria->ObtenerAsesoria($codigo,$asesoria);
    $nombre = $asesoria->Nombre;
?>
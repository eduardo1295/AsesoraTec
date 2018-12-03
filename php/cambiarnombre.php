<?php
    require_once("Clases/conexion.php");
    $opcion = strip_tags($_POST['op1']);
    $nombre= strip_tags($_POST['nm']);
    if($opcion == "JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACION"){
        $consulta = " UPDATE jefes set jefedptosi = '$nombre'";
        $conexion = abrirBD();
        $resultados =$conexion->query($consulta);
    }
    else if($opcion == "PRESIDENTE DE ACADEMIA DE SISTEMAS Y COMPUTACION"){

        $consulta = " UPDATE jefes set presiasi = '$nombre'";
        $conexion = abrirBD();
        $resultados =$conexion->query($consulta);
    }
    else if($opcion == "JEFE DEL DEPTO. DE CS. BASICAS"){
        $consulta = " UPDATE jefes set jefedptocb = '$nombre'";
        $conexion = abrirBD();
        $resultados =$conexion->query($consulta);

    }
    else{

        $consulta = " UPDATE jefes set presiacb = '$nombre'";
        $conexion = abrirBD();
        $resultados =$conexion->query($consulta);
    }
    echo "El nombre ha sido cambiado exitosamente";
?>
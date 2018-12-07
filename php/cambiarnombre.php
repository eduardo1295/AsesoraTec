<?php
    require_once("Clases/conexion.php");
    require_once("Clases/admin.php");
    $admin = new Admin();
    $opcion = strip_tags($_POST['op1']);
    $nombre= strip_tags($_POST['nm']);

    if($opcion == "JEFA DEL DEPTO. DE SISTEMAS Y COMPUTACION")
    {

        $admin->ActualizarJefeSistemas($_POST['nm']);
        echo "El nombre ha sido cambiado exitosamente";
        
    }
    else if($opcion == "PRESIDENTE DE ACADEMIA DE SISTEMAS Y COMPUTACION"){
       
        $admin->ActualizarPreSistemas($_POST['nm']);
        echo "El nombre ha sido cambiado exitosamente";
    }
    else if($opcion == "JEFE DEL DEPTO. DE CS. BASICAS"){
        $admin->ActualizarJefeCb($_POST['nm']);
        echo "El nombre ha sido cambiado exitosamente";

    }
    else{

         $admin->ActualizarPresiCb($_POST['nm']);
         echo "El nombre ha sido cambiado exitosamente";
    }
    
?>
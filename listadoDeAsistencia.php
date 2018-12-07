<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('php/Clases/maestro.php');
require_once('php/Clases/conexion.php');
if($_SESSION['maestrologeado']!='SI'){
    header("Location: login.php");
}
$maestro = new maestro();
$existe = $maestro->MaestroExists($_SESSION['noeconomico']);
if($existe != 1){
    session_destroy();
    header("Location: login.php");
}
$nocontrol= $_SESSION['noeconomico'];
$maestro->ObtenerDatos($nocontrol,$maestro);
$nc = $nocontrol;
$nombre = utf8_encode($maestro->Nombre);
$appat =  utf8_encode($maestro->Ap_Pat);
$apmat =  utf8_encode($maestro->Ap_Mat);
$nombrecompleto = $nombre." ".$appat." ".$apmat;
?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Agregar asesoría</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sidebars.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <link rel="stylesheet" href="css/datoEliminar.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/listadoDeAsistencia.js"></script>
    <script src=""></script>
</head>

<body>
<div class="row justify-content-center">
    <img src="bannerac.png" alt="" class="w-100" style="border:3px solid gray;">
</div>
    <div class="row"style="background:blue;"> 
        <div class="page-header encabezado w-100 py-3 col"style="color:white">
        <div class="row">
        <h1 class="lead display-4 ml-4">Lista de asistencia</h1>
        </div>          
        </div>
        <div class="col mt-4" style="background:blue">
            <div class="row justify-content-end mr-2 mt-1">
                <div class="dropdown ">
                    <button id="usuario" class="btn btn-primary dropdown-toggle lead mx-3" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-user fa-fw"></span>
                            <?php echo utf8_encode(utf8_decode($nombrecompleto))?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="usuario">
                        <a href='miperfil.php' class="dropdown-item lead">Mi perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-around">
            <div class="col-sm-3 text-center">
                <label for="asesoria" class="lead">Asesoria:</label>
                <select class="form-control" name="" id="asesoria"></select>
            </div>
            <div class="col-sm-3 text-center">
                <label for="fecha" class="lead">Fecha:</label>
                <select class="form-control" name="" id="fecha"></select>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row">
                <section class="w-100" id="tabla">

                </section>
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
                <button type="button" tabindex="17" class="mt-2 mr-5 mt-5 btn btn-primary navegacion" style="border:0; background-color:transparent;cursor:pointer;"
                    value="" data-toggle="tooltip" title="Página anterior" onclick="window.location.href='menu2.php'"><img
                        class="hola" src="css/return.png"></button>
    </div>
    <div class="copyright"style="left:0;bottom:0;width:100%;position:fixed;">
                <div class="container">
                    <div class="col py-3">
                        <div class="col text-center">
                            Instituto Tecnológico de La Paz. &copy;
                            
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>